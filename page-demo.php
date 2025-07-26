<?php
// Template name: Demo
get_header();
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
            <div class="tabs">
                <ul class="tab_titles">
                    <li class="tab_title active" data-tab="tab-1">Cao cấp</li>
                    <li class="tab_title" data-tab="tab-2">Trung cấp</li>
                    <li class="tab_title" data-tab="tab-3">Phổ thông</li>
                </ul>

                <div class="tab_contents">
                    <div class="tab_content active" id="tab-1">
                        <input type="radio" class="radio_input" name="product" value="A" id="A"><label class="radio_label" for="A">Sản phẩm cao cấp A</label>
                        <br>
                        <input type="radio" class="radio_input" name="product" value="B" id="B"><label class="radio_label" for="B">Sản phẩm cao cấp B</label>
                    </div>
                    <div class="tab_content" id="tab-2">
                        <input type="radio" class="radio_input" name="product" value="C" id="C"><label class="radio_label" for="C">Sản phẩm cao cấp C</label>
                        <br>
                        <input type="radio" class="radio_input" name="product" value="D" id="D"><label class="radio_label" for="D">Sản phẩm cao cấp D</label>
                    </div>
                    <div class="tab_content" id="tab-3">
                        <input type="radio" class="radio_input" name="product" value="Motio" id="Motio"><label class="radio_label" for="Motio">Motio</label>
                        <br>
                        <input type="radio" class="radio_input" name="product" value="Evo200 Lite" id="Evo200 Lite"><label class="radio_label" for="Evo200 Lite">Evo200 Lite</label>
                    </div>
                </div>
            </div>

            <div class="tabs_input">
                [text* selected_product]
            </div>
        </div>

        <div class="col-12">
            [checkbox* agree_to_terms class:form_checkbox use_label_element "Tôi đồng ý"]
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
        $('.form_control').on('focus', function() {
            $(this).closest('.form_group_box').find('.form_label').hide();
        });

        $('.form_control').on('blur', function() {
            if ($(this).val().trim() === '') {
                $(this).closest('.form_group_box').find('.form_label').show();
            }
        });

        // Xử lý click tab như cũ
        $('.tab_title').click(function() {
            var tabId = $(this).data('tab');
            $('.tab_title').removeClass('active');
            $(this).addClass('active');
            $('.tab_content').removeClass('active');
            $('#' + tabId).addClass('active');
        });

        // Khi chọn radio, fill vào input ẩn
        $('input[name="product"]').change(function() {
            var selectedValue = $(this).val();
            $('input[name="selected_product"]').val(selectedValue);
        });
    });
</script>
<?php
get_footer();
?>