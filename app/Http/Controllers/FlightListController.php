<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Transit;
use App\Models\FlightClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request){
        $data = $request->all();
        $extra_money = 1;
        $validator = Validator::make($request->all(),[
            'from'=>'required',
            'to'=>'required',
            'departure_date'=>'required',
            'flight_type'=>'required',
            'return_date'=>'required',
            'unit_cost'=>'required',
            'economy_seat_num'=>'required',
            'economy_premium_seat_num'=>'required',
            'bussiness_seat_num'=>'required',
            'duration'=>'required',
            'org_id'=>'required'
        ],[]);
        if($validator->passes()){
            $city_id1 = $request->from;
            $city_id2 = $request->to;
            $org_id = $request->org_id;
           
            if ( !$this->obj_flight->kiem_tra_2_quoc_gia($city_id1,$city_id2)) {
                $validator->errors()->add('quoc_gia_err','Hai quốc gia này không được phép bay trực tiếp');
                return redirect()->route('flight_create')->withErrors($validator);
            }
            if ($this->obj_flight->kiem_tra_chuyen_bay_noi_dia($city_id1,$city_id2)) {
                if (!$this->obj_flight->kiem_tra_chuyen_bay_noi_dia_hop_le($city_id1,$city_id2,$org_id)) {
                
                    $validator->errors()->add('quoc_gia_err','Chuyến bay nội địa phải do hãng bay trong nước khai thác');
                    return redirect()->route('flight_create')->withErrors($validator);
                }
            }

            $day =round((strtotime($request->departure_date) - time() )/60/60/24) ;
            if($day >90 ){
                $extra_money = 1;
                $data['unit_cost'] = $data['unit_cost']*$extra_money ;
                $this->obj_flight->storeFlight($data);
            }else if($day>30){
                $extra_money = 1.05;
                $data['unit_cost'] = $data['unit_cost']*$extra_money;
                $this->obj_flight->storeFlight($data);
            }else{
               $validator->errors()->add('departure_date','Không được tạo chuyến bay cách dưới 30 ngày');
               return redirect()->route('flight_create')->withErrors($validator);
            }
            return redirect()->route('flight_create')->with('success','Tạo chuyến bay thành công');
        }
        return redirect()->route('flight_create')->withErrors($validator);
        
       
        // dd($request->all());
        
        

    }
    public function create(){
        $data = $this->obj_flight->getCreateFlightData();
        $this->data_view = array_merge($this->data_view,$data);
        return view('flight-create',$this->data_view);
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
        $extra_money = 1;
        $day =round((strtotime($request->departure_date) - time() )/60/60/24) ;
        if($day > 60){
            $extra_money = 0.9;
        }
        else if($day > 30){
            $extra_money = 0.95;
        }
        else if($day > 14){
            $extra_money = 1.1;
        }
        else if($day > 7){
            $extra_money = 1.2;  
        }
        else{
            $extra_money = 1.5; 
        }
        
        // dd($request->all());
        $data = $request->all();
        $total_person = $request->total_person;
        $flight_class = $request->flight_class;
        $cost_percent = FlightClass::find($flight_class )->cost_percent;
       
        $flight_class_name = FlightClass::find($flight_class )->name;
        
        $total_person = $data['total_person'];
        $flight_class = $data['flight_class'];
        session()->put('total_person', $total_person);
        session()->put('flight_class', $flight_class);
        // dd($total_person);
        
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
            'extra_money' => $extra_money,
        ]);
        session()->put('cost_percent',$cost_percent);
        session()->put('extra_money',$extra_money);
        // dd($flight_list);
        return view('flight-list', $this->data_view);
    }
}
