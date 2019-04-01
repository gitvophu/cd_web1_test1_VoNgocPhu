<?php

namespace App\Models;

use App\Models\City;
use App\Models\Nation;
use App\Models\AirlineOrg;
use App\Models\FlightType;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flight';
    public function kiem_tra_chuyen_bay_noi_dia($city_id1, $city_id2)
    {
        $city1 = City::find($city_id1);
        $city2 = City::find($city_id2);
        if ($city1->nation_id == $city2->nation_id) {
            return true;
        }
        return false;
    }
    public function kiem_tra_chuyen_bay_noi_dia_hop_le($city_id1, $city_id2,$org_id)
    {
        $city1 = City::find($city_id1);
        $city2 = City::find($city_id2);
        $nation_id_org = AirlineOrg::find($org_id)->nation_id;
        if ($city1->nation_id == $city2->nation_id && $nation_id_org == $city1->nation_id) {
            return true;
        }
        return false;
    }
    public function kiem_tra_2_quoc_gia($city_id1, $city_id2)
    {
        $city1 = City::find($city_id1);
        $city2 = City::find($city_id2);
        $nation_id1 = $city1->nation_id;
        $nation_id2 = $city2->nation_id;
        $nations_id = Nation::find($nation_id1)->nations_id;

        $nation_arr = explode('::' ,$nations_id);
        // dd($nation_arr);
       
        if ( in_array($nation_id2, $nation_arr)) {
            return true;
        }
        return false;
        
    }
    public function storeFlight($data)
    {
        Flight::insert([
            'from' => $data['from'],
            'to' => $data['to'],
            'departure' => $data['departure_date'],
            'flight_type' => $data['flight_type'],
            'return' => $data['return_date'],
            'unit_cost' => $data['unit_cost'],
            'economy_seat_num' => $data['economy_seat_num'],
            'economy_premium_seat_num' => $data['economy_premium_seat_num'],
            'bussiness_seat_num' => $data['bussiness_seat_num'],
            'duration' => $data['duration'],
            'org_id' => $data['org_id'],
            'total_seat_booked' => 600,
            'transit' => 0,
        ]);

    }

    public function getFlightDetail($flight_id)
    {
        return Flight::where('flight.id', $flight_id)
            ->leftJoin('city as city_from', 'city_from.id', 'flight.from')
            ->leftJoin('city as city_to', 'city_to.id', 'flight.to')
            ->leftJoin('airline_org', 'flight.org_id', 'airline_org.id')
            ->select('flight.*', 'city_from.name as city_from_name', 'city_from.code as city_from_code', 'city_to.code as city_to_code', 'city_to.name as city_to_name', 'airline_org.name as airline_org_name')
            ->first()
            ->toArray();
    }

    public function getIndexData()
    {

        return [
            'city_list' => City::get(), //TODO: improve to eloquent
            'flight_type_list' => FlightType::get(), //Ref: https://laravel.com/docs/5.4/eloquent
            'flight_class_list' => FlightClass::get(),
        ];
    }
    public function getCreateFlightData()
    {

        return [
            'city_list' => City::get(), //TODO: improve to eloquent
            'flight_type_list' => FlightType::get(), //Ref: https://laravel.com/docs/5.4/eloquent
            'flight_class_list' => FlightClass::get(),
            'org_list' => AirlineOrg::get(),
        ];
    }
    public function search_flight_list($data)
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
