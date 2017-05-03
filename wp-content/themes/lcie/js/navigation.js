// Mobile navigation
$(document).ready(function(){

	$(".header__hamburger").click(function(){

		$(".header__navigation").toggle();
		$(".header__subnavigation").toggle();
		$(".header__hamburger").toggleClass("header__hamburger--close");
		$("body").toggleClass("no-scroll");

	});

});