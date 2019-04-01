@extends('layout.master')
@section('content')


<main>
    <div class="container">
        <section>
            <h3>Flight Booking</h3>
            @if ($errors->any())
          
                @foreach ($errors->all() as $err)
            <p style="color:red;1px solid red;">{{$err}}</p>
                @endforeach
            @endif
            @if(session()->has('success'))
            <p style="color:green;border:1px solid green;">{{session('success')}}</p>
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    {{-- `id`, `org_id`, `unit_cost`, `from`, `to`, `flight_type`, `economy_seat_num`,
                    `economy_premium_seat_num`, `bussiness_seat_num`, `total_seat_booked`, `departure`, `return`,
                    `duration`, `transit`, `created_at`, `updated_at` --}}
                    <form method="POST" id="search-form" role="form" action="{{route('flight_store')}}">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="col-sm-4">
                                <h4 class="form-heading">1. Flight Destination</h4>


                                <div class="form-group">
                                    <label class="control-label">From: </label>
                                    <select class="form-control" name="from" id="from">
                                        @foreach($city_list as $city)
                                        <option value="{{$city->id}}">{{$city->name}} ({{$city->code}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">To: </label>
                                    <select class="form-control" name="to" id="to">
                                        <@foreach($city_list as $city) <option value="{{$city->id}}">{{$city->name}}
                                            ({{$city->code}})</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h4 class="form-heading">2. Date of Flight</h4>
                                <div class="form-group">
                                    <label class="control-label">Departure: </label>
                                    <input id="departure-date" name="departure_date" type="date" class="form-control"
                                        placeholder="Choose Departure Date">
                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                        @foreach ($flight_type_list as $flight_type)
                                        <label><input type="radio" name="flight_type" checked value="{{$flight_type->id}}">{{$flight_type->name}}</label>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Return: </label>
                                    <input id="return_date" name="return_date" type="date" class="form-control"
                                        placeholder="Choose Return Date">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h4 class="form-heading">3. Search Flights</h4>
                                <div class="form-group">
                                    <label class="control-label">Total Person: </label>
                                    <select id="total-person" class="form-control" name="total_person">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Flight Class: </label>
                                    <select id="flight-class" class="form-control" name="flight_class">
                                        @foreach ($flight_class_list as $flight_class)

                                        <option value="{{$flight_class->id}}">{{$flight_class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" id="btn-search">Search
                                        Flights</button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                {{-- org_id --}}
                                <div class="form-group">
                                    <label class="control-label">org: </label>
                                    <select class="form-control" name="org_id" id="org_id">
                                        @foreach($org_list as $org)
                                        <option value="{{$org->id}}">{{$org->name}} ({{$city->code}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- unit_cost --}}
                                <div class="form-group">
                                    <label class="control-label">unit_cost </label>
                                    <input type="number" class="form-control unit_cost" name="unit_cost" />
                                </div>
                                {{-- economy_seat_num --}}
                                <div class="form-group">
                                    <label class="control-label">economy_seat_num </label>
                                    <input type="number" class="form-control economy_seat_num" name="economy_seat_num" />
                                </div>

                            </div>
                            <div class="col-sm-4">
                                {{-- economy_premium_seat_num --}}
                                <div class="form-group">
                                    <label class="control-label">economy_premium_seat_num: </label>
                                    <input type="number" class="form-control economy_premium_seat_num" name="economy_premium_seat_num" />

                                </div>
                                {{-- bussiness_seat_num --}}
                                <div class="form-group">
                                    <label class="control-label">bussiness_seat_num: </label>
                                    <input type="number" class="form-control bussiness_seat_num" name="bussiness_seat_num" />

                                </div>
                                {{-- duration --}}
                                <div class="form-group">
                                    <label class="control-label">duration: </label>
                                    <input type="number" class="form-control duration" name="duration" />

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('/assets/js/index.js') }}"></script>
@endsection