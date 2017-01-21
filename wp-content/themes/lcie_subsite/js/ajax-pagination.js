(function($) {

	$(document).on( 'change', '.projects__content__select', function( event ) {
		event.preventDefault();

		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: ajaxpagination.query_vars,
				date: $(".projects__content__select").val()
			},
			success: function( html ) {
				var data = JSON.parse(html);
				
				$('.projects__content__grid').empty();

				for(var i = 0; i < data.length; i++){

					var col = '<div class="projects__content__grid__col" style="background-image: url('+data[i][1].photo+');"><div class="projects__content__grid__col__overlay" style="background-color: '+data[i][1].color+'"></div><img src="'+data[i][1].logo+'" alt="'+data[i][0].post_title+'" class="projects__content__grid__col__logo"><span class="projects__content__grid__col__title">'+data[i][0].post_title+'</span><a href="'+data[i][1].url+'" class="projects__content__grid__col__more">lees meer</a></div>';

					$('.projects__content__grid').append( col );
				}

			}
		})
	})

})(jQuery);