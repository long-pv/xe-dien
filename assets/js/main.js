(function ($, window) {
	// ----- longpv ------

	var Best_Selling_Products_Widget = function ($scope, $) {
		$scope.find(".best_selling_slider").slick({
			autoplay: true,
			autoplaySpeed: 5000,
			dots: true,
			arrows: false,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			centerMode: true,
			centerPadding: "25%",
		});
	};

	$(window).on("elementor/frontend/init", function () {
		elementorFrontend.hooks.addAction("frontend/element_ready/best_selling_products_widget.default", Best_Selling_Products_Widget);
	});

	//
	//
	//
	// ----- vucoder ------
	//
	//
	//
})(jQuery, window);
