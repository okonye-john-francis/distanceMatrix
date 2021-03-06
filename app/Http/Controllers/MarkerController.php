<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marker;

class MarkerController extends Controller
{
    
    public function index()
    {
    	$markers = Marker::markers();

    	return view('markers.index', compact('markers'));
    }

    public function getNearestStorageLocations(Request $request)
    {
    	$coordinate = json_decode($request->coordinate);

    	$nearest_storage_locations = Marker::nearestMarkers( $coordinate );

    	return response()->json([ $nearest_storage_locations ]);
    }
}
