@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content txtC">
        <a href="gallery" class="hero-img">
            <?php /*<img src="https://s3-ap-southeast-1.amazonaws.com/msx-modifin/uploads/{{$image_show}}" alt=""> */ ?>
            <img src="{{ asset('assets/img/bike/MSX_picture-Bike_') }}<?php echo(rand(1,15)); ?>.png" alt="">
        </a>
        <div class="container">
            <p class="intro ff">
                โมดิ๊...ฟินส์ อยากซิ่ง ต้องได้ซิ่ง <br>ยังไม่มีมอเตอร์ไซค์ไว้วิ่งไม่เป็นไรเอารูปถ่ายมาโม <br>แล้วมโนว่าถนนสายนี้เป็นของเรา
            </p>
            <div class="box-btn"><a class="btnSty1" href="{{ url('activity') }}"><span>เล่น</span></a></div>
        </div>
    </div>
@endsection
@section('javascript')
@section('javascript-content')
@endsection
@section('footer')