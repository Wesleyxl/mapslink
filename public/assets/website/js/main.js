(function ($) {
    "use strict";

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 100) {
            // Set position from top to add class
            $("header").addClass("header-appear");
        } else {
            $("header").removeClass("header-appear");
        }
    });

    $("#menu-header-button").on("click", function () {
        if ($("#menu-mobile-mav").hasClass("open")) {
            $("#menu-mobile-mav").removeClass("open");
            $("#icon-close").addClass("off");
            $("#icon-open").removeClass("off");
        } else {
            $("#menu-mobile-mav").addClass("open");
            $("#icon-close").removeClass("off");
            $("#icon-open").addClass("off");
        }
    });
})(jQuery);
