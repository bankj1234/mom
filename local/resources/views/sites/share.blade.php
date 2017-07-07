<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>Nestle Mom</title>
    <meta name="description" content="">
    <meta name="keywords" content="nestle">
    <meta name="author" content="SPK">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
    <meta property="og:image" content="{{ asset('/assets/uploads',env('URL_SSL')) }}/{{$id}}/mom.gif">
    <meta property="og:url" content="{{ asset('/assets/uploads',env('URL_SSL')) }}/{{$id}}/mom.gif">
    <link href="{{ asset('/assets/js/crop/cropper.min.css',env('URL_SSL')) }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/css/style.css',env('URL_SSL')) }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/css/core/master.css',env('URL_SSL')) }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/js/fancybox/jquery.fancybox.css',env('URL_SSL')) }}" rel="stylesheet"/>
    <script src="{{ asset('/assets/js/core/jquery.min.js',env('URL_SSL')) }}"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('/assets/js/core/html5shiv.js',env('URL_SSL')) }}"></script>
    <![endif]-->
</head>
<body>
<header class="main-header">
    <div class="container">
        <a class="logo" href="{{url('')}}"><img src="{{ asset('assets/img/logo.png',env('URL_SSL')) }}" alt="Nestle"></a>
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
        <img src="{{ asset('/assets/uploads',env('URL_SSL')) }}/{{$id}}/mom.gif" alt="">
    </div>
</div>

<footer class="main-footer">
    <a href="https://www.nestle.co.th/th/info/yourdata" target="_blank" class="twitterbird" rel="noopener noreferrer">
    </a>
</footer>
<div style="display:none;">
    <!-- popup loading-->
    <div class="popup-loading" id="popup-loading">
        <div class="popup-inner">
            <div class="box-loading">
                <span class="txt">ระบบกำลังทำงาน กรุณารอสักครู่</span>
                <div id="circleG">
                    <div id="circleG_1" class="circleG"></div>
                    <div id="circleG_2" class="circleG"></div>
                    <div id="circleG_3" class="circleG"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end popup loading -->
</div>
</div>
<script src="{{ asset('assets/js/core/jquery.easing.js',env('URL_SSL')) }}"></script>
<script src="{{ asset('assets/js/core/jquery.mousewheel.js',env('URL_SSL')) }}"></script>
<script src="{{ asset('assets/js/core/detectmobilebrowser.js',env('URL_SSL')) }}"></script>
<script src="{{ asset('assets/js/core/jquery.transit.min.js',env('URL_SSL')) }}"></script>
<script src="{{ asset('assets/js/fancybox/jquery.fancybox.pack.js',env('URL_SSL')) }}"></script>
<script src="{{ asset('assets/js/crop/cropper.min.js',env('URL_SSL')) }}"></script>
<script src="{{ asset('assets/js/slidebox.min.js',env('URL_SSL')) }}"></script>
<script src="{{ asset('assets/js/function.js',env('URL_SSL')) }}"></script>

</body>
</html>