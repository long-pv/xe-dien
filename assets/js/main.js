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

	// Rule custom password mạnh
	$.validator.addMethod(
		"strongPassword",
		function (value, element) {
			return (
				this.optional(element) ||
				(/[A-Z]/.test(value) && // ít nhất 1 chữ hoa
					/[a-z]/.test(value) && // ít nhất 1 chữ thường
					/\d/.test(value))
			); // ít nhất 1 số
		},
		"Mật khẩu phải có chữ hoa, chữ thường và ít nhất 1 số"
	);

	// Validate form
	// Custom regex for email validation
	$.validator.addMethod(
		"customEmail",
		function (value, element) {
			var regex = /^[a-zA-Z0-9._%+-]+(?:\.[a-zA-Z0-9._%+-]+)*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
			return this.optional(element) || regex.test(value);
		},
		"Vui lòng nhập địa chỉ email hợp lệ"
	);

	// Custom rule cho mật khẩu mạnh
	$.validator.addMethod(
		"strongPassword",
		function (value, element) {
			return (
				this.optional(element) ||
				(/[A-Z]/.test(value) && // ít nhất 1 chữ hoa
					/[a-z]/.test(value) && // ít nhất 1 chữ thường
					/\d/.test(value)) // ít nhất 1 số
			);
		},
		"Mật khẩu phải có chữ hoa, chữ thường và ít nhất 1 số"
	);

	// Validate form
	$(".register_form").validate({
		rules: {
			name: {
				required: true,
				minlength: 2,
			},
			email: {
				required: true,
				customEmail: true, // rule custom
			},
			password: {
				required: true,
				minlength: 8,
				strongPassword: true, // rule custom
			},
			confirm_password: {
				required: true,
				equalTo: "input[name='password']",
			},
		},
		messages: {
			name: {
				required: "Vui lòng nhập họ tên",
				minlength: "Tên phải có ít nhất 2 ký tự",
			},
			email: {
				required: "Vui lòng nhập email",
				customEmail: "Email không hợp lệ",
			},
			password: {
				required: "Vui lòng nhập mật khẩu",
				minlength: "Mật khẩu ít nhất 8 ký tự",
			},
			confirm_password: {
				required: "Vui lòng nhập lại mật khẩu",
				equalTo: "Mật khẩu nhập lại không khớp",
			},
		},
		errorPlacement: function (error, element) {
			error.addClass("text_danger"); // đổi - thành _ cho đồng bộ
			error.insertAfter(element);
		},
		submitHandler: function (form) {
			let formData = {
				action: "register_user",
				name: $("input[name='name']").val(),
				email: $("input[name='email']").val(),
				password: $("input[name='password']").val(),
			};

			$.ajax({
				url: custom_ajax.ajax_url,
				type: "POST",
				data: formData,
				beforeSend: function () {
					$(".register_btn_primary").prop("disabled", true).text("Đang xử lý...");
				},
				success: function (response) {
					if (response.success) {
						alert(response.data.message);
						window.location.href = response.data.redirect; // redirect do PHP trả về
					} else {
						alert(response.data.message);
					}
				},
				error: function () {
					alert("Có lỗi xảy ra, vui lòng thử lại.");
				},
				complete: function () {
					$(".register_btn_primary").prop("disabled", false).text("Đăng ký tài khoản");
				},
			});

			return false;
		},
	});

	const $form = $(".auth_form");
	const $submitBtn = $form.find(".auth_btn-primary");

	$form.validate({
		rules: {
			email: {
				required: true,
				customEmail: true,
			},
			password: {
				required: true,
				minlength: 8,
			},
		},
		messages: {
			email: {
				required: "Vui lòng nhập email",
				customEmail: "Email không hợp lệ",
			},
			password: {
				required: "Vui lòng nhập mật khẩu",
				minlength: "Mật khẩu ít nhất 8 ký tự",
			},
		},
		errorPlacement: function (error, element) {
			error.addClass("auth_error text-danger");
			error.insertAfter(element);
		},
		submitHandler: function () {
			const formData = {
				action: "login_user",
				email: $form.find("input[name='email']").val(),
				password: $form.find("input[name='password']").val(),
				remember: $form.find("input[name='remember']").is(":checked") ? 1 : 0,
			};

			$.ajax({
				url: custom_ajax.ajax_url, // wp_localize_script cung cấp
				type: "POST",
				data: formData,
				beforeSend: function () {
					$submitBtn.prop("disabled", true).text("Đang xử lý...");
				},
				success: function (response) {
					if (response.success) {
						window.location.href = response.data.redirect || "/";
					} else {
						alert(response.data.message || "Đăng nhập thất bại");
					}
				},
				error: function () {
					alert("Có lỗi xảy ra, vui lòng thử lại.");
				},
				complete: function () {
					$submitBtn.prop("disabled", false).text("Đăng nhập");
				},
			});

			return false;
		},
	});

	// Ẩn label khi focus
	$(".form_control, .form_textarea").on("focus", function () {
		$(this).closest(".form_group_box").find(".form_label").hide();
	});

	// Hiện lại label khi blur nếu input rỗng
	$(".form_control, .form_textarea").on("blur", function () {
		if ($(this).val().trim() === "") {
			$(this).closest(".form_group_box").find(".form_label").show();
		}
	});

	// Xử lý click tab
	$(".tab_title").click(function () {
		var tabId = $(this).data("tab");

		// Bỏ active tab cũ và thêm active tab mới
		$(".tab_title").removeClass("active");
		$(this).addClass("active");

		// Bỏ active content cũ và thêm active content mới
		$(".tab_content").removeClass("active");
		$("#" + tabId).addClass("active");

		// Bỏ chọn tất cả checkbox khi đổi tab
		$('.tab_content input[type="checkbox"]').prop("checked", false);

		// Xóa giá trị input hidden
		$('input[name="selected_product"]').val("");
	});

	// Khi chọn checkbox, cập nhật danh sách vào input ẩn
	$(document).on("change", '.tab_content input[type="checkbox"]', function () {
		let selected = [];
		$('.tab_content input[type="checkbox"]:checked').each(function () {
			selected.push($(this).val());
		});
		$('input[name="selected_product"]').val(selected.join(",")).trigger("change");
	});

	$(".icon_eye").click(function () {
		var input = $(this).siblings('input[type="password"], input[type="text"]');

		if (input.attr("type") === "password") {
			input.attr("type", "text"); // Hiển thị mật khẩu
			$(this).addClass("show"); // Thêm class show vào icon
		} else {
			input.attr("type", "password"); // Ẩn mật khẩu
			$(this).removeClass("show"); // Xóa class show
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
