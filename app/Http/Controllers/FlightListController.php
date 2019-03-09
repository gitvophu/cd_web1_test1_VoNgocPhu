<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Transit;
use App\Models\FlightClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightListController extends Controller
{

    protected $obj_flight = null;
    protected $obj_transit = null;

    public function __construct()
    {
        $this->data_view = [];
        $this->obj_flight = new Flight();
        $this->obj_transit = new Transit();
    }
    public function showFlightDetail($flight_id)
    {
        $flight = $this->obj_flight->getFlightDetail($flight_id);
        
//    dd($flight);
        $total_person = session('total_person');
        $flight_class = session('flight_class');
        
        $cost_percent = FlightClass::find($flight_class)->cost_percent;
        $flight_class_name = FlightClass::find($flight_class)->name;
        // dd(  $cost_percent);
        $transit_flight_list = $this->obj_transit->getTransitFlightList($flight_id);
        // dd($transit_flight_list);
        $unit_cost = $flight['unit_cost'];
        
        // dd($cost);
        $this->data_view = array_merge($this->data_view, [
            'flight' => $flight,
            'transit_flight_list' => $transit_flight_list,
            'total_person'=>$total_person,
            'unit_cost'=>$unit_cost,
            'cost_percent'=>$cost_percent,
            'flight_class_name'=>$flight_class_name,
        ]);
        // [
        //     'flight' => $flight,
        //     'transit_flight_list' => $transit_flight_list,
        // ];
        return view('flight-detail', $this->data_view);
    }

//"from" => "1"
    //"to" => "2"
    //"departure-date" => "2019-02-15"
    //"flight_type" => "one-way"
    //"return-date" => "2019-02-03"
    public function flight_list(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        $total_person = session('total_person');
        $flight_class = session('flight_class');
        $cost_percent = FlightClass::find($flight_class)->cost_percent;
        $flight_class_name = FlightClass::find($flight_class)->name;

        $total_person = $data['total_person'];
        $flight_class = $data['flight_class'];
        // dd($total_person);
        session()->put('total_person', $total_person);
        session()->put('flight_class', $flight_class);
        $departure = new \DateTime($request->departure_date);

        $departure_nextday = new \DateTime($request->departure_date . ' + 1 days');

        $return_date = new \DateTime($request->return_date);
        $return_date_nextday = new \DateTime($request->return_date . ' + 1 days');
        $data['departure'] = $departure;
        $data['departure_nextday'] = $departure_nextday;
        $data['return_date'] = $return_date;
        $data['return_date_nextday'] = $return_date_nextday;
//        dd($departure->format('Y-m-d h:i:s'));
        $flight_list = $this->obj_flight->search_flight_list($data);

        // if ($request->flight_class == 1) {
        //     $flight_list->where('bussiness_seat_num','>=',$request->total_person);
        // }elseif ($request->flight_class == 2) {
        //     $flight_list->where('economy_seat_num','>=',$request->total_person);
        // }elseif ($request->flight_class == 3) {
        //     $flight_list->where('economy_premium_seat_num','>=',$request->total_person);
        // }
        // $flight_list->leftJoin('airline_org', 'flight.org_id', '=', 'airline_org.id')->get();

        // dd($flight_list);

        $city_list = DB::table('city')->get();
        // $this->data_view = [
        //     'flight_list' => $flight_list,
        //     'city_list' => $city_list,
        // ];
        $this->data_view = array_merge($this->data_view, [
            'flight_list' => $flight_list,
            'city_list' => $city_list,
            'total_person' => $total_person,
            'cost_percent' => $cost_percent,
            'flight_class_name' => $flight_class_name,
            
        ]);
        // dd($flight_list);
        return view('flight-list', $this->data_view);
    }
}
