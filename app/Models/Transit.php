<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    protected $table = 'transit';

    public function getTransitFlightList($flight_id)
    {
        $transit_flight_list = Transit::where('transit.transit_fl_id', $flight_id)
            ->leftJoin('flight', 'flight.id', 'transit.transit_fl_id')
            ->leftJoin('city as city_from', 'city_from.id', 'transit.transit_city_from_id')
            ->leftJoin('city as city_to', 'city_to.id', 'transit.transit_city_to_id')
            ->select('transit.*','city_from.name as city_from','city_to.name as city_to' )
            ->get()->toArray();
            // dd($transit_flight_list);
        return $transit_flight_list;
    }
}
