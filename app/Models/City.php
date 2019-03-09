<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    public function get_city_having_airport(){
        $city_list = City::leftJoin('airport','city.id','=','airport.city_id')
        ->leftJoin('nation','city.nation_id','=','nation.id')
        ->select('city.id as city_id','city.code as city_code','city.name as city_name', 'city.nation_id',
        'airport.id as airport_id','airport.name as airport_name','airport.code as airport_code','nation.name as nation_name')
        ->where('airport.id','<>',null)
        ->get()->toArray();
       return $city_list;
    }
}
