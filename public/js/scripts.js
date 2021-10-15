var position = $(window).scrollTop();

$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > position) {
        $("header").addClass("header-none");
        $(".pcb-breadcrumb").css("padding-top", "120px").css("transition", "all 0.5s linear");
    } else {
        if (scroll < position - 30 || scroll == 0) {
            $("header").removeClass("header-none");
            $(".pcb-breadcrumb").css("padding-top", "200px");
        }
    }
    position = scroll;
});