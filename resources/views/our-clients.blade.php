@extends('layout')
@section('content')
<main id="main">
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Our Clients</h2>
                        <ul class="page-title-link">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{request()->url()}}">Our clients</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="services">
        <div class="container wow fadeIn">
            <div class="section-header">
                <p class="section-description">{{ setting('clients.text') }}</p>
            </div>
            <div class="row">
                @php $clients = app('App\Models\Client')->all()->sortBy('position') @endphp
                @foreach($clients as $client)
                <div class="col-lg-4 col-md-6 wow fadeInUp"
                     data-wow-delay="0.2s">
                    <div class="box"
                         style="padding: 5px;height: 350px;">
                        <div class="mb-3">
                            <img src="{{ app('filesystem')->url($client->image) }}"
                                 class="certificates_img"
                                 alt="">
                        </div>
                        <h4 class="title"><a href="javascript:void(0);">{{ $client->name }}</a></h4>
                        <p class="description">{{ $client->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- #services -->
    @endsection