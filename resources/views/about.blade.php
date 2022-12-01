@extends('layout')
@section('content')
<main id="main">
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>About Us</h2>
                        <ul class="page-title-link">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{request()->url()}}">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==========================
      Key members Team Section
    ============================-->
    <section class="team">
        <div class="container wow fadeInUp">
            <div class="section-header mb-5">
                <h3 class="section-title">Key members</h3>
            </div>
            <div class="row">
                @php $teams = app('App\Team')->where('type',1)->get(); @endphp
                @foreach($teams as $member)
                <div class="col-lg-3 col-md-6 flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="member">
                                <div class="pic"><img src="{{app('filesystem')->url($member->image)}}"
                                         alt=""></div>
                                <h4>{{$member->name}}</h4>
                                <span>{{$member->position}}</span>

                            </div>
                        </div>
                        <div class="flip-card-back p-2">
                            <p>{{$member->bio}}</p>
                            <div class="social">
                                <a href="{{$member->linked_in_url}}"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="{{app('filesystem')->url($member->image)}}" alt="">
            </div>
            <h4>{{$member->name}}</h4>
            <span>{{$member->position}}</span>
            <div class="social">
                <a href="{{$member->linked_in_url}}"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        </div> --}}
        @endforeach
        </div>

        </div>
    </section>
    <!-- #team -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">
            <div class="row about-container">

                <div class="col-lg-6 content order-lg-1 order-2">
                    <h2 class="title">Few Words About Us</h2>
                    <p>
                        {{ setting('about-us.main_text') }}
                    </p>

                    <div class="icon-box wow fadeInUp">
                        <div class="icon"><i class="{{ setting('about-us.icon_1') }}"></i></div>
                        <h4 class="title"><a href="javascript:void(0);">{{ setting('about-us.headline_1') }}</a></h4>
                        <p class="description">{{ setting('about-us.sub_1') }}</p>
                    </div>

                    <div class="icon-box wow fadeInUp"
                         data-wow-delay="0.2s">
                        <div class="icon"><i class="{{ setting('about-us.icon_2') }}"></i></div>
                        <h4 class="title"><a href="javascript:void(0);">{{ setting('about-us.headline_2') }}</a></h4>
                        <p class="description">{{ setting('about-us.sub_2') }}</p>
                    </div>

                    <div class="icon-box wow fadeInUp"
                         data-wow-delay="0.4s">
                        <div class="icon"><i class="{{ setting('about-us.icon_3') }}"></i></div>
                        <h4 class="title"><a href="javascript:void(0);">{{setting('about-us.headline_3')}}</a></h4>
                        <p class="description">{{ setting('about-us.sub_3') }}</p>
                    </div>
                </div>
                @php $image = asset('storage/'.setting('about-us.image')); @endphp
                <div class="col-lg-6 order-lg-2 order-1 wow fadeInRight"
                     style="background: url({{str_replace("\\", "/", $image)}}) center top no-repeat;">
                </div>
            </div>

        </div>
    </section><!-- #about -->


    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <p class="cta-text"> {{ setting('about-us.bottom_text') }}</p>
                </div>
            </div>

        </div>
    </section>
    <!-- #call-to-action -->
    <!--==========================
       Team Section
    ============================-->
    @php $teams = app('App\Team')->where('type',2)->get(); @endphp
    @if(!blank($teams))
    <section class="team">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Meet the team</h3>
                <p class="section-description">Our team of talented and experienced professionals can benefit public and
                    private clients, through exceptional service while complying with the regulatory framework</p>
            </div>

            <div class="row">
                @foreach($teams as $member)
                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="{{app('filesystem')->url($member->image)}}"
                                 alt=""></div>
                        <h4>{{$member->name}}</h4>
                        <span>{{$member->position}}</span>
                        <div class="social">
                            <a href="{{$member->linked_in_url}}"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    @endif
    <!-- #team -->

    {{-- <!--==========================
      Facts Section
    ============================-->
    <section id="facts">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">Projects</h3>
                <p class="section-description">Our total projects for government</p>
            </div>
            <div class="row counters">
                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">232</span>
                    <p>Clients</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">521</span>
                    <p>Projects</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1,463</span>
                    <p>Hours Of Support</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Team Member</p>
                </div>

            </div>

        </div>
    </section><!-- #facts --> --}}

    <!-- accordion start -->
    {{-- <div class="container my-5 ">
        <h3 class="text-center mb-4">FAQ</h3>
        <div class="mx-auto">
            <!-- Accordion -->
            <div id="accordionExample" class="accordion shadow">
                <!-- Accordion item 1 -->
                <div class="card mb-2">
                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                        <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne"
                                class="d-block position-relative text-dark text-uppercase collapsible-link py-2">What
                                we
                                are ?</a></h6>
                    </div>
                    <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample"
                        class="collapse show">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life
                                accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                skateboard
                                dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                et.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Accordion item 2 -->
                <div class="card mb-2">
                    <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                        <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo"
                                class="d-block position-relative collapsed text-dark text-uppercase collapsible-link py-2">What
                                we do ?</a></h6>
                    </div>
                    <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life
                                accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                skateboard
                                dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                et.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Accordion item 3 -->
                <div class="card">
                    <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                        <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                                class="d-block position-relative collapsed text-dark text-uppercase collapsible-link py-2">What
                                team we have ?</a></h6>
                    </div>
                    <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample"
                        class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high
                                life
                                accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                skateboard
                                dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                et.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</main>
@endsection