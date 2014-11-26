function showScrollTop(){
	if($("body").scrollTop() > 100) {
		$("#scrollTop").fadeIn();
	} else {
		$("#scrollTop").fadeOut();
	}
}

function scrollTo(sectionID){
	$("html, body").animate({ scrollTop: $("#"+sectionID).offset().top - 40 }, 1000);
}

$(window).scroll(function() {
	showScrollTop();
});

$(function(){

        $("#typed").typed({
            strings: ["DEVELOPMENT","WEB","MOBILE","RESPONSIVE","SLICING","DESIGN","SEO","APP"],
            typeSpeed: 50,
            backDelay: 1200,
            loop: true,
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }
	
	function mobileMenu(){
		if($(window).width() < 600) {
			$(".menu").click(function() {
				$(".menu ul").children("li").slideToggle("fast");
			});
		}
	}