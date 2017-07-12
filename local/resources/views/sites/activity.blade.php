@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content txtC">
        <div class="container txtC">
            <div class="row">
                <section class="section-select" id="step_1">
                    <figure class="box-mdf-img" id="preview-img">
                        <div class="box-img-space" style="display: none;">
                            <div class="mdf-img">
                                <div class="img-browse">
                                    <img id="image" src="" alt="">
                                </div>
                                <div class="img-finish"></div>
                            </div>
                            <img class="img_w" src="{{ asset('assets/img/img_space2.png',env('URL_SSL',true)) }}" alt="">
                        </div>
                        <div class="box-btn box-btn-browse">
						<span class="btn-browse btn-img-txt">
							<input type="file" id="import_image" accept="image/*"/>
							<span class="img"><img src="{{ asset('assets/img/btn-new-upload.png',env('URL_SSL',true)) }}"
                                                   alt=""></span>
						</span>
                        </div>
                        <div class="btn-edit-img">
                            <h3>ซูม</h3>
                            <input class="input-slider" type="range" id="zoom" min='0' max='2' step='0.1'/>
                        </div>
                    </figure>
                    <figure class="box-mdf-img">
                        <div class="text-2 text-msg">
                            <div class="col-10"></div>
                            <div class="col-80"><img class="img-text" src="{{ asset('assets/img/text2.png') }}" alt="">
                            </div>
                            <div class="col-10"></div>
                        </div>
                        <div class="input-box">
                            <div class="col-10"></div>
                            <div class="col-80">
                                <input maxlength="40" id="msgTxt" class="input-msg" type="text" value=""
                                                       name="input-msg">
                            </div>
                            <div class="col-10"></div>
                        </div>
                    </figure>
                    <div class="text-3 text-frame">
                        <div class="col-10"></div>
                        <div class="col-80"><img class="img-text" src="{{ asset('assets/img/text3.png',env('URL_SSL',true)) }}" alt="">
                        </div>
                        <div class="col-10"></div>
                    </div>
                    <div class="select-bike">
                        <div class="carousel-left"><img src="{{ asset('assets/img/ico_prev-blue.png',env('URL_SSL',true)) }}"></div>
                        <div class="carousel-right"><img src="{{ asset('assets/img/ico_next-blue.png',env('URL_SSL',true)) }}"></div>
                        <div class="carousel-cont">
                            <ul class="carousel">
                        <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <li>
                                <a class="item" href="javascript:void(0);" rel="<?php echo $i; ?>">
                                    <img src="{{ asset('assets/img/frame',env('URL_SSL',true)) }}/frame<?php echo $i; ?>.png" data-caption="">
                                </a>
                            </li>
                        <?php } ?>
                                </ul>
                            </div>
                    </div>
                    <div class="btn-edit-img">
                        <div class="box-btn">
                            <button class="btnSty1" onclick="finish();"><span>เสร็จสิ้น</span></button>
                        </div>
                    </div>
                </section>
                <section class="section-select" id="step_2">
                    <div class="box-header">
                        <div class="text-2">
                            <div class="col-10"></div>
                            <div class="col-80"><img class="img-text" src="{{ asset('assets/img/result-header.png',env('URL_SSL',true)) }}"
                                                     alt=""></div>
                            <div class="col-10"></div>
                        </div>
                    </div>
                    {{--<div class="box-header"><img class="text-result" src="{{ asset('assets/img/result-header.png',env('URL_SSL',true)) }}" alt=""></div>--}}
                    <div class="img-result"></div>
                    <div class="box-share">
                        <div class="text-2">
                            <div class="col-10"></div>
                            <div class="col-80"><img class="img-text"
                                                     src="{{ asset('assets/img/result-text-share.png',env('URL_SSL',true)) }}"
                                                     alt=""></div>
                            <div class="col-10"></div>
                        </div>
                    </div>
                    <div class="box-btn btn-finish-img">
                        <a class="btn-share btn-img-txt btn-fb-share" href="#">
                            <span class="img-share"><img src="{{ asset('assets/img/btn-share-fb.png',env('URL_SSL',true)) }}"
                                                         alt=""></span>
                        </a>
                        <a class="btn-share btn-img-txt btn-line-share" href="#">
                            <span class="img-share"><img
                                        src="{{ asset('assets/img/btn-share-line.png',env('URL_SSL',true)) }}" alt=""></span>
                        </a>
                        <a class="btn-share btn-img-txt btn-fb-tw" href="#">
                            <span class="img-share"><img src="{{ asset('assets/img/btn-share-tw.png',env('URL_SSL',true)) }}"
                                                         alt=""></span>
                        </a>
                        <a class="btn-share btn-img-txt btn-save" href="#">
                            <span class="img-share"><img
                                        src="{{ asset('assets/img/btn-share-save.png',env('URL_SSL',true)) }}" alt=""></span>
                        </a>
                    </div>
                    <div class="btn-group">
                        <div class="again-btn">
                            <a class="btn-play-new" href="javascript:void(0);" onclick="location.reload();"></a>
                        </div>
                    </div>
                    <div></div>
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
        if ($(window).width() < 420) {
            var size_frame = "85";
        }else if($(window).width() < 760 && $(window).width() >= 420){
            var size_frame = "117";
        }else{
            var size_frame = "215";
        }
        slidebox({
            container : ".carousel-cont",
            leftTrigger : ".carousel-left",
            rightTrigger : ".carousel-right",
            speed : "fast",
            length : size_frame
        });

        $(document).ready(function () {
            fn_modifin_init();
            $('.btn-step-select').click(function (e) {
                step_2();
                GA_select_style(image.style_index);
                e.preventDefault();
            })

            $('#zoom').on('input', function (event) {
                image.el.cropper('zoomTo', $(this).val());
            });
            image.el.on('zoom', function (e) {
                $('#zoom').val(e.ratio);
                if (e.ratio >= '2') {
                    e.preventDefault();
                }
            });
            $('#import_image').on('change', function () {
                readFile(this);
            });

        });
        function fn_modifin_init() {
            $('.mdf-img .img').html(image.style_path);
            $('.select-bike .item').removeClass('active');
            $('.select-bike .item[rel="1"]').addClass('active');
            $('.select-bike .item').click(function (e) {
                image.style_index = $(this).attr('rel');
                image.style_path = $(this).html();
                $('.select-bike .item').removeClass('active');
                $(this).addClass('active');
            });
            step_init();
        }
        function step_init() {
            $('#step_2').hide();
            btn_edit_img_hide();
            //btn_finish_img_hide();
        }
        /* select bike */
        function step_1() {

        }
        /* browse img */
        function step_2() {
            $('#step_1').hide();
            $('#step_2').show();
        }
        /* crop img */
        function step_3() {
            $('.box-btn-browse').hide();
            btn_edit_img_show();

        }
        /* finish img */
        function step_4() {
            $('#preview-img .img,#preview-img .img-browse').hide();
            btn_edit_img_hide();
        }
        function btn_edit_img_show() {
            $('.btn-edit-img').show();
        }
        function btn_edit_img_hide() {
            $('.btn-edit-img').hide();
        }

        function fn_save_img() {
        }
        function fn_share_img() {
        }

        function crop_init() {
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
                ready: function () {
                    image.el.cropper("setCropBoxData", {left: 0, top: 0, width: 480, height: 480});
                    $('.cropper-drag-box').addClass('sty-' + image.style_index);
                }
            });
        }
        function finish() {
            var canvas_crop = image.el.cropper('getCroppedCanvas', {width: image.size, height: image.size});
            var canvas_crop_data = canvas_crop.toDataURL('image/png');
            uploadFile(canvas_crop_data);
        }
        function uploadFile(dataURL) {
            ga('send','event','Select','Frame '+image.style_index);
            popup_loading();
            var task = image.style_index;
            var token = "{{ csrf_token() }}";
            var input = document.getElementById("msgTxt");
            $.ajax({
                type: "POST",
                url: "@if(env('APP_ENV') == 'prod'){{ secure_url('image/upload') }}@else{{ url('image/upload') }}@endif",
                data: {
                    'image': dataURL,
                    "_token": token,
                    'frame': image.style_index,
                    'text': input.value
                }
            }).done(function (data) {
                step_2();
                $('.img-result').html('<img class="img-result" width="628px" height="auto" src="' + $.parseJSON(data).filename + '"/>');
                //$('.btn-save').attr('href', '' + $.parseJSON(data).fullpath + '');
                $('.btn-fb-share').click(function (event) {
                    shareImage($.parseJSON(data).pathname);
                });
                $('.btn-fb-tw').click(function (event) {
                    sharetw($.parseJSON(data).pathname);
                });
                $('.btn-line-share').click(function (event) {
                    shareLine($.parseJSON(data).pathname);
                });
                $('.btn-save').click(function (event) {
                    saveImage($.parseJSON(data).fullpath);
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
                    //$('.img-browse').addClass('sty-'+image.style_index);
                    $('#image').attr('src', e.target.result);
                    $('.box-img-space').show();
                    step_3();
                    crop_init();
                }
                reader.readAsDataURL(input.files[0]);
            } else {

            }
        }

        function shareImage(b) {
            ga('send','event','Share','Facebook');

            var url = encodeURI('http://www.facebook.com/sharer/sharer.php?u=<?php echo env('URL_PD','https://stag.lovemomcard.in.th')?>/share/'+b);

            FB.ui({
                method: 'share',
                href: url,
                hashtag: '#TestHash1'
            }, function(response){});

            //window.open(url,'_blank');
        }

        function sharetw(b) {
            ga('send','event','Share','Twitter');
            var url = encodeURI('https://twitter.com/share?url=<?php echo env('URL_PD','https://www.stag.lovemomcard.in.th')?>/share/'+b);
            window.open(url,'_blank');
        }

        function shareLine(b){
            ga('send','event','Share','Line');
            var url = encodeURI('line://msg/text/LoveYouMom บอกรักแม่ได้ทุกวัน <?php echo env('URL_PD','https://stag.lovemomcard.in.th')?>/share/'+b);
            window.open(url);
        }

        function saveImage(b){
            ga('send','event','Save','Image');
            var url = encodeURI(b);
            window.open(url,'_blank');
        }
    </script>
@endsection
@section('footer')


