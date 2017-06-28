var chk = new Object();
	chk.ie = false;
	chk.mobile = false;

// Check IE browser
if($.browser.msie && $.browser.version<=10){
	chk.ie = true;
	$(".main-container").addClass("ie");
}
// Check Device
if($.browser.mobile == true || navigator.userAgent.match(/iPad/i) != null){
	chk.mobile = true;
}
$(window).on("load", function (e) {
    loadWeb_hide();
})

$(document).ready(function(){
	menu_init();
	gallery_popup_init();
	if(chk.mobile){
		$('.hidden-xs').hide();
	}
});
function loadWeb_show(){}
function loadWeb_hide(){
	$('.preload-overlay .preload-box').transition({y:'-30px',opacity:0},function(){
		$('.preload-overlay').transition({opacity:0},function(){
			$(this).hide();
		});
	});
}
function log(val){
	console.log(val);
}
function menu_init(){
	$(".btn-menu").click(function(){
		if(!$(this).hasClass("active")){
			$(this).removeClass("inactive").addClass("active");
			/*$('html').addClass('show-menu');*/
			$('.main-nav').addClass('show');
		} else {
			$(this).removeClass("active").addClass("inactive");
			/*$('html').removeClass('show-menu');*/
			$('.main-nav').removeClass('show');
		}
	});
}
function gallery_popup_init(){
	$('.gallery .item a').fancybox({
		padding:0,margin:20,
		closeBtn:false
	});
}
function popup_loading(){
	$.fancybox({
	    href:'#popup-loading',
	    margin: 0, padding: 0,
	    centerOnScroll: true,
	    wrapCSS:'fancybox-loading-skin',
	    closeBtn:false,
	    helpers: {overlay: {locked: true,closeClick : false}},
	    afterLoad:function(){
	    	$('html').addClass('fancybox-loading');
	    },
	    afterClose:function(){
	    	$('html').removeClass('fancybox-loading');
	    }
	});
}
function GA_select_style(num){
	//ga('send','event','Style select','Style '+ num +'');
}