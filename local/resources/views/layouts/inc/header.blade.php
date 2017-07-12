<header class="main-header">
    <div class="container">
        <a class="logo" href="{{secure_url('')}}"><img src="{{ asset('assets/img/logo.png',env('URL_SSL',true)) }}" alt="Nestle"></a>
        <a class="btn-menu" href="javascript:void(0);">
            <span class="normal"></span>
            <span class="active"></span>
        </a>
    </div>
    <nav class="main-nav">
        <div class="container">
                <a href="{{secure_url('')}}">หน้าแรก</a>
                <a href="{{secure_url('activity')}}">เริ่มเล่น</a>
                <a href="{{secure_url('how-to-play')}}">วิธีการร่วมกิจกรรม</a>
                <a href="https://www.nestle.co.th/th/info/yourdata" target="_blank" rel="noopener noreferrer">Privacy Policy</a>
        </div>
    </nav>
</header>
