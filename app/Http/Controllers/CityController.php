<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function showCityHavingAirport(){
        
        // dd('aa');
        $city_list = City::get_city_having_airport();
        $this->data_view = [
            'city_list'=>$city_list
        ];
        
        return view('city_list_having_airport', $this->data_view);
    }
}
