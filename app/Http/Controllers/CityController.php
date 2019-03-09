<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    protected $obj_city = null;

    public function __construct()
    {
        $this->obj_city = new City();
    }
    public function test()
    {

        $lat1;
        $lon1;
        $lat2;
        $lon2;
        $unit;

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }

        echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
        echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
        echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
    }
    public function showCityHavingAirport()
    {

        // dd('aa');
        $city_list = $this->obj_city->get_city_having_airport();
        // $this->data_view = [
        //     'city_list'=>$city_list
        // ];
        $this->data_view = array_merge($this->data_view, [
            'city_list' => $city_list,
        ]);

        return view('city_list_having_airport', $this->data_view);
    }
}
