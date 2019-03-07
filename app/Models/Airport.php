<?php

namespace App\Models;

use App\Models\Airport;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airport';

    public static function get_airport_in_a_nation($nation_id){
        // return Airport::where('nation_id',$nation_id)->get();

    }
}
