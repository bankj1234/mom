@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content txtC">
        <div class="hero-img">
            <img src="{{ asset('assets/img/landing.png') }}" alt="">
        </div>
        <div class="hero-text">
            <img src="{{ asset('assets/img/landing_text.png') }}" alt="">
        </div>
        <div class="btn-group">
            <div class="col-10"></div>
            <div class="col-35"><a class="btn-landing-gallery" href=""></a></div>
            <div class="col-10"></div>
            <div class="col-35"><a class="btn-landing-howto" href=""></a></div>
            <div class="col-10"></div>
            <a href="{{ url('activity') }}" class="btn-start"></a>
        </div>


    </div>
@endsection
@section('javascript')
@section('javascript-content')
@endsection
@section('footer')