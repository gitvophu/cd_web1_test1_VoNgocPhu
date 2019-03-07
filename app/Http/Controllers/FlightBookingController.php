<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FlightBookingController extends Controller
{
    public function __construct(){
        $this->data_view = [

        ];
    }
    public function index()
    {
        

        // return to view
        $this->data_view =  array_merge($this->data_view, 
        Flight::getIndexData());

        return view('index', $this->data_view);
    }

    public function flight_list()
    {
        return view('flight-list');
    }
}
