<?php

namespace App\Models;

use App\Models\City;
use App\Models\FlightType;
use App\Models\Transit;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flight';
   
    public static function getFlightDetail($flight_id)
    {
        return Flight::where('flight.id', $flight_id)
            ->leftJoin('city as city_from', 'city_from.id', 'flight.from')
            ->leftJoin('city as city_to', 'city_to.id', 'flight.to')
            ->leftJoin('airline_org', 'flight.org_id', 'airline_org.id')
            ->select('flight.*', 'city_from.name as city_from_name', 'city_from.code as city_from_code', 'city_to.code as city_to_code', 'city_to.name as city_to_name', 'airline_org.name as airline_org_name')
            ->first()
            ->toArray();
    }

    public static function getIndexData()
    {

        return [
            'city_list' => City::get(), //TODO: improve to eloquent
            'flight_type_list' => FlightType::get(), //Ref: https://laravel.com/docs/5.4/eloquent
            'flight_class_list' => FlightClass::get(),
        ];
    }

    public static function search_flight_list($data)
    {
        return Flight::where([
            ['from', $data['from']],
            ['to', $data['to']],
            ['departure', '>=', $data['departure']],
            ['departure', '<', $data['departure_nextday']],
            ['flight_type', $data['flight_type']],
            ['return', '>=', $data['return_date']],
            ['return', '<', $data['return_date_nextday']],
        ])->get();
    }
}
