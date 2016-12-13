/**
 * Created by Administrator on 2016/6/15.
 */

 function getHeight() {
    var w = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;

    var h = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;
    $(".main").css('height', h - 43);
    var conH = parseFloat($(".contain").css('height'));
    if ($(".contain>form.search-form").length > 0) {
        $(".contain>.tab-content").css('height', conH - 285);
    } else {
        $(".contain>.tab-content").css('height', conH - 224);
    }
    var tabH = parseFloat($(".table-box").parent().css("height"));
    $(".table-box").css("height",tabH-10);
    var parentH = parseFloat($(".pane-inner").parent().css("height"));
    console.log(parentH-50)
    $(".pane-inner").css("height",parentH-86);
    //if ($(".tab-pane>.table-box").length > 0) {
    //    $(".tab-pane").css("padding-bottom", 10);
    //
    //}
}
getHeight();
$(window).resize(function () {
    getHeight();
});