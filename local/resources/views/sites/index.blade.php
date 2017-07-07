@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content txtC">
        <div class="hero-img">
            <div class="show-case">
                <div class="show1"><img src="{{ asset('assets/uploads/img/1.png',env('URL_SSL')) }}" alt=""></div>
                <div class="show2"><img src="{{ asset('assets/uploads/img/2.png',env('URL_SSL')) }}" alt=""></div>
                <div class="show4"><img src="{{ asset('assets/uploads/img/4.png',env('URL_SSL')) }}" alt=""></div>
                <div class="show5"><img src="{{ asset('assets/uploads/img/5.png',env('URL_SSL')) }}" alt=""></div>
                <div class="show6"><img src="{{ asset('assets/uploads/img/6.png',env('URL_SSL')) }}" alt=""></div>

                <div class="show3"><img src="{{ asset('assets/uploads/img/3.png',env('URL_SSL')) }}" alt=""></div>
                <div class="effect"></div>
            </div>


            {{--<img src="{{ asset('assets/img/landing.png') }}" alt="">--}}
        </div>
        <div class="hero-text">
            <img src="{{ asset('assets/img/landing_text2.png',env('URL_SSL')) }}" alt="">
        </div>
        <div class="btn-group">
            <div class="main-btn">
                <a class="btn-landing-start" href="{{ url('activity') }}"></a>
                <a class="btn-landing-howto" href="{{ url('how-to-play') }}"></a>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@section('javascript-content')
@endsection
@section('footer')