function loadWeb_show() {
}
function loadWeb_hide() {
    $(".preload-overlay .preload-box").transition({y: "-30px", opacity: 0}, function () {
        $(".preload-overlay").transition({opacity: 0}, function () {
            $(this).hide()
        })
    })
}
function log(n) {
    console.log(n)
}
function menu_init() {
    $(".btn-menu").click(function () {
        $(this).hasClass("active") ? ($(this).removeClass("active").addClass("inactive"), $(".main-nav").removeClass("show")) : ($(this).removeClass("inactive").addClass("active"), $(".main-nav").addClass("show"))
    })
}
function gallery_popup_init() {
    $(".gallery .item a").fancybox({padding: 0, margin: 20, closeBtn: !1})
}
function popup_loading() {
    $.fancybox({
        href: "#popup-loading",
        margin: 0,
        padding: 0,
        centerOnScroll: !0,
        wrapCSS: "fancybox-loading-skin",
        closeBtn: !1,
        helpers: {overlay: {locked: !0, closeClick: !1}},
        afterLoad: function () {
            $("html").addClass("fancybox-loading")
        },
        afterClose: function () {
            $("html").removeClass("fancybox-loading")
        }
    })
}
function GA_select_style(n) {
    ga("send", "event", "Style select", "Style " + n)
}
var chk = new Object;
chk.ie = !1, chk.mobile = !1, $.browser.msie && $.browser.version <= 10 && (chk.ie = !0, $(".main-container").addClass("ie")), 1 != $.browser.mobile && null == navigator.userAgent.match(/iPad/i) || (chk.mobile = !0), $(window).on("load", function (n) {
    loadWeb_hide()
}), $(document).ready(function () {
    menu_init(), gallery_popup_init(), chk.mobile && $(".hidden-xs").hide()
});