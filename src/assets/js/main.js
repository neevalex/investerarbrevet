$(window).on('load', () => {


	
		$(".search-toggle").click(function(){
			$('.search').toggle();
		});
	
		$('body').on('click', '.menu_toggle, .menu-main-container.open', function() {
			$('.menu-main-container').toggleClass('open');
		});
	

});
