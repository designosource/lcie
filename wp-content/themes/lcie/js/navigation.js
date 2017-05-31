$(document).ready(function(){

	$(".header__hamburger").click(function(){

		$(".header__container").toggleClass("active");
		$("html, body").toggleClass("no-scroll");
		$(this).toggleClass("header__hamburger--close");
		
	});

});