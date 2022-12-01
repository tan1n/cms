@extends('layout')

@section('content')
<!--==========================
    Hero Section
  ============================-->
<section id="hero">
    <video id="background-video"
           autoplay
           loop
           muted
           preload="none">
        <source src="{{asset('img/hero-bg-video.mp4')}}"
                type="video/mp4">
    </video>
    <div class="hero-container">
        <h1>{{setting('home.headline')}} <span class="primary-text">{{ setting('home.subtext')}}</span></h1>
        <h2>{{setting('home.slogan')}}</h2>
    </div>
</section><!-- #hero -->

<main id="main">
    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
        <div class="container-fluid wow fadeIn">
            <div class="row">
                <div class="col-lg-9 mx-auto text-center">
                    <h3 class="cta-title">{{ setting('home.why_us_header') }}</h3>
                    <p class="cta-text"> {{ setting('home.why_us_text') }}</p>
                </div>
                {{-- <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#contact">Contact us</a>
                </div> --}}
            </div>

        </div>
    </section>
    <!-- #call-to-action -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">{{ setting('home.services_header') }}</h3>
                <p class="section-description">{{ setting('home.services_text') }}</p>
            </div>
            <div class="row">
                @php $services = app('App\Service')->all() @endphp
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6 wow fadeInUp"
                     data-wow-delay="0.2s">
                    <div class="box">
                        <div class="icon"><a href="javascript:void(0);"><i class="{{$service->icon}}"></i></a></div>
                        <h4 class="title"><a href="javascript:void(0);">{{ $service->title }}</a></h4>
                        <p class="description">{{ $service->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- #services -->
    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action"
             style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
    url({{asset('img/career.jpg')}}) fixed center center;">
        <div class="container-fluid wow fadeIn">
            <div class="row">
                <div class="col-lg-9 mx-auto text-center">
                    <p class="cta-text"> {{ setting('home.section_text') }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- #call-to-action -->
    <!--==========================
      Portfolio Section
    ============================-->
    <div id="certifications">
        <section id="portfolio">
            <div class="container wow fadeInUp">
                <div class="section-header">
                    <h3 class="section-title">{{ setting('home.certification_header') }}</h3>
                    <p class="section-description">{{ setting('home.certification_text') }}</p>
                </div>
                {{-- <div class="row">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web" class="filter-active">All
                        </li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-logo">Logo</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div> --}}
                @php $contracts = app('App\Certification')->all()->sortBy('serial_no'); @endphp
                <div class="row ">
                    @foreach($contracts as $contract)
                    <div class="col-lg-4 col-md-6 p-4 d-flex align-items-center justify-content-center">
                        <img src="{{ app('filesystem')->url($contract->image) }}"
                             class="certificates_img"
                             alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <!-- #portfolio -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Contact Us</h3>
                <p class="section-description">Get in touch with us</p>
            </div>
        </div>

        <!-- Uncomment below if you wan to use dynamic maps -->
        <iframe src="{{setting('site.gmaps_url')}}"
                width="100%"
                height="380"
                frameborder="0"
                style="border:0"
                allowfullscreen></iframe>

        <div class="container wow fadeInUp mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4">
                    <div class="info">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>{{setting('site.address')}}</p>
                        </div>
                        <div>
                            <i class="fa fa-envelope"></i>
                            <p><a href="mailto:{{setting('site.email')}}">{{setting('site.email')}}</a></p>
                        </div>
                        <div>
                            <i class="fa fa-phone"></i>
                            <p><a href="tel:{{setting('site.phone')}}">{{setting('site.phone')}}</a></p>
                        </div>
                    </div>
                    <div class="social-links">
                        @if(setting('site.twitter'))
                        <a href="//{{setting('site.twitter')}}"
                           target="_blank"
                           class="twitter"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if(setting('site.facebook'))
                        <a href="//{{setting('site.facebook')}}"
                           target="_blank"
                           class="facebook"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if(setting('site.instagram'))
                        <a href="//{{setting('site.instagram')}}"
                           target="_blank"
                           class="instagram"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if(setting('site.linkedin'))
                        <a href="//{{setting('site.linkedin')}}"
                           target="_blank"
                           class="linkedin"><i class="fa fa-linkedin"></i></a>
                        @endif
                    </div>

                </div>

                <div class="col-lg-5 col-md-8">
                    @include('includes.contact-form')
                </div>

            </div>

        </div>
    </section><!-- #contact -->
</main>
@endsection