@include('layout.header')
        <main>
            <div class="container">
                <section>
                       
                    <h2>
                            @foreach ($city_list as $city )
                            @if ($city->id == $_GET['from'])
                            {{$city->name}} - ({{$city->code}})
                            @endif
                            @endforeach
                         <i class="glyphicon glyphicon-arrow-right"></i> @foreach ($city_list as $city )
                            @if ($city->id == $_GET['to'])
                            {{$city->name}} - ({{$city->code}})
                            @endif
                            @endforeach</h2>
                    @foreach($flight_list as $flight)
                    <article>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><strong><a href="flight-detail.blade.php">{{$flight->name}}</a></strong></h4>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="control-label">From:</label>
                                            <div><big class="time">{{date('h:i',strtotime( $flight->departure))}} </big></div>
                                                <div><span class="place">

                                                        @foreach ($city_list as $city )
                                                        @if ($city->id == $flight->from)
                                                        {{$city->name}}
                                                        @endif
                                                        @endforeach
                                                    </span></div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">To:</label>
                                                <div><big class="time">{{date('h:i',strtotime( $flight->departure . " + $flight->duration hours"))}}</big></div>
                                                <div><span class="place">
                                                        @foreach ($city_list as $city )
                                                        @if ($city->id == $flight->to)
                                                        {{$city->name}}
                                                        @endif
                                                        @endforeach</span></div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">Duration:</label>
                                                <div><big class="time">{{$flight->duration}}h</big></div>
                                                <div><strong class="text-danger">{{$flight->transit}} Transit</strong></div>
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                <h3 class="price text-danger"><strong>IDR8.265.550,00</strong></h3>
                                                <div>
                                                    <a href="flight-detail.blade.php" class="btn btn-link">See Detail</a>
                                                    <a href="flight-book.blade.php" class="btn btn-primary">Choose</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <div class="text-center">
                        <ul class="pagination">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">&lsaquo;</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">&rsaquo;</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </section>
            </div>
        </main>
        <footer>
            <div class="container">
                <p class="text-center">
                    Copyright &copy; 2017 | All Right Reserved
                </p>
            </div>
        </footer>
    </div>
    <!--scripts-->
    <script type="text/javascript" src="assets/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>