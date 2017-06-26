@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content txtC">
        <div class="container txtC">
            <div class="row">
                <section class="section-select" id="step_1">
                    <h2 class="section-title ">1 : เลือกรถ</h2>
                    <figure class="box-mdf-img">
                        <div class="box-img-space">
                            <a class="btn-step-select" href="javascript:void(0);">
                                <span class="mdf-img"><span class="img"></span></span>
                                <span class="btnSty1"><span>เลือก MSX คันนี้</span></span>
                            </a>
                            <img class="img_w" src="{{ asset('assets/img/img_space.png',env('URL_SSL')) }}" alt="">
                        </div>
                    </figure>
                    <div class="select-bike">
                        <?php for ($i=1; $i <= 15; $i++) { ?>
                        <a class="item" href="javascript:void(0);" rel="<?php echo $i; ?>"><img src="{{ asset('assets/img/bike',env('URL_SSL')) }}/MSX_picture-Bike_<?php echo $i; ?>.png" alt=""/></a>
                        <?php } ?>
                    </div>
                </section>
                <section class="section-select-browse" id="step_2">
                    <h2 class="section-title ">2 : เลือกรูป</h2>
                    <figure class="box-mdf-img" id="preview-img">
                        <div class="box-img-space">
                            <div class="mdf-img">
                                <div class="img"></div>
                                <div class="img-browse">
                                    <img id="image" src="" alt="">
                                    <div class="box-webcam hidden-xs">
                                        <video id="video" width="480" height="360" autoplay></video>
                                        <canvas id="video_snap" width="480" height="480" style="display:none;"></canvas>
                                    </div>
                                </div>
                                <div class="img-finish"></div>
                            </div>
                            <img class="img_w" src="{{ asset('assets/img/img_space.png',env('URL_SSL')) }}" alt="">
                        </div>
                    </figure>
                    <div class="box-btn box-btn-browse">
						<span class="btn-browse btn-img-txt">
							<input type="file" id="import_image" accept="image/*"/>
							<span class="img"><img src="{{ asset('assets/img/ico_file.svg',env('URL_SSL')) }}" alt=""></span>
							<span class="txt">เลือกรูป</span>
						</span>
                        <button class="btn-webcam btn-img-txt hidden-xs">
                            <span class="img"><img src="{{ asset('assets/img/ico_webcam.svg',env('URL_SSL')) }}" alt=""></span>
                            <span class="txt">ถ่ายรูป</span>
                        </button>
                    </div>
                    <div class="btn-edit-img">
                        <h3>ซูม</h3>
                        <input class="input-slider" type="range" id="zoom" min='0' max='2' step='0.1'/>
                        <h3>หมุน</h3>
                        <input class="input-slider" type="range" id="rotate" min='-45' max='45' step='1'/>
                        <div class="box-btn">
                            <button class="btnSty1" onclick="finish();"><span>FIN</span></button>
                        </div>
                    </div>
                    <div class="box-btn btn-finish-img">
                        <a class="btn-save btn-img-txt" href="#" target="_blank">
                            <span class="img"><img src="{{ asset('assets/img/ico_save.svg',env('URL_SSL')) }}" alt=""></span>
                            <span class="txt">บันทึก</span>
                        </a>
                        <a class="btn-share btn-img-txt" href="#">
                            <span class="img"><img src="{{ asset('assets/img/ico_share.svg',env('URL_SSL')) }}" alt=""></span>
                            <span class="txt">แชร์</span>
                        </a>
                        <a class="btn-play-again btn-img-txt" onclick="location.reload();" href="javascript:void(0);">
                            <span class="img"><img src="{{ asset('assets/img/ico_play-again.svg',env('URL_SSL')) }}" alt=""></span>
                            <span class="txt">เล่นอีกครั้ง</span>
                        </a>
                    </div>
                    <div class="btn-snap-webcam box-btn">
                        <button id="snap_webcam" class="btnSty1"><span>FIN</span></button>
                    </div>
                </section>
            </div>
        </div>
        <div class="crop-result"></div>
        <canvas id="result-canvas" width="600" height="600" style="display:none;"></canvas>
    </div>
@endsection
@section('javascript')
@section('javascript-content')
    <script>
        var image = new Object();
        image.el = $('#image');
        image.crop;
        image.width = 480;
        image.size = 600;
        image.style_index = 1;
        image.style_path = "<img src='{{ asset('assets/img/bike/MSX_picture-Bike_1.png',env('URL_SSL')) }}'/>";

        $(document).ready(function(){

            fn_modifin_init();

            $('.btn-step-select').click(function(e){
                step_2();
                GA_select_style(image.style_index);
                e.preventDefault();
            })

            $('#rotate').on('input', function (event) {
                image.el.cropper('rotateTo',$(this).val());
            });
            $('#zoom').on('input', function (event) {
                image.el.cropper('zoomTo',$(this).val());
            });
            image.el.on('zoom',function(e){
                //console.log(e.ratio);
                $('#zoom').val(e.ratio);
                if(e.ratio >= '2'){
                    e.preventDefault();
                }
            });
            $('#import_image').on('change', function () { readFile(this); });

        });
        function fn_modifin_init(){
            /* select msx init */
            $('.mdf-img .img').html(image.style_path);
            $('.select-bike .item').removeClass('active');
            $('.select-bike .item[rel="0"]').addClass('active');
            $('.select-bike').owlCarousel({
                loop:true,
                margin:5,
                nav:true,
                pullDrag:false,
                smartSpeed:200,
                responsive:{
                    0:{
                        items:3,
                        slideBy:1,
                    },
                    600:{
                        items:3,
                        slideBy:3
                    },
                    1000:{
                        items:5,
                        slideBy:5
                    }
                }
            });
            $('.select-bike .item').click(function(e) {
                image.style_index = $(this).attr('rel');
                image.style_path = $(this).html();
                $('.select-bike .item').removeClass('active');
                $(this).addClass('active');
                $('.mdf-img .img').html(image.style_path);
            });
            webcam_init();
            step_init();
        }
        function step_init(){
            $('#step_2').hide();
            btn_edit_img_hide();
            btn_finish_img_hide();
            btn_snap_webcam_hide();
        }
        /* select bike */
        function step_1(){

        }
        /* browse img */
        function step_2(){
            $('#step_1').hide();
            $('#step_2').show();
        }
        /* crop img */
        function step_3(){
            $('.box-btn-browse').hide();
            btn_edit_img_show();
            $('.section-select-browse .section-title').html('3 : ปรับแต่งรูป');
        }
        /* finish img */
        function step_4(){
            $('#preview-img .img,#preview-img .img-browse').hide();
            $('.section-select-browse .section-title').html('แชร์...สไตล์คุณ');
            btn_edit_img_hide();
            btn_finish_img_show();
            btn_snap_webcam_hide();
        }
        function btn_edit_img_show(){
            $('.btn-edit-img').show();
        }
        function btn_edit_img_hide(){
            $('.btn-edit-img').hide();
        }
        function btn_finish_img_show(){
            $('.btn-finish-img').show();
        }
        function btn_finish_img_hide(){
            $('.btn-finish-img').hide();
        }
        function btn_snap_webcam_show(){
            $('.btn-snap-webcam').show();
        }
        function btn_snap_webcam_hide(){
            $('.btn-snap-webcam').hide();
        }
        function fn_save_img(){}
        function fn_share_img(){}

        function crop_init(){
            image.el.cropper('destroy');
            image.el.cropper({
                viewMode: 0,
                dragMode: 'move',
                restore: false,
                guides: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                ready:function(){
                    image.el.cropper("setCropBoxData", { left: 0, top: 0, width: 480, height: 480 });
                    $('.cropper-drag-box').addClass('sty-'+image.style_index);
                    $('.section-select-browse .section-title').html('3 : ปรับแต่งรูป');
                }
            });
        }
        function finish(){
            var canvas_crop = image.el.cropper('getCroppedCanvas',{width:image.size,height:image.size});
            var canvas_crop_data = canvas_crop.toDataURL('image/png');
            uploadFile(canvas_crop_data);
        }
        function uploadFile(dataURL) {
            popup_loading();
            var task = image.style_index;
            var token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                url: "@if(env('APP_ENV') == 'prod'){{ secure_url('image/upload') }}@else{{ url('image/upload') }}@endif",
                data: {
                    'image': dataURL,
                    "_token": token,
                    'frame': image.style_index
                }
            }).done(function (data) {
                step_4();
                $('.img-finish').html('<img src="' + $.parseJSON(data).fullpath + '"/>');
                $('.btn-save').attr('href', '' + $.parseJSON(data).fullpath + '');
                $('.btn-share').click(function (event) {
                    console.log(task);
                    shareImage($.parseJSON(data).fullpathshare,task);
                });
                $.fancybox.close();
            });
        }
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.section-select-browse .box-mdf-img .img').hide();
                    $('.section-select-browse .box-mdf-img .img-browse').addClass('show');
                    $('.img-browse').addClass('sty-'+image.style_index);
                    $('#image').attr('src',e.target.result);
                    step_3();
                    crop_init();
                }
                reader.readAsDataURL(input.files[0]);
            } else {

            }
        }
        function webcam_init(){
            var video = document.getElementById('video');
            var canvas_webcam = document.getElementById('video_snap');
            var ctx = canvas_webcam.getContext('2d');
            $('.box-webcam').hide();
            $('.btn-webcam').click(function(){
                // Get access to the camera!
                if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    // Not adding `{ audio: true }` since we only want video now
                    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                        video.src = window.URL.createObjectURL(stream);
                        video.play();
                    });
                }
                $('.box-btn-browse').hide();
                $('.box-webcam,.btn-snap-webcam').show();
                $('.section-select-browse .box-mdf-img .img-browse').addClass('show');
                $('.section-select-browse .section-title').html('2 : ถ่ายรูป');
            });
            // Trigger photo take & mock-up
            document.getElementById("snap_webcam").addEventListener("click", function() {
                ctx.clearRect(0, 0, canvas_webcam.width, canvas_webcam.height);
                ctx.translate(canvas_webcam.width, 0);
                ctx.scale(-1, 1);
                ctx.drawImage(video, 0, 0, image.width, 360);
                $('#image').attr('src',canvas_webcam.toDataURL());
                ctx.setTransform(1,0,0,1,0,0);
                $('.section-select-browse .box-webcam,#snap_webcam').hide();
                $('.section-select-browse .box-mdf-img .img-browse').addClass('show');
                uploadFile(canvas_webcam.toDataURL());
            });
        }
        function shareImage(img,task) {
            var id = "@if(env('APP_ENV') == 'prod'){{ secure_url('') }}@else{{ url('') }}@endif";
            var img = img;
            var task = parseInt(task);
            var text_title;
            //console.log(task);
            switch (task) {
                case 6:
                case 11:
                case 14:
                    text_title = "คุณคือ\"สายซิ่ง\" วิ่งแซงนรก แต่ตายตอนจบ เพราะ มาติดที่แยกไฟแดง";
                    break;
                case 10:
                case 4:
                case 3:
                case 15:
                    text_title = "คุณคือ\"สายเท่ชอบแอ็ค\" ไม่มีซิกแพ็ค แอ็คแล้วสาวไม่มอง";
                    break;
                case 1:
                case 9:
                case 12:
                case 13:
                    text_title = "คุณคือ \"สายบ้าพลัง\" ทำตัวคลั่งอย่างกับอยู่ในสงคราม จนคนถาม \"ที่ขี่นั้นรถถังหรือ MSX125SF\"";
                    break;
                case 2:
                case 5:
                case 8:
                case 7:
                    text_title = "คุณคือ \"สายแหว๋ว\" มีความแต๋วบางเวลา เน้นชิลล์ไม่เน้นมีเรื่อง";
                    break;
            }
            //console.log(text_title);
            FB.ui(
                {
                    method: 'share',
                    href: id,     // The same than link in feed method
                    title: text_title,  // The same than name in feed method
                    picture: img,
                    caption: "Modifin Thailand",
                    description: 'มีมอไซค์หรือไม่มีคุณก็ร่วมเป็นส่วนหนึ่งของ Modifin Thailand ได้เช่นกัน อยากรู้ว่าตัวเองเป็นสายไหน คลิกเลย!',
                },
                function (response) {
                    if (response && !response.error_message) {
                        setShare();
                    }
                });
        }

        function setShare() {
            var token = "{{ csrf_token() }}";
            $.post(
                "@if(env('APP_ENV') == 'prod'){{ secure_url('./set-share') }}@else{{ url('./set-share') }}@endif"
                , {"_token": token}, function (data) {

                }
            )
            ;
        }
    </script>
@endsection
@section('footer')