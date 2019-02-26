@extends('layout.master')
@section('content')
    

    <main>
        <div class="container">
            <section>
                <h3>Flight Booking</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id="search-form" role="form" action="{{route('flight-list')}}">
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
											<@foreach($city_list as $city)
                                                <option value="{{$city->id}}">{{$city->name}} ({{$city->code}})</option>
                                            @endforeach
										</select>       
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">2. Date of Flight</h4>
                                    <div class="form-group">
                                        <label class="control-label">Departure: </label>
                                        <input id="departure-date" name="departure_date" type="date" class="form-control" placeholder="Choose Departure Date">
                                    </div>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input  type="radio" name="flight_type" checked value="1">One Way</label>
                                            <label><input type="radio" name="flight_type" value="2">Return</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Return: </label>
                                        <input id="return_date" name="return_date" type="date" class="form-control" placeholder="Choose Return Date">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">3. Search Flights</h4>
                                    <div class="form-group">
                                        <label class="control-label">Total Person: </label>
                                        <select id="total-person" class="form-control">
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
                                        <select id="flight-class" class="form-control">
                                            <option value="1">Economy</option>
                                            <option value="2">Business</option>
                                            <option value="3">Premium Economy</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" id="btn-search">Search Flights</button>
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
    