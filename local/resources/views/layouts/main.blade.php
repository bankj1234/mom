@section('head')
    @include('layouts.inc.head')
@show
@section('header')
    @include('layouts.inc.header')
@show
@yield('content')
@section('javascript')
    @include('layouts.inc.javascript')
@show

@yield('javascript-content')

@section('footer')
    @include('layouts.inc.footer')
@show