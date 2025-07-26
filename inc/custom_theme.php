<?php
function modify_cf7_checkbox_label($content)
{
    $content = str_replace(
        '<span class="wpcf7-list-item-label">Tôi đồng ý</span>',
        '<span class="wpcf7-list-item-label">Bằng cách đăng ký, Quý khách xác nhận đã đọc, hiểu và đồng ý với <a href="#">Chính sách Quyền riêng tư</a> của Vinfast.</span>',
        $content
    );
    return $content;
}
add_filter('wpcf7_form_elements', 'modify_cf7_checkbox_label');
