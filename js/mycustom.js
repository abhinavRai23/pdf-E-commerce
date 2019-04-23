
/*------------Add active class on click code start------------*/

$(document).ready(function(){
    $(".chk").click(function(){
        $(".chk_toggle").toggle();
    });
    
    
//    $(".nav > li").click(function (e) {
//        e.preventDefault();
//        $(".nav > li").addClass("current").not(this).removeClass("current");
//}); 


$('.nav li a').on('click', function(){
    $(this).addClass('current');
    $(this).parent().siblings().find('a').removeClass('current');
});

});



jQuery(function() {
    var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
       jQuery(".nav li a").each(function() {

       if (jQuery(this).attr("href") == pgurl || jQuery(this).attr("href") == '')
       jQuery(this).addClass("active");
    })
 });

/*------------Add active class on click code start------------*/



/*------bottom to top code start-----*/

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

/*------bottom to top code end-----*/




