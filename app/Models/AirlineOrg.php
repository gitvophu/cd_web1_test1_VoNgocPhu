<?php

namespace App\Models;

use App\Models\AirlineOrg;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AirlineOrg extends Model
{
    
    protected $table = 'airline_org';

    public function get_airline_org_in_a_nation($nation_id){
        return AirlineOrg::where('nation_id',$nation_id)
        ->leftJoin('nation','airline_org.nation_id','nation.id')
        ->select('airline_org.*','nation.name as nation_name')
        ->get();
    }

    public function thong_ke(){
        $airline_org_list = AirlineOrg
        ::leftJoin('flight','flight.org_id','airline_org.id')
        // ->leftJoin('flight_booking','flight.id','flight_booking.id')
        // ->select('airline_org.id as airline_org_id','airline_org.name as airline_org_name', )
        ->groupBy('airline_org.name')
        ->get()->toArray();
        dd($airline_org_list);
    }
}
