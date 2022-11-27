@extends('layout')
@section('content')
<main id="main">
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Career</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Container -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-7">
                <h1><strong>{{ setting('career.headline') }}</strong></h1>
                <hr>
                {!! setting('career.text') !!}
            </div>
            <div class="col-md-5 d-flex align-items-center">
                <img src="{{ str_replace("\\",'/',app('filesystem')->url(setting('career.image'))) }}"
                    class="img-fluid rounded">
            </div>
        </div>
    </div>

    <!-- career accordian -->
    @php $jobs = app('App\Job')->where('deadline','>',now()->toDateString())->get(); @endphp
    <div class="container my-5 ">
        <h3 class="text-center mb-4">Available jobs</h3>
        <div class="mx-auto">
            <div class="accordion shadow">
                @foreach ($jobs as $job)
                <div class="card mb-2">
                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                        <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                data-target="#job-{{$job->id}}" aria-expanded="true" aria-controls="job-{{$job->id}}"
                                class="d-block position-relative text-dark text-uppercase collapsible-link py-2">{{$job->title}}</a>
                        </h6>
                    </div>
                    <div id="job-{{$job->id}}" aria-labelledby="headingOne" class="collapse show">
                        <div class="card-body">
                            <ul class="unstyled row px-2">
                                <li class="mx-2">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <strong>{{$job->type}}</strong>
                                </li>
                                <li class="mx-2">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <strong>{{$job->vacancy}}</strong>
                                </li>
                                <li class="mx-2">
                                    <i class="fa fa-laptop" aria-hidden="true"></i>
                                    <strong>{{$job->position}}</strong>
                                </li>
                            </ul>
                            <div class="mt-2">
                                <h5 class="text-dark">Description</h5>
                                {!! $job->description !!}
                            </div>
                            <div class="mt-2">
                                <a href="//{{$job->apply_link}}" target="_blank" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>

@endsection