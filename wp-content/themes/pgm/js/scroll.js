(function($) {
    $.fn.dragScroll = function (options) {
        $(this).scrollLeft(200);
        /* Mouse dragg scroll */
        var x, left;
        var $scrollArea = $(this);

        $($scrollArea).attr("onselectstart", "return false;");   // Disable text selection in IE8

        $($scrollArea).mousedown(function (e) {
            e.preventDefault();
            timeline = true;
            x = e.pageX;
            left = $(this).scrollLeft();
        });
        $("#drag").mousemove(function (e) {
            if (timeline) {
                var newX = e.pageX;
                $($scrollArea).scrollLeft(left - newX + x);
            }
        });
        $("#drag").mouseup(function (e) { timeline = false; });
    };
})($);
$(document).ready(function() { 
    $('#drag').dragScroll({});
});