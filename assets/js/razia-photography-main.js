(function ($) {
    "use strict";
    //Document ready function
    jQuery(document).ready(function($){
        $(".razia-project-s-active li").on("click", function(){
            $(".razia-project-s-active li").removeClass("active");
            $(this).addClass("active");

            var selector = $(this).attr("data-filter");
            $(".project-list").isotope({
                filter: selector,
            });
        });
    });//End document ready function 

    $(window).load(function(){
        $(".project-list").isotope();
    });
}(jQuery)); 