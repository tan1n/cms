@extends('layout')
@section('content')
<main id="main">
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Container -->
    <div class="container my-5">
        <div class="info row">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <i class="fa fa-map-marker mr-3"></i>
                <p class="m-0">{{setting('site.address')}}</p>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <i class="fa fa-envelope mr-3"></i>
                <a class="m-0"
                   href="mailto:{{setting('site.email')}}">{{setting('site.email')}}</a>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <i class="fa fa-phone mr-3"></i>
                <a class="m-0"
                   href="tel:{{setting('site.phone')}}">{{setting('site.phone')}}</a>
            </div>
        </div>

        <div class="container mt-5 wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Contact Us</h3>
                <p class="section-description">Get in touch with us</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 rounded">
                <iframe src="{{ setting('site.gmaps_url') }}"
                        width="100%"
                        height="380"
                        frameborder="0"
                        style="border:0"
                        allowfullscreen></iframe>
            </div>
            <div class="col-md-5">
                <div class="container wow fadeInUp">
                    @include('includes.contact-form')
                </div>
            </div>
        </div>
        <div class="social-links d-flex justify-content-center mt-5">
            @if(setting('site.twitter'))
            <a href="//{{setting('site.twitter')}}"
               class="twitter mx-4"><i class="fa fa-twitter fa-2x"></i></a>
            @endif
            @if(setting('site.facebook'))
            <a href="//{{setting('site.facebook')}}"
               class="facebook mx-4"><i class="fa fa-facebook fa-2x"></i></a>
            @endif
            @if(setting('site.instagram'))
            <a href="//{{setting('site.instagram')}}"
               class="instagram mx-4"><i class="fa fa-instagram fa-2x"></i></a>
            @endif
            @if(setting('site.linkedin'))
            <a href="//{{setting('site.linkedin')}}"
               class="linkedin mx-4"><i class="fa fa-linkedin fa-2x"></i></a>
            @endif
        </div>
    </div>

</main>
@endsection