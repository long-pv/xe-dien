<?php

/**
 * Template name: Trang giới thiệu
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


<div class="vinfast_block">
    <div class="container">
        <!-- Header -->
        <div class="vinfast_block_logo">
            <?php $logo_url = get_template_directory_uri() . '/assets/images/logo.svg'; ?>
            <img src="<?php echo $logo_url; ?>" class="vinfast_block_logo_img" alt="logo">
        </div>

        <!-- Slogan -->
        <div class="vinfast_block_slogan">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="editor">
                        <p><strong>ĐỒNG HÀNH CÙNG BẠN <span class="vinfast_block_slogan_highlight">TRÊN HÀNH TRÌNH XANH</span></strong></p>
                        <p>
                            VinFast Đức Nghĩa là đại lý ủy quyền chính thức phân phối xe máy điện VinFast, cung cấp đầy đủ các dịch vụ
                            cao cấp nhất cùng dịch vụ lốp thay, bảo dưỡng và lắp đặt – thay thế phụ tùng chính hãng.
                        </p>
                        <p>
                            Địa chỉ: 576 Lạc Long Quân, Phú Thượng, Tây Hồ, Hà Nội (đối diện cổng chính xe Lotte Mall Tây Hồ) là đại lý
                            đầu tiên và lớn nhất, phục vụ khách hàng với đội ngũ tư vấn kỹ thuật viên giàu kinh nghiệm, dịch vụ nhanh chóng
                            và đúng tiến độ.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Contact -->
                    <h3 class="vinfast_block_contact_title">Thông Tin Liên Hệ</h3>
                    <div class="vinfast_block_contact">
                        <div class="vinfast_block_contact_img">
                            <img class="vinfast_block_contact_qr" src="<?php echo get_template_directory_uri() . '/assets/images/QR.png'; ?>" alt="QR Code">
                        </div>
                        <div class="vinfast_block_contact_content">
                            <div class="vinfast_block_contact_item">
                                <img class="vinfast_block_contact_icon" src="<?php echo get_template_directory_uri() . '/assets/images/icon_2.svg'; ?>" alt="QR Code">
                                <span>0968718446</span>
                            </div>
                            <div class="vinfast_block_contact_item">
                                <img class="vinfast_block_contact_icon" src="<?php echo get_template_directory_uri() . '/assets/images/icon_2.svg'; ?>" alt="QR Code">
                                <span>fb.com/vinfastducnghia</span>
                            </div>
                            <div class="vinfast_block_contact_item">
                                <img class="vinfast_block_contact_icon" src="<?php echo get_template_directory_uri() . '/assets/images/icon_2.svg'; ?>" alt="QR Code">
                                <span>0968718446</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery -->
        <div class="vinfast_block_gallery">
            <div class="row gy-3">
                <div class="col-lg-6">
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <img class="vinfast_block_gallery_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="QR Code">
                        </div>
                        <div class="col-md-6">
                            <img class="vinfast_block_gallery_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="QR Code">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="vinfast_block_gallery_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="QR Code">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="vinfast_intro">
    <img class="vinfast_intro_bg" src="<?php echo get_template_directory_uri() . '/assets/images/Group_33.png'; ?>" alt="Giới thiệu">
    <div class="vinfast_intro_left">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="vinfast_intro_content">
                        <h3 class="vinfast_intro_title">Giới thiệu về</h3>
                        <h2 class="vinfast_intro_company">Công ty VinFast</h2>
                        <div class="vinfast_intro_text editor">
                            VinFast là công ty thành viên thuộc Tập đoàn Vingroup, một trong những
                            Tập đoàn kinh tế tư nhân đa ngành lớn nhất Châu Á. <br><br>
                            Với sứ mệnh “Vì một tương lai xanh cho mọi người”, VinFast không ngừng
                            sáng tạo để tạo ra các sản phẩm đẳng cấp, thông minh, dịch vụ xuất sắc cho mọi người.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- SECTION: Vision / Mission / Philosophy / Core Values -->
<section class="vision_section">
    <div class="container">
        <div class="vision_section_media">
            <img src="https://picsum.photos/id/1018/1920/1080" alt="Ảnh nền nhà máy và khuôn viên" class="vision_section_bg">
            <div class="vision_section_overlay" aria-hidden="true"></div>

            <div class="vision_section_container">
                <div class="row gy-4">
                    <div class="col-6 col-lg-3">
                        <article class="vision_item">
                            <h3 class="vision_item_title">Tầm nhìn</h3>
                            <div class="vision_item_desc">
                                Trở thành thương hiệu xe điện thông minh thúc đẩy mạnh mẽ cuộc cách mạng xe điện toàn cầu.
                            </div>
                        </article>
                    </div>
                    <div class="col-6 col-lg-3">
                        <article class="vision_item">
                            <h3 class="vision_item_title">Sứ mệnh</h3>
                            <div class="vision_item_desc">
                                Vì một tương lai xanh cho mọi người.
                            </div>
                        </article>
                    </div>
                    <div class="col-6 col-lg-3">
                        <article class="vision_item">
                            <h3 class="vision_item_title">Triết lý thương hiệu</h3>
                            <div class="vision_item_desc">
                                Đặt khách hàng làm trọng tâm, không ngừng sáng tạo để tạo ra các sản phẩm đẳng cấp và trải nghiệm xuất sắc cho mọi người.
                            </div>
                        </article>
                    </div>
                    <div class="col-6 col-lg-3">
                        <article class="vision_item">
                            <h3 class="vision_item_title">Giá trị cốt lõi</h3>
                            <div class="vision_item_desc">
                                Sản phẩm đẳng cấp, giá tốt, chính sách hậu mãi vượt trội.
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="brand_history">
    <div class="container">
        <h2 class="brand_history_title">Lịch sử thương hiệu</h2>
        <div class="brand_history_list">
            <div class="row gy-4">
                <!-- Item 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="brand_history_item">
                        <img class="brand_history_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="QR Code">
                        <div class="brand_history_content">
                            <div class="brand_history_date">15.08.2023</div>
                            <h3 class="brand_history_text">
                                VinFast chính thức niêm yết trên Nasdaq Global Select Market
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="brand_history_item">
                        <img class="brand_history_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="QR Code">
                        <div class="brand_history_content">
                            <div class="brand_history_date">21.04.2023</div>
                            <h3 class="brand_history_text">
                                VinFast chính thức bàn giao xe VF 5 Plus cho khách hàng
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="brand_history_item">
                        <img class="brand_history_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="QR Code">
                        <div class="brand_history_content">
                            <div class="brand_history_date">27.03.2023</div>
                            <h3 class="brand_history_text">
                                VinFast chính thức bàn giao xe VF 9 cho khách hàng
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="brand_history_item">
                        <img class="brand_history_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="QR Code">
                        <div class="brand_history_content">
                            <div class="brand_history_date">26.04.2022</div>
                            <h3 class="brand_history_text">
                                VinFast ra mắt 5 mẫu xe máy điện thế hệ mới sử dụng pin LFP
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
