@extends('master')

@section('content')
	
	<style type="text/css">
		#map {
        	width:100%;
        	height:480px;
      	}
	</style>

	<div class="row mb-3">
		<div class="col-lg-12">
			<input type="text" class="form-control" id="place" name="" 
				   placeholder="Type here a place name to see nearest storage locations that can serve it">
			<img src="{{ asset('loader/loader.gif') }}" id="loader" style="display: none;">
		</div>
	</div>

	<input type="hidden" id="nearest_sl_by_math" value="">

	<div id="map"></div>

	@push('scripts')
		<script type="text/javascript">

			var strg_loc = {!! json_encode( $markers ) !!};;
			
			function initMap() {

			  setMap(strg_loc);

			  initAutocomplete();
			}

			function setMap( strg_loc ) {

				var myLatLng = {lat: 1.3733, lng: 32.2903};

				var map = new google.maps.Map(document.getElementById('map'), {
			    	zoom: 7,
			    	center: myLatLng
			  	});

			  	storage_locations = strg_loc.entries();

			  	for ( [ index, value ] of storage_locations ) {
			  			setMarker( map, value );
			  	}
			}

			function setMarker( map, value ) {

				var latlng = { lat: value.lat, lng: value.lng };

				var infowindow = new google.maps.InfoWindow({
				  content: value.name
				});

				var marker = new google.maps.Marker({
					position: latlng,
					map: map,
					//icon: '/mapicons/rdc-fine.png',
				});

				marker.addListener('mouseover', function() {
				  infowindow.open(map, marker);
				});

				marker.addListener('mouseout', function() {
				  infowindow.close(map, marker);
				});
			}

			function initAutocomplete() {

			  var input = document.getElementById('place');

			  var options = {
			    componentRestrictions: {country: 'ug'}
			  };

			  autocomplete = new google.maps.places.Autocomplete(input, options);

			  autocomplete.addListener('place_changed', function() {
			  		var place_name = input.value;
			  		var place = autocomplete.getPlace();
			  		var lat = place.geometry.location.lat;
			  		var lng = place.geometry.location.lng;
			  		
			  		var coordinate = {lat: lat(), lng: lng()};
			  		var place_coordinate = JSON.stringify(coordinate);

			  		updateMap( place_coordinate, place_name );
			  });

			}

			function updateMap( place_coordinate, place_name ) {

				$('#place').hide();
				$('#loader').show();
				$.ajax({
				    url: '/nearestStorageLocations',
				    type: 'GET',
				    data: { coordinate: place_coordinate },
				    //dataType: 'JSON',
				    success: function (data) { 
				    	$('#place').show();
				    	$('#loader').hide();
				        var nearest_storage_locations = data[0];
				        $('#nearest_sl_by_math').val(JSON.stringify(nearest_storage_locations));
				        setMap( nearest_storage_locations );
				        $('#card-title').html(`Nearest Storage Locations to ${place_name}`);
				        getActualStorageLocationsRoadDistaces(place_coordinate, nearest_storage_locations);
				    }
				});
			}

			function getActualStorageLocationsRoadDistaces(origin_coordinates, nearest_storage_locations) {

				var place_input = JSON.parse( origin_coordinates );

				var origin = new google.maps.LatLng( place_input.lat, place_input.lng );

				var storage_locations = nearest_storage_locations.entries();

				var destination_coordinates = [];

				for ( [ index, sLocation ] of storage_locations ) {
					var lat_lng = new google.maps.LatLng( sLocation.lat, sLocation.lng );
					destination_coordinates.push( lat_lng );
				}

				var service = new google.maps.DistanceMatrixService();

				service.getDistanceMatrix(
				  {
				    origins: [origin],
				    destinations: destination_coordinates,
				    travelMode: 'DRIVING',
				  }, callback);
			}

			function callback(response, status) {

			  var nearest_sl_by_math = JSON.parse( $('#nearest_sl_by_math').val() );
			  var repsonse_results = response.rows[0]['elements'];
			  
			  for ( var i = 0; i < nearest_sl_by_math.length; i++ ) {

			  	 var distance = repsonse_results[i].distance.text;
			  	 var duration = repsonse_results[i].duration.text;

			  	 var $this = nearest_sl_by_math[i];

			  	 $this['distance'] = distance;
			  	 $this['duration'] = duration;
			  	 
			  }
			  var sorted_storage_locations = sortByDistance(nearest_sl_by_math);

			  showNearestStorageLocationsDetails(sorted_storage_locations);
			}

			function sortByDistance( storage_locations ) {
				return storage_locations.sort(sortCallback);
			}

			function sortCallback(a, b) {
			  return parseInt(a.distance) - parseInt(b.distance);
			}

			function showNearestStorageLocationsDetails(sorted_storage_locations) {
				var strg_locs  = sorted_storage_locations.entries();
				var list_items = '';
				for ( [key, value] of strg_locs ) {
					list_items += '<li class="ml-4" style="opacity: 0.7; font-size:12px;">'+
					value.name+', ('+value.distance+ ' away in about '+value.duration+' drive)</li>';
				}

				$('#storage_location_list').html( list_items );
			}

		</script>
	@endpush

@endsection