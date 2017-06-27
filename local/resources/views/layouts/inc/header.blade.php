<header class="main-header">
    <div class="container">
        <a class="logo" href="/"><img src="{{ asset('assets/img/logo.png',env('URL_SSL')) }}" alt="Nestle"></a>
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
                <a href="{{url('terms-of-use')}}">Privacy Policy</a>
        </div>
    </nav>
</header>
