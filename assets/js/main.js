(function ($, window) {
	// ===== header =====
	$(".header .header__toggleItem").on("click", function () {
		menu_open_sp();
	});
	$(".mainBodyContent").on("click", function () {
		if (!$(this).hasClass("menu__openSp")) return;
		menu_open_sp();
	});
	function menu_open_sp() {
		$("body").toggleClass("mobile-menu-open");
		$(".header__menusp").toggleClass("active");
		$(".header__toggleItem").toggle();
		$(".mainBodyContent").toggleClass("menu__openSp");
	}
	$(".menu-item-has-children > .dropdown-arrow").click(function (e) {
		e.preventDefault();
		var $submenu = $(this).siblings(".sub-menu");

		if ($submenu.length) {
			$submenu.stop(true, true).slideToggle();
			$(this).parent().toggleClass("open");
			$(".sub-menu").not($submenu).slideUp();
			$(".menu-item-has-children").not($(this).parent()).removeClass("open");
		}
	});
	function adjustPadding() {
		$("body").css("padding-top", $("#header").outerHeight(true));
		if ($("#wpadminbar").length > 0) {
			$(".header").css("margin-top", $("#wpadminbar").outerHeight(true));
		}
	}
	// adjustPadding();
	// $(window).resize(adjustPadding);
	// end

	// ===== banner =====
	$(".banner--slider").slick({
		autoplay: true,
		autoplaySpeed: 5000,
		dots: false,
		arrows: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

	$(".home_banner_slider").slick({
		autoplay: true,
		autoplaySpeed: 5000,
		dots: true,
		arrows: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

	$(".best_selling_slider").slick({
		autoplay: true,
		autoplaySpeed: 5000,
		dots: true,
		arrows: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerMode: true,
		centerPadding: "25%",
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					centerMode: false,
					centerPadding: "0",
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});

	$(".tab_product_slider").slick({
		slidesToShow: 4,
		slidesToScroll: 2,
		arrows: false,
		dots: false,
		autoplay: true,
		autoplaySpeed: 3000, // 3 giây
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	});

	// Khi click vào .menu_san_pham thì toggle menu_products
	$(".menu_san_pham").on("click", function (e) {
		e.stopPropagation(); // chặn click lan ra ngoài

		if ($(window).width() > 1200) {
			$(".menu_products")
				.stop(true, true)
				.slideToggle(100, function () {
					// Khi animation xong thì refresh slick
					$(".menu_products .slick-slider").slick("setPosition");
					$(".menu_products .slick-slider .product_loop_item").matchHeight({ byRow: true });
				});
		}
	});

	// Khi click ra ngoài thì đóng menu_products
	$(document).on("click", function () {
		$(".menu_products").slideUp(100);
	});

	// Nếu click ngay trong menu_products thì không bị đóng
	$(".menu_products").on("click", function (e) {
		e.stopPropagation();
	});

	// Khi cuộn trang thì đóng menu_products
	$(window).on("scroll", function () {
		$(".menu_products").slideUp(100);
	});

	// ===== BOOTSTRAP TABS FIX (Slick + matchHeight) =====
	$('button[data-bs-toggle="tab"]').on("shown.bs.tab", function (e) {
		// Lấy id tab content từ data-bs-target (vd: #menu_prod_1_content)
		let targetId = $(e.target).data("bsTarget");
		let $tabContent = $(targetId);
		// Refresh slick + matchHeight trong tab vừa active
		$tabContent.find(".tab_product_slider").slick("setPosition");
		$tabContent.find(".product_loop_item").matchHeight({ byRow: true });
	});

	// Mặc định add active cho item đầu tiên
	$(".wc_payment_methods .wc_payment_method:first").addClass("active");

	// Khi click vào radio thì set lại active
	$(document).on("change", ".wc_payment_methods .input-radio", function () {
		$(".wc_payment_methods .wc_payment_method").removeClass("active"); // xóa hết
		$(this).closest(".wc_payment_method").addClass("active"); // add cho item đang chọn
	});

	$(document).on("click", ".add_to_cart_fake", function (e) {
		e.preventDefault();
		$(".button.single_add_to_cart_button").trigger("click");
	});

	$(document).on("click", ".woocommerce-message", function (e) {
		let $box = $(this);
		let offset = $box.offset();
		let width = $box.outerWidth();

		// Vị trí click so với box
		let x = e.pageX - offset.left;
		let y = e.pageY - offset.top;

		// Vùng giả lập của ::after
		let afterTop = 8; // từ trên xuống 8px
		let afterRight = 8; // từ phải vào 8px
		let afterWidth = 16; // rộng 16px
		let afterHeight = 16; // cao 16px

		// Check xem click có nằm trong vùng ::after không
		if (x >= width - afterRight - afterWidth && x <= width - afterRight && y >= afterTop && y <= afterTop + afterHeight) {
			$box.fadeOut(); // đóng thông báo
		}
	});

	// ... longpv
	//
	//
	//
	// ... vucoder
	//
	//
	//
})(jQuery, window);
