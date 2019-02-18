(function($){

	$(document).ready(function(){

	  $('.blogpreview_content_slider').slick({
	    slidesToShow: 3,
	    slidesToScroll: 1,
	    speed: 300,
	    infinite: false,
	    arrows:true,
	    dots: false,
	    adaptiveHeight: false,
		nextArrow:"<button type='button' class='blogpreview-next'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>",
		prevArrow:"<button type='button' class='blogpreview-prev'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",

		responsive: [
		    {
		      breakpoint: 1120,
		      settings: {
		        slidesToShow: 2,
		      }
		    },
		    {
		      breakpoint: 890,
		      settings: {
		        slidesToShow: 1,
		      }
		    },
		]

	  });

	  setTimeout(function() { set_width(); }, 100 );

	});

	function set_width() {
		$('.blogpreview_post_box').css("width", "225px");
	}

})(jQuery);
