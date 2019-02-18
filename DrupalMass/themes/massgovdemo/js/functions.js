(function($){
	$(document).ready(function(){
		
		//Change to Full Width Layout Hack
		//$(".navbar").addClass("container-fluid");
		//$(".navbar").removeClass("container");

		$(".main-container").addClass("container-fluid");
		$(".main-container").removeClass("container");

		$(".main-container > .row").addClass("killmargin");

		$("footer").addClass("container-fluid");
		$("footer").removeClass("container");

	});

})(jQuery);