$(".contests__grid__item__content").each(function(){

	if($(this).find("div").height() > $(this).height()){
		$(this).parent().find(".contests__grid__item__readmore").css("display", "block");
	}else{
		$(this).addClass('open');
	}

});

$(".contests__grid__item__readmore").click(function(e){

	e.preventDefault();

	$(this).parent().find(".contests__grid__item__content").toggleClass("open");
	
	$(this).hide();
	$(this).parent().find(".contests__grid__item__close").show();

});

$(".contests__grid__item__close").click(function(e){

	e.preventDefault();

	$(this).parent().find(".contests__grid__item__content").toggleClass("open");
	
	$(this).hide();
	$(this).parent().find(".contests__grid__item__readmore").show();

});