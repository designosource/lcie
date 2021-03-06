if($("body").hasClass("home"))
{

	// $('.swiper-wrapper').slick({
	// 	arrows: true,
	// 	infinite: true,
	// 	speed: 300,
	// 	autoplay: true,
	// 	autoplaySpeed: 2000,
	// 	slidesToShow: 4,
	// 	responsive: [
	// 		{
	// 			breakpoint: 768,
	// 			settings: {
	// 				slidesToShow: 1
	// 			}
	// 		},
	// 	],
	// 	prevArrow: ".home__teams__grid-small .prev",
	// 	nextArrow: ".home__teams__grid-small .next"
	// });


	$('.swiper-wrapper').slick({
		infinite: true,
		speed: 300,
		autoplay: true,
		autoplaySpeed: 2000,
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow: ".home__teams__grid-small .prev",
		nextArrow: ".home__teams__grid-small .next"
	});

	$('.slider-mobile').slick({
		infinite: true,
		speed: 300,
		autoplay: true,
		autoplaySpeed: 2000,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: ".home__teams__grid-small .prev.mobile",
		nextArrow: ".home__teams__grid-small .next.mobile"
	});

	$('.home__testmonials__slider').slick({
		dots: true,
		arrows: false,
		infinite: true,
		speed: 300
	});

}