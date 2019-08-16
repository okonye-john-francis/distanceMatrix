<?php

use Illuminate\Database\Seeder;
use App\Marker;

class MarkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markers = $this->markers();

        foreach ($markers as $marker) {
        	Marker::create( $marker );
        }
    }

    public function markers()
    {
    	return [
    		[
    			'name'    => 'Kampala RDC',
    			'address' => 'Bukoto',
                'type'    => 'RDC',
    			'lat'     => '0.345604',
    			'lng'     => '32.5956584740371'
    		],

    		[
    			'name'    => 'Jinja Warehouse',
    			'address' => 'Jinja',
                'type'    => 'WAREHOUSE',
    			'lat'     => '0.5465468',
    			'lng'     => '33.224816860928684'
    		],

    		[
    			'name'    => 'Tirinyi Outlet',
    			'address' => 'Tirinyi',
    			'type'    => 'OUTLET',
                'lat'     => '1.0293416',
    			'lng'     => '33.7820041'
    		],

    		[
    			'name'    => 'Mbale RDC',
    			'address' => 'Mbale',
    			'type'    => 'RDC',
                'lat'     => '1.0020262',
    			'lng'     => '34.197867478903646'
    		],

    		[
    			'name'    => 'Kamdini RDC',
    			'address' => 'Kamdini',
    			'type'    => 'RDC',
                'lat'     => '2.2340732',
    			'lng'     => '32.3323157'
    		],

    		[
    			'name'    => 'Gulu Warehouse',
    			'address' => 'Gulu',
    			'type'    => 'WAREHOUSE',
                'lat'     => '2.8763527',
    			'lng'     => '32.41905532894401'
    		],

    		[
    			'name'    => 'Masaka Warehouse',
    			'address' => 'Masaka',
    			'type'    => 'WAREHOUSE',
                'lat'     => '-0.4831071',
    			'lng'     => '31.83192033045064'
    		],

    		[
    			'name'    => 'Mbarara RDC',
    			'address' => 'Mbarara',
    			'type'    => 'RDC',
                'lat'     => '-0.6109532',
    			'lng'     => '30.6533047'
    		],

    		[
    			'name'    => 'Kabale Warehouse',
    			'address' => 'Kabale',
    			'type'    => 'WAREHOUSE',
                'lat'     => '-1.233921',
    			'lng'     => '30.01668023928206'
    		],

    		[
    			'name'    => 'Fort Portal Outlet',
    			'address' => 'Fort Portal',
    			'type'    => 'OUTLET',
                'lat'     => '0.668424',
    			'lng'     => '30.2810955'
    		],

    		[
    			'name'    => 'Soroti Outlet',
    			'address' => 'Soroti',
    			'type'    => 'OUTLET',
                'lat'     => '1.7906288',
    			'lng'     => '33.60607058395144'
    		],

    		[
    			'name'    => 'Arua Outlet',
    			'address' => 'Arua',
    			'type'    => 'OUTLET',
                'lat'     => '2.94799145',
    			'lng'     => '31.125645307658072'
    		],

    		[
    			'name'    => 'Moroto Outlet',
    			'address' => 'Moroto',
    			'type'    => 'OUTLET',
                'lat'     => '2.6156454499999997',
    			'lng'     => '34.639981739983014'
    		],
    	];
    }
}
