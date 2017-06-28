@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content txtC">
        <div class="hero-img">
            <img src="{{ asset('assets/img/landing.png') }}" alt="">
        </div>
        <div class="hero-text">
            <img src="{{ asset('assets/img/landing_text2.png') }}" alt="">
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