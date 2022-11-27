<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ setting('site.title') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{asset('img/logo.png')}}" rel="icon">

    <!-- <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>

    <!--==========================
    Header
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="{{route('home')}}"><img src="{{asset('img/logo.png')}}" alt="" title="" /></img></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="#hero">Regna</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="{{ request()->url() === route('home') ? "menu-active" : "" }}"><a href="/">Home</a></li>
                    <li
                        class="menu-has-children {{ in_array('contracts',request()->segments()) ? "menu-active" : "" }}">
                        <a href="javascript:void(0);">Government</a>
                        <ul>
                            <li class="menu-has-children"><a href="{{ route('capabilities') }}">Capability Statement</a>
                            <li class="menu-has-children"><a href="javascript:void(0);">Contract vehicles</a>
                                @php $contracts = app('App\Contract')->all(); @endphp
                                <ul>
                                    @foreach($contracts as $contract)
                                    <li>
                                        <a href="{{ route('contract',$contract->name) }}">{{$contract->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a
                            href="{{ request()->url() === route('home') ? "#services" : route('home').'#services'  }}">Services</a>
                    </li>
                    <li class={{ request()->url() === route('career') ? "menu-active" : "" }}><a
                            href="{{route('career')}}">Career</a></li>
                    <li class={{ request()->url() === route('about-us') ? "menu-active" : "" }}><a
                            href="{{route('about-us')}}">About Us</a></li>
                    <li class={{ request()->url() === route('contact') ? "menu-active" : "" }}><a
                            href="{{ request()->url() === route('home') ? '#contact' : route('contact') }}">Contact
                            Us</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->