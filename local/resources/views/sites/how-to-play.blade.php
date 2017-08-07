@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content" style="background-color: #0a5698">
        <div class="container">
            <div class="row">
                <section class="txtC">
                    <img class="how-to-play-img" src="{{ asset('assets/img/how-to-play2.png?2',env('URL_SSL',true))}}" alt="">
                </section>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@section('javascript-content')
@endsection
@section('footer')