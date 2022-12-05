<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min = 100; $max = 200;
        $data = array(
                    array('name' => 'Vellore', 'status' => 'active'),
					array('name' => 'Vaniyambadi', 'status' => 'active'),
					array('name' => 'Udhagamandalam', 'status' => 'active'),
					array('name' => 'Tiruvannamalai', 'status' => 'active'),
					array('name' => 'Tiruppur', 'status' => 'active'),
					array('name' => 'Tirunelveli', 'status' => 'active'),
					array('name' => 'Tiruchirappalli', 'status' => 'active'),
					array('name' => 'Thoothukkudi', 'status' => 'active'),
					array('name' => 'Thanjavur', 'status' => 'active'),
					array('name' => 'Sivakasi', 'status' => 'active'),
					array('name' => 'Salem', 'status' => 'active'),
					array('name' => 'Ranipet', 'status' => 'active'),
					array('name' => 'Rajapalayam', 'status' => 'active'),
					array('name' => 'Pudukkottai', 'status' => 'active'),
					array('name' => 'Pollachi', 'status' => 'active'),
					array('name' => 'Neyveli', 'status' => 'active'),
					array('name' => 'Nagercoil', 'status' => 'active'),
					array('name' => 'Nagapattinam', 'status' => 'active'),
					array('name' => 'Madurai', 'status' => 'active'),
					array('name' => 'Kumbakonam', 'status' => 'active'),
					array('name' => 'Kumarapalayam', 'status' => 'active'),
					array('name' => 'Karur', 'status' => 'active'),
					array('name' => 'Karaikkudi', 'status' => 'active'),
					array('name' => 'Kanchipuram', 'status' => 'active'),
					array('name' => 'Hosur', 'status' => 'active'),
					array('name' => 'Gudiyatham', 'status' => 'active'),
					array('name' => 'Erode', 'status' => 'active'),
					array('name' => 'Dindigul', 'status' => 'active'),
					array('name' => 'Cuddalore', 'status' => 'active'),
					array('name' => 'Coimbatore', 'status' => 'active'),
					array('name' => 'Chennai', 'status' => 'active'),
					array('name' => 'Ambur', 'status' => 'active')
               );
        
        foreach($data as $item) {
             City::create($item);
        }  
    }
}
