<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Marker extends Model
{
    protected $guarded = ['id'];

    public static function markers()
    {
    	return self::all();
    }

    public static function nearestMarkers( $coordinate, $n_storage_locations=3 )
    {
    	$lat = $coordinate->lat;
    	$lng = $coordinate->lng;

    	$formular = '((lat-('.$lat.')) * (lat-('.$lat.')) ) + ((lng - ('.$lng.')) * (lng - ('.$lng.')) )';
    	
    	return self::orderBy(DB::raw( $formular ), 'ASC')
		 			->take($n_storage_locations)
		 			->get();
    }
}
