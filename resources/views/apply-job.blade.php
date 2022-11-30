@extends('layout')
@section('content')
<main id="main">
    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>{{ 'Agile1Tech Career' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-7">
                <h1>{{ data_get($job,'title') }}</h1>
                <hr>
                {!! data_get($job,'description') !!}
            </div>
        </div>
        @if(session('message'))
        <span style="color: darkgreen">{{session('message')}}</span>
        @endif
        <form action="{{ request()->url() }}"
              method="post"
              role="form"
              id="apply-form"
              class="contactForm mt-4"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text"
                       required=""
                       name="name"
                       class="form-control"
                       id="name"
                       value="{{old('name')}}"
                       placeholder="Your Name">
                <span style="color:red"
                      class="d-none"
                      id="invalid-name">Invalid name format</span>
            </div>
            <div class="form-group">
                <input type="email"
                       required=""
                       class="form-control"
                       name="email"
                       id="email"
                       value="{{old('email')}}"
                       placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="number"
                       required=""
                       class="form-control"
                       name="phone"
                       value="{{old('phone')}}"
                       placeholder="Phone number">
            </div>
            <div class="form-group">
                <label for="">Resume (PDF only)</label>
                <input type="file"
                       required=""
                       accept="application/pdf"
                       class="form-control"
                       name="resume">
            </div>
            <div class="g-recaptcha"
                 data-sitekey="6LcpkSgjAAAAABzfqiIrQWzFQ0TeT5vJTeSuv3d7"></div>
            @if($errors->has('g-recaptcha-response'))
            <span style="color:red">Invalid captcha</span>
            @endif
            <div class="text-center">
                <button type="submit"
                        class="btn btn-primary">Apply</button>
            </div>
        </form>
    </div>
</main>
<script src="https://www.google.com/recaptcha/api.js"
        async
        defer></script>
@endsection