<?php

/**
 * Template name: Trang chủ
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xe_dien
 */

get_header();
?>

<?php
$banner = get_field('banner') ?? [];
if ($banner):
?>
	<div class="home_banner">
		<div class="home_banner_slider">
			<?php foreach ($banner as $item) : ?>
				<div>
					<div class="item" style="background-image: url('<?php echo $item['background']; ?>');">
						<div class="container">
							<div class="content">
								<?php if ($item['title']) : ?>
									<h2 class="title">
										<?php echo $item['title']; ?>
									</h2>
								<?php endif; ?>

								<?php if ($item['description']) : ?>
									<div class="desc">
										<?php echo $item['description']; ?>
									</div>
								<?php endif; ?>

								<?php if ($item['url']) : ?>
									<div class="d-flex">
										<a class="btn_1" href="<?php echo $item['url']; ?>">
											Khám phá ngay
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<div class="home_best_selling">
	<div class="heading">
		<div class="container">
			<h2 class="title">
				SẢN PHẨM BÁN CHẠY
			</h2>
		</div>
	</div>

	<div class="best_selling_slider">
		<?php for ($i = 0; $i < 3; $i++) : ?>
			<div>
				<div class="best_selling_item">
					<div class="content">
						<h3 class="title">
							FELIX NEO
						</h3>
						<div class="desc">
							Lướt êm, Phong cách
						</div>

						<div class="feature">
							<div class="row">
								<div class="col-lg-3">
									<div class="value">
										60 km/h
									</div>
									<div class="title">
										TỐC ĐỘ TỐI ĐA
									</div>
								</div>
								<div class="col-lg-3">
									<div class="value">
										114 km/1 lần sạc
									</div>
									<div class="title">
										QUÃNG ĐƯỜNG DI CHUYỂN
									</div>
								</div>
								<div class="col-lg-3">
									<div class="value">
										21 lít
									</div>
									<div class="title">
										ĐỘ RỘNG CỐP XE
									</div>
								</div>
								<div class="col-lg-3">
									<div class="value">
										28.800.000 VNĐ
									</div>
									<div class="title">
										GIÁ TỐI THIỂU TỪ
									</div>
								</div>
							</div>
						</div>

						<div class="list_btn">
							<a href="#" class="btn_2">
								XEM CHI TIẾT
							</a>
							<a href="#" class="btn_3">
								ĐẶT CỌC
							</a>
						</div>
					</div>

					<div class="img_wrap">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/image_25.png'; ?>" alt="">
					</div>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</div>


<div class="home_about_us">
	<div class="container">
		<div class="row">
			<?php for ($i = 0; $i < 2; $i++) : ?>
				<div class="col-lg-6">
					<div class="item_box">
						<div class="row align-items-center">
							<div class="col-7">
								<div class="content">
									<h3 class="title">
										Xe máy điện VinFast
									</h3>

									<div class="desc">
										Thiết kế đẹp, chạy êm, tiết kiệm, không xăng – không khí thải.
									</div>

									<a class="btn_4">
										Xem các mẫu
									</a>
								</div>
							</div>

							<div class="col-5">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_48.png'; ?>" alt="">
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>

<div class="home_box_cta">
	<div class="container">
		<div class="inner" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/Frame_55.png'; ?>');">
			<div class="row">
				<div class="col-lg-6">
					<div class="content">
						<h2 class="title">
							VinFast Đức Nghĩa
						</h2>

						<div class="desc">
							VinFast Đức Nghĩa là đại lý ủy quyền chính thức, cung cấp đầy đủ các dòng xe điện - xe máy điện, đáp ứng mọi nhu cầu mua mới và trải nghiệm lái thử.
						</div>

						<a href="#" class="btn_5">
							Xem chi tiết dịch vụ
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="home_endow">
	<div class="container">
		<div class="row">
			<?php for ($i = 0; $i < 4; $i++): ?>
				<div class="col-lg-3">
					<div class="item">
						<div class="icon">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_1.png'; ?>" alt="">
						</div>
						<div class="content">
							<h3 class="title">
								Free Ship
							</h3>
							<div class="desc">
								Free ship toàn Hà Nội trong vòng 3-5 ngày Free ship toàn Hà Nội trong vòng 3-5 ngày
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>

<div class="home_more_info">
	<div class="container">
		<div class="row">
			<?php for ($i = 0; $i < 2; $i++): ?>
				<div class="col-lg-6">
					<div class="item">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_60.png'; ?>" alt="">
						<div class="content">
							<h3 class="title">
								Showroom & Trạm sạc
							</h3>
							<a href="#" class="link">
								Tìm hiểu thêm
							</a>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>

<div class="home_form_contact">
	<div class="row gx-0">
		<div class="col-lg-6">
			<div class="img_wrap">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="inner">
				<div class="content">
					<div class="logo">
						<?php $logo_url = get_template_directory_uri() . '/assets/images/logo.svg'; ?>
						<img src="<?php echo $logo_url; ?>" alt="logo">
					</div>
					<h2 class="title">
						ĐĂNG KÝ NHẬN ƯU ĐÃI
					</h2>
					<div class="desc">
						Quý khách vui lòng điền thông tin để nhận các ưu đãi mới nhất từ VinFast Đức Nghĩa
					</div>

					<?php echo do_shortcode('[contact-form-7 id="09113cc" title="Contact form 1"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
/*
<div class="form_group">
	<div class="row">
		<div class="col-12">
			<div class="form_group_box">
				<label for="full_name" class="form_label">Họ và tên <span class="req">*</span></label>
				[text* full_name class:form_control]
			</div>
		</div>

		<div class="col-md-6">
			<div class="form_group_box">
				<label for="phone_number" class="form_label">Số điện thoại <span class="req">*</span></label>
				[tel* phone_number class:form_control]
			</div>
		</div>

		<div class="col-md-6">
			<div class="form_group_box">
				<label for="email" class="form_label">Email <span class="req">*</span></label>
				[email* email class:form_control]
			</div>
		</div>

		<div class="col-12">
			<div class="form_group_box">
				<label for="textarea-mess" class="form_label">Ghi chú <span class="optional">(không yêu cầu)</span></label>
				[textarea* textarea-mess class:form_textarea]
			</div>
		</div>

		<div class="col-12">
			<div class="tabs">
				<ul class="tab_titles">
					<li class="tab_title active" data-tab="tab-1">Cao cấp</li>
					<li class="tab_title" data-tab="tab-2">Trung cấp</li>
					<li class="tab_title" data-tab="tab-3">Phổ thông</li>
				</ul>

				<div class="tab_contents">
					<div class="tab_content active" id="tab-1">
						<input type="checkbox" class="checkbox_input" name="product_A" value="A" id="A"><label class="checkbox_label" for="A">Sản phẩm cao cấp A</label>
						<br>
						<input type="checkbox" class="checkbox_input" name="product_B" value="B" id="B"><label class="checkbox_label" for="B">Sản phẩm cao cấp B</label>
					</div>
					<div class="tab_content" id="tab-2">
						<input type="checkbox" class="checkbox_input" name="product_C" value="C" id="C"><label class="checkbox_label" for="C">Sản phẩm cao cấp C</label>
						<br>
						<input type="checkbox" class="checkbox_input" name="product_D" value="D" id="D"><label class="checkbox_label" for="D">Sản phẩm cao cấp D</label>
					</div>
					<div class="tab_content" id="tab-3">
						<input type="checkbox" class="checkbox_input" name="product_Motio" value="Motio" id="Motio"><label class="checkbox_label" for="Motio">Motio</label>
						<br>
						<input type="checkbox" class="checkbox_input" name="product_Evo200_Lite" value="Evo200 Lite" id="Evo200_Lite"><label class="checkbox_label" for="Evo200_Lite">Evo200 Lite</label>
					</div>
				</div>
			</div>


			<div class="tabs_input">
				[text* selected_product]
			</div>
		</div>

		<div class="col-12">
			<div class="note">Bằng cách đăng ký, quý khách xác nhận đã đọc, hiểu và đồng ý với <a href="#">Chính sách Bảo vệ Dữ liệu cá nhân</a> của VinFast.</div>
		</div>

		<div class="col-12">
			<div class="form_btn_block">
				[submit class:btn class:form_btn "ĐĂNG KÝ"]
			</div>
		</div>
	</div>
</div>
*/
?>

<script>
	jQuery(document).ready(function($) {
		// Ẩn label khi focus
		$('.form_control, .form_textarea').on('focus', function() {
			$(this).closest('.form_group_box').find('.form_label').hide();
		});

		// Hiện lại label khi blur nếu input rỗng
		$('.form_control, .form_textarea').on('blur', function() {
			if ($(this).val().trim() === '') {
				$(this).closest('.form_group_box').find('.form_label').show();
			}
		});

		// Xử lý click tab
		$('.tab_title').click(function() {
			var tabId = $(this).data('tab');

			// Bỏ active tab cũ và thêm active tab mới
			$('.tab_title').removeClass('active');
			$(this).addClass('active');

			// Bỏ active content cũ và thêm active content mới
			$('.tab_content').removeClass('active');
			$('#' + tabId).addClass('active');

			// Bỏ chọn tất cả checkbox khi đổi tab
			$('.tab_content input[type="checkbox"]').prop('checked', false);

			// Xóa giá trị input hidden
			$('input[name="selected_product"]').val('');
		});

		// Khi chọn checkbox, cập nhật danh sách vào input ẩn
		$(document).on('change', '.tab_content input[type="checkbox"]', function() {
			let selected = [];
			$('.tab_content input[type="checkbox"]:checked').each(function() {
				selected.push($(this).val());
			});
			$('input[name="selected_product"]').val(selected.join(',')).trigger('change');
		});
	});
</script>

<?php
get_footer();
