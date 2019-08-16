<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marker;

class MarkerController extends Controller
{
    
    public function index()
    {
    	return view('markers.index');
    }

    public function getNearestStorageLocations(Request $request)
    {
    	$coordinate = json_decode($request->coordinate);
    	
    	$nearest_storage_locations = Marker::nearestMarkers( $coordinate );

    	return response()->json([ $nearest_storage_locations ]);
    }
}
