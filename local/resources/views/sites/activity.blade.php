@extends('layouts.main')
@section('head')
@section('header')
@section('content')
    <div class="content txtC">
        <div class="container txtC">
            <div class="row">
                <section class="section-select" id="step_1">
                    <div class="text-3 text-frame">
                        <div class="col-10"></div>
                        <div class="col-80"><img class="img-text"
                                                 src="{{ asset('assets/img/text3.png?v2',env('URL_SSL',true)) }}" alt="">
                        </div>
                        <div class="col-10"></div>
                    </div>
                    <div class="select-bike">
                        <div class="col-10"></div>
                        <div class="col-80">
                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <a style="width: 32%;display: inline;float:left;margin:0.66%;" class="item"
                               href="javascript:void(0);" rel="<?php echo $i; ?>">
                                <img src="{{ asset('assets/img/frame',env('URL_SSL',true)) }}/frame<?php echo $i; ?>.png?3"
                                     data-caption="">
                            </a>
                            <?php } ?>
                        </div>
                        <div class="col-10"></div>
                    </div>
                    <figure class="box-mdf-img" id="preview-img">
                        <div class="text-2 text-msg" style="margin-top:30px;">
                            <div class="col-10"></div>
                            <div class="col-80"><img class="img-text"
                                                     src="{{ asset('assets/img/text-upload-header.png',env('URL_SSL',true)) }}"
                                                     alt="">
                            </div>
                            <div class="col-10"></div>
                        </div>
                        <div class="box-img-space" style="display: none;">

                            <div class="mdf-img">
                                <div class="img-browse">
                                    <img id="image" src="" alt="">
                                </div>
                                <div class="img-finish"></div>
                            </div>
                            <img class="img_w" src="{{ asset('assets/img/img_space2.png',env('URL_SSL',true)) }}"
                                 alt="">
                        </div>

                        <div class="box-btn box-btn-browse">
						<span class="btn-browse btn-img-txt">
							<input type="file" id="import_image" accept="image/x-png,image/jpeg"/>
							<span class="img"><img
                                        src="{{ asset('assets/img/btn-new-upload.png?new',env('URL_SSL',true)) }}"
                                        alt=""></span>
						</span>
                        </div>
                        <div class="btn-edit-img">
                            <div id="box-zoombar">
                                <div class="col-10" style="width:5%">
                                    <img class="icon-p"
                                         src="{{ asset('assets/img/icon-l.png',env('URL_SSL',true)) }}"
                                         alt=""></div>
                                <div class="col-80" id="slid-inner">
                                    <div class="box-slider">
                                        <input class="input-slider" type="range" id="zoom" min='0' max='2' step='0.1'/>
                                    </div>
                                </div>
                                <div class="col-10" style="width:5%">
                                    <img class="icon-l"
                                         src="{{ asset('assets/img/icon-p.png',env('URL_SSL',true)) }}"
                                         alt="">
                                </div>
                            </div>
                            <div class="text-2 text-msg">
                                <div class="col-10"></div>
                                <div class="col-80">
                                    <center><img id="text-custom" src="{{ asset('assets/img/text-zoom.png?2',env('URL_SSL',true)) }}"
                                                 alt=""></center>
                                </div>
                                <div class="col-10"></div>
                            </div>
                        </div>
                    </figure>
                    <figure class="box-mdf-img">
                        <div class="text-2 text-msg" style="margin-bottom: 0px;">
                            <div class="col-10"></div>
                            <div class="col-80"><img class="img-text"
                                                     src="{{ asset('assets/img/text2.png',env('URL_SSL',true)) }}"
                                                     alt="">
                            </div>
                            <div class="col-10"></div>
                        </div>
                        <div class="input-box">
                            <div class="col-10"></div>
                            <div class="col-80">
                                <input maxlength="40" id="msgTxt" class="input-msg" type="text" value=""
                                       name="input-msg" placeholder="(ไม่เกิน 40 ตัวอักษร)">
                            </div>
                            <div class="col-10"></div>
                        </div>
                    </figure>


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
                            <div class="col-80"><img class="img-text"
                                                     src="{{ asset('assets/img/result-header.png',env('URL_SSL',true)) }}"
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
                            <span class="img-share"><img
                                        src="{{ asset('assets/img/btn-share-fb.png',env('URL_SSL',true)) }}"
                                        alt=""></span>
                        </a>
                        <a id="social-line-share" class="btn-share btn-img-txt btn-line-share" href="#">
                            <span class="img-share"><img
                                        src="{{ asset('assets/img/btn-share-line.png',env('URL_SSL',true)) }}"
                                        alt=""></span>
                        </a>
                        <a class="btn-share btn-img-txt btn-fb-tw" href="#">
                            <span class="img-share"><img
                                        src="{{ asset('assets/img/btn-share-tw.png',env('URL_SSL',true)) }}"
                                        alt=""></span>
                        </a>
                        <a id="social-save" class="btn-share btn-img-txt btn-save" download="lovemomcard.gif" href="#"
                           title="ImageName" onclick="Javascript:saveImage();">
                            <span class="img-share"><img
                                        src="{{ asset('assets/img/btn-share-save.png',env('URL_SSL',true)) }}"
                                        alt=""></span>
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
        window.mobileAndTabletcheck = function () {
            var check = false;
            (function (a) {
                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        };
        var image = new Object();
        image.el = $('#image');
        image.crop;
        image.width = 600;
        image.size = 600;
        image.style_index = 1;
        if ($(window).width() < 420) {
            var size_frame = "85";
        } else if ($(window).width() < 760 && $(window).width() >= 420) {
            var size_frame = "117";
        } else {
            var size_frame = "215";
        }
        slidebox({
            container: ".carousel-cont",
            leftTrigger: ".carousel-left",
            rightTrigger: ".carousel-right",
            speed: "fast",
            length: size_frame
        });

        $(document).ready(function () {
            fn_modifin_init();
            $('.btn-step-select').click(function (e) {
                step_2();
                GA_select_style(image.style_index);
                e.preventDefault();
            })

            $('#zoom').on('propertychange input', function (event) {
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

            if (window.mobileAndTabletcheck() == false) {
                $('#social-line-share').hide();
            }

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


                $('.img-browse').removeClass('sty-1');
                $('.img-browse').removeClass('sty-2');
                $('.img-browse').removeClass('sty-3');
                $('.img-browse').removeClass('sty-4');
                $('.img-browse').removeClass('sty-5');
                $('.img-browse').removeClass('sty-6');
                $('.img-browse').addClass('sty-' + image.style_index);


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
                    image.el.cropper("setCropBoxData", {left: 0, top: 0, width: 600, height: 600});
                    $('.cropper-drag-box').addClass('sty-' + image.style_index);
                    if (window.mobileAndTabletcheck() == true) {
                        $('#box-zoombar').hide();
                        $('#text-custom').attr("src","{{ asset('assets/img/text_resize_mobile.png',env('URL_SSL',true)) }}");
                    }
                }
            });
        }
        function finish() {
            var canvas_crop = image.el.cropper('getCroppedCanvas', {width: image.size, height: image.size});
            var canvas_crop_data = canvas_crop.toDataURL('image/png');
            uploadFile(canvas_crop_data);
        }
        function uploadFile(dataURL) {
            ga('send', 'event', 'Select', 'Frame ' + image.style_index);
            popup_loading();
            var task = image.style_index;
            var token = "{{ csrf_token() }}";
            var input = document.getElementById("msgTxt");
            $.ajax({
                type: "POST",
                url: "{{ secure_url('image/upload') }}",
                data: {
                    'image': dataURL,
                    "_token": token,
                    'frame': image.style_index,
                    'text': input.value
                }
            }).done(function (data) {
                step_2();
                $('.img-result').html('<img class="img-result" width="628px" height="auto" src="' + $.parseJSON(data).filename + '"/>');
                $('#social-save').attr('href', '' + $.parseJSON(data).fullpath + '');
                $('.btn-fb-share').click(function (event) {
                    shareImage($.parseJSON(data).pathname);
                });
                $('.btn-fb-tw').click(function (event) {
                    sharetw($.parseJSON(data).pathname);
                });
                $('.btn-line-share').click(function (event) {
                    shareLine($.parseJSON(data).pathname);
                });
//                $('.btn-save').click(function (event) {
//                    saveImage($.parseJSON(data).fullpath);
//                });

                $.fancybox.close();
            });
        }
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.section-select-browse .box-mdf-img .img').hide();
                    $('.section-select-browse .box-mdf-img .img-browse').addClass('show');
                    $('.img-browse').addClass('sty-' + image.style_index);
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
            ga('send', 'event', 'Share', 'Facebook');
            var url = encodeURI('<?php echo env('URL_PD', 'https://www.lovemomcard.in.th')?>/share/' + b);
            FB.ui({
                method: 'share',
                href: url,
                hashtag: '#LoveYouMom',
                mobile_iframe: false,
            }, function (response) {
            });
        }

        function sharetw(b) {
            ga('send', 'event', 'Share', 'Twitter');
            var path_img = '<?php echo env('URL_PD', 'https://www.lovemomcard.in.th')?>/share/' + b;
            var url = 'https://twitter.com/share?url=' + encodeURIComponent(path_img) + '&text=' + encodeURIComponent('การ์ดสุดพิเศษนี้แด่แม่') + '&hashtags=LoveYouMom';
            window.open(url, '_blank');
        }

        function shareLine(b) {
            ga('send', 'event', 'Share', 'Line');
            var url = encodeURI('line://msg/text/การ์ดสุดพิเศษนี้แด่แม่ <?php echo env('URL_PD', 'https://www.lovemomcard.in.th')?>/share/' + b);
            window.open(url);
        }

        function saveImage() {
            ga('send', 'event', 'Save', 'Image');
//            window.open(canvas.toDataURL('image/gif'));
//            var gh = canvas.toDataURL('gif');
//
//            var a  = document.createElement('a');
//            a.href = gh;
//            a.download = b;
//
//            a.click()
            //var url = encodeURI(b);
            //window.open(url,'_blank');
        }
    </script>
@endsection
@section('footer')


