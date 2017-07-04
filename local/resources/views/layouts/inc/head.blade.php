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
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png',env('URL_SSL')) }}"/>
    <link href="{{ asset('/assets/js/crop/cropper.min.css',env('URL_SSL')) }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/css/core/master.css',env('URL_SSL')) }}" rel="stylesheet"/>
    <link href="{{ asset('/assets/js/fancybox/jquery.fancybox.css',env('URL_SSL')) }}" rel="stylesheet"/>
    <script src="{{ asset('/assets/js/core/jquery.min.js',env('URL_SSL')) }}"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('/assets/js/core/html5shiv.js',env('URL_SSL')) }}"></script>
    <![endif]-->

</head>
<body>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '{{ env('GA_ID') }}', 'auto');
    ga('send', 'pageview');
</script>
<div class="main-container">