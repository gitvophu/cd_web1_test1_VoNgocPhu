<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Flights - Worldskills Travel</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/style.css') }}">
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a href="{{url('/')}}" class="navbar-brand">Worldskills Travel</a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('flight_create')}}">Create new flight</a></li>
                        <li><a href="#">Flights</a></li>
                    <li><a href="{{route('city_list')}}">City</a></li>
                        <li><a href="{{route('airport_list')}}">Airport</a></li>
                        @if (Auth::check())
                    <li style="font-weight:bold;font-size:20px;color:#000"><a href="{{route('edit-profile')}}">{{Auth::user()->name}}</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                        @else
                            <li><a href="login-get">Log In</a></li>
                            <li><a href="{{route('register')}}">Register</a></li>
                        @endif
                        

                    </ul>
                </div>
            </div>
        </nav>
    </header>