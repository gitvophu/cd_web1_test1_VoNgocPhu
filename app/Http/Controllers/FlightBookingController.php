<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Transit;
use Illuminate\Http\Request;
use App\Models\FlightBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class FlightBookingController extends Controller
{
    protected $obj_flight = NULL;
    protected $obj_transit = NULL;

    public function __construct(){
        $this->data_view = [];
        $this->obj_flight = new Flight();
        $this->obj_transit = new Transit();
        $this->obj_flight_booking = new FlightBooking();
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

    public function checkout($flight_id){
        session()->put('booked_flight_id',$flight_id);
        $flight = Flight::find($flight_id);
        $this->data_view = array_merge($this->data_view,[
            'flight'=>$flight
        ]);
        // dd($this->data_view);
        return view('flight-book',$this->data_view);
    }
    public function book(Request $request){
        $booked_flight_id = session()->get('booked_flight_id');
        $data = $request->all();
        $data['booked_flight_id'] = $booked_flight_id;
        $validator = Validator::make($data,[
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);
        if ($validator->passes()) {
            $this->obj_flight_booking->storeFlightBookingAndUser($data);
            return "Thanh toán thành công";
            return redirect()->route('checkout',['flight_id'=>$booked_flight_id])->with('success','Đặt vé thành công');
        }
    }
}
