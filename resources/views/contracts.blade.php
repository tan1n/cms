@extends('layout')
@section('content')
<main id="main">
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>{{ $contract->name }}</h2>
                        <ul class="page-title-link">
                            <li><a href="#">Contract vehicles</a></li>
                            <li><a href="{{request()->url()}}">{{ $contract->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Container -->

    <div class="container my-5">
        <div class="row">
            <div class="col-md-7">
                <h1>{{ $contract->full_name }}</h1>
                <hr>
                {!! $contract->description !!}
            </div>
            <div class="col-md-5 d-flex align-items-center">
                <img src="{{ app('filesystem')->url($contract->image) }}" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="p-5 contact-information">
            <h2 class="primary-text font-weight-bold text-center">Contract Information</h2>
            <div class="text-center">
                {!! $contract->contract_information !!}
            </div>
        </div>
    </div>

    <!-- middle container -->

    {{-- <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-weight-bold">SPARC</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi est illo earum minus animi corrupti
                    saepe laudantium cupiditate, officia repudiandae non odit, dolore obcaecati hic maiores culpa qui
                    pariatur mollitia? Voluptatibus molestiae eum id ullam inventore tenetur repellendus ea iusto
                    cumque, libero nisi cum a aspernatur asperiores, illum quaerat autem.
                </p>
            </div>
            <div class="col-md-12">
                <h2 class="font-weight-bold">For General Inquires:</h2>
                <hr>
                <ul class="unstyled">
                    <li>Scott Muir</li>
                    <li>(256) 963-0132</li>
                    <li>smuir@allpointsllc.com</li>
                </ul>
            </div>
        </div>
    </div> --}}

    <!-- end container -->
</main>
@endsection