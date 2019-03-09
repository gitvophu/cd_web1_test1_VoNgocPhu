<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Transit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FlightBookingController extends Controller
{
    protected $obj_flight = NULL;
    protected $obj_transit = NULL;

    public function __construct(){
        $this->data_view = [];
        $this->obj_flight = new Flight();
        $this->obj_transit = new Transit();
    }
    
    public function index()
    {
    
        // return to view
        $this->data_view =  array_merge($this->data_view, 
        $this->obj_flight->getIndexData());

        return view('index', $this->data_view);
    }

    public function flight_list()
    {
        return view('flight-list');
    }
}
