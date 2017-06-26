<header class="main-header">
    <div class="container">
        <a class="logo" href="/"><img src="{{ asset('assets/img/logo.svg',env('URL_SSL')) }}" alt="MODIFIN"></a>
        <a class="btn-menu" href="javascript:void(0);">
            <span class="normal"></span>
            <span class="active"></span>
        </a>
    </div>
    <nav class="main-nav">
        <div class="container">
            @if(env('APP_ENV') == 'prod')
                <a href="{{secure_url('')}}">หน้าแรก</a>
                <a href="{{secure_url('activity')}}">เลือกรถ</a>
                <a href="{{secure_url('gallery')}}">MSX125SF ของคุณ</a>
                <a href="{{secure_url('how-to-play')}}">วิธีการเล่น</a>
                <a href="{{secure_url('terms-of-use')}}">ข้อตกลงในการใช้งาน</a>
            @else
                <a href="{{url('')}}">หน้าแรก</a>
                <a href="{{url('activity')}}">เลือกรถ</a>
                <a href="{{url('gallery')}}">MSX125SF ของคุณ</a>
                <a href="{{url('how-to-play')}}">วิธีการเล่น</a>
                <a href="{{url('terms-of-use')}}">ข้อตกลงในการใช้งาน</a>
            @endif
        </div>
    </nav>
</header>
