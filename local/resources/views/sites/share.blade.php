<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>Nestle Mom Card</title>
    <meta name="description" content="บอกรักคุณแม่ได้ทุกวัน">
    <meta name="keywords" content="nestle,LoveYouMom,LoveMomCard,บอกรักคุณแม่ได้ทุกวัน">
    <meta name="author" content="SPK">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
    <meta property="fb:app_id" content="1468128819961218">
    <meta property="og:image" content="{{ asset('/assets/uploads',env('URL_SSL',true)) }}/{{$id}}/mom.gif">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">
    <meta property="og:title" content="Nestle Mom Card">
    <meta property="og:description" content="บอกรักคุณแม่ได้ทุกวัน">
    <meta property="og:url" content="{{ asset('/assets/uploads',env('URL_SSL',true)) }}/{{$id}}/mom.gif">
    <link href="{{ asset('/assets/css/vendor.css',env('URL_SSL',true)) }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/css/core/master.css',env('URL_SSL',true)) }}" rel="stylesheet"/>
    <script src="{{ asset('/assets/js/core/jquery.min.js',env('URL_SSL',true)) }}"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('/assets/js/core/html5shiv.js',env('URL_SSL',true)) }}"></script>
    <![endif]-->
</head>
<body>
<header class="main-header">
    <div class="container">
        <a class="logo" href="{{url('')}}"><img src="{{ asset('assets/img/logo.png',env('URL_SSL',true)) }}" alt="Nestle"></a>
        <a class="btn-menu" href="javascript:void(0);">
            <span class="normal"></span>
            <span class="active"></span>
        </a>
    </div>
    <nav class="main-nav">
        <div class="container">
            <a href="{{url('')}}">หน้าแรก</a>
            <a href="{{url('activity')}}">เริ่มเล่น</a>
            <a href="{{url('how-to-play')}}">วิธีการร่วมกิจกรรม</a>
            <a href="https://www.nestle.co.th/th/info/yourdata" target="_blank" rel="noopener noreferrer">Privacy Policy</a>
        </div>
    </nav>
</header>
<div class="content txtC">
    <div class="hero-text">
        <img src="{{ asset('/assets/uploads',env('URL_SSL',true)) }}/{{$id}}/mom.gif" alt="">
    </div>
    <div class="btn-group">
        <div class="again-btn">
            <a class="btn-play-new" href="https://www.bbnetworkgroup.com"></a>
        </div>
    </div>
</div>

<footer class="main-footer">
    <a href="https://www.nestle.co.th/th/info/yourdata" target="_blank" class="twitterbird" rel="noopener noreferrer">
    </a>
</footer>
</div>
<script src="{{ asset('assets/js/main.min.js',env('URL_SSL',true)) }}"></script>

</body>
</html>