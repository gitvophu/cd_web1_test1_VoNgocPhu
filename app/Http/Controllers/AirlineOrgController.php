<?php

namespace App\Http\Controllers;

use App\Models\AirlineOrg;
use Illuminate\Http\Request;

class AirlineOrgController extends Controller
{
    public $obj_airline = NULL;

    public function __construct() {
        $this->obj_airline_org = new AirlineOrg();
        $this->data_view = [];
        
    }
    public function thong_ke(){
        $this->obj_airline_org->thong_ke();
    }
}
