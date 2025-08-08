<?php
// Template name: Demo
get_header();
?>
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


<div class="py-section">
    <div class="container">
        <div class="editor">
            <?php the_content(); ?>
        </div>
    </div>
</div>
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
?>