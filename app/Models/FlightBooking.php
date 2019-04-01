<?php

namespace App\Models;

use App\User;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    protected $table = 'flight_booking';
    public $timestamps = false;

    public function storeFlightBookingAndUser($data){
        // dd(session()->all());
        
        $user = new User();
        $user->phone = $data['phone'];
        $user->name = $data['first_name'];
        $user->email = $data['email'];
        $user->password = bcrypt('123456');
        $user->save();

        $booking = new FlightBooking();
        $flight = Flight::find($data['booked_flight_id']);
        $booking->flight_id = $data['booked_flight_id'];
        $booking->user_id = $user->id;
        $booking->total_person = session('total_person');
        $booking->flight_class_id = session('flight_class');
        $booking->flight_type = 1;
        $booking->total_price = $flight->unit_cost*session('total_person')*session('cost_percent')*session('extra_money');
        $booking->save();
       
        
    }
}
