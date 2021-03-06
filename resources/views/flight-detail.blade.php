@extends('layout.master')
@section('content')

    </header>
    <main>
        <div class="container">
            <section>
                <h2>{{$flight['city_from_name']}} ({{$flight['city_from_code']}})<i class="glyphicon glyphicon-arrow-right"></i> {{$flight['city_to_name']}} ({{$flight['city_to_code']}})</h2>
                <h3 class="price text-danger"><strong>{{$total_person}} {{$flight_class_name}} ticket = ${{$unit_cost*$total_person*$cost_percent }}</strong></h3>
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong>{{$flight['airline_org_name']}}</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">From:</label>
                                            <div><big class="time">18:45</big></div>
                                            <div><span class="place">{{$flight['city_from_name']}} ({{$flight['city_from_code']}})</span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">To:</label>
                                            <div><big class="time">02:55</big></div>
                                            <div><span class="place">{{$flight['city_to_name']}} ({{$flight['city_to_code']}})</span></div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <label class="control-label">Duration:</label>
                                            <div><big class="time">11h 10m</big></div>
                                            <div><strong class="text-danger">1 Transit</strong></div>
                                        </div>
                                        <div class="col-sm-3 text-right">
                                        
                                            <div>
                                                <a href="flight-book.blade.php" class="btn btn-primary">Choose</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#flight-detail-tab">Flight Details</a></li>
                                        <li><a data-toggle="tab" href="#flight-price-tab">Price Details</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="flight-detail-tab" class="tab-pane fade in active">
                                            <ul class="list-group">
                                                @foreach ($transit_flight_list as $transit)
                                                    
                                                
                                                <li class="list-group-item">
                                                    <h5>
                                                        <strong class="airline">Qatar Airways QR-957</strong>
                                                        <p><span class="flight-class">Economy</span></p>
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div><big class="time">18:45</big></div>
                                                                    <div><small class="date">29 Apr 2017</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div><span class="place">{{$transit['city_from']}} (CGK)</span></div>
                                                                    <div><small class="airport">Soekarno Hatta Intl Airport</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div><big class="time">23:20</big></div>
                                                                    <div><small class="date">29 Apr 2017</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div><span class="place">{{$transit['city_to']}} (DOH)</span></div>
                                                                    <div><small class="airport">Doha Hamad International Airport</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 text-right">
                                                            <label class="control-label">Duration:</label>
                                                            <div><strong class="time">7h 35m</strong></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div id="flight-price-tab" class="tab-pane fade">
                                            <h5>
                                                <strong class="airline">Qatar Airways</strong>
                                                <p><span class="flight-class">Economy</span></p>
                                            </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="pull-left">
                                                        <strong>Passengers Fare (x3)</strong>
                                                    </div>
                                                    <div class="pull-right">
                                                        <strong>IDR24.796.650,00</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="pull-left">
                                                        <span>Tax</span>
                                                    </div>
                                                    <div class="pull-right">
                                                        <span>Included</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li class="list-group-item list-group-item-info">
                                                    <div class="pull-left">
                                                        <strong>You Pay</strong>
                                                    </div>
                                                    <div class="pull-right">
                                                        <strong>IDR24.796.650,00</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </main>
   @endsection