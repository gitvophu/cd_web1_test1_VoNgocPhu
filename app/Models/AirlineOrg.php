<?php

namespace App\Models;

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
}
