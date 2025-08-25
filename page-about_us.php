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

<?php
$section_1 = get_field('section_1');
?>

<?php if ($section_1): ?>
    <div class="vinfast_block">
        <div class="container">
            <!-- Header -->
            <?php if (!empty($section_1['logo'])): ?>
                <div class="vinfast_block_logo">
                    <?php echo wp_get_attachment_image($section_1['logo'], 'full', false, ['class' => 'vinfast_block_logo_img']); ?>
                </div>
            <?php endif; ?>

            <!-- Slogan -->
            <div class="vinfast_block_slogan">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <?php if (!empty($section_1['mo_ta_gioi_thieu'])): ?>
                            <div class="editor">
                                <?php echo $section_1['mo_ta_gioi_thieu']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4">
                        <!-- Contact -->
                        <h3 class="vinfast_block_contact_title">Thông Tin Liên Hệ</h3>
                        <div class="vinfast_block_contact">
                            <?php if (!empty($section_1['qr_code'])): ?>
                                <div class="vinfast_block_contact_img">
                                    <?php echo wp_get_attachment_image($section_1['qr_code'], 'full', false, ['class' => 'vinfast_block_contact_qr']); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($section_1['thong_tin_lien_he']) && is_array($section_1['thong_tin_lien_he'])): ?>
                                <div class="vinfast_block_contact_content">
                                    <?php foreach ($section_1['thong_tin_lien_he'] as $item): ?>
                                        <div class="vinfast_block_contact_item">
                                            <?php if (!empty($item['icon'])): ?>
                                                <?php echo wp_get_attachment_image($item['icon'], 'full', false, ['class' => 'vinfast_block_contact_icon']); ?>
                                            <?php endif; ?>
                                            <?php if (!empty($item['text'])): ?>
                                                <span><?php echo $item['text']; ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="vinfast_block_gallery">
                <div class="row gy-3">
                    <div class="col-lg-6">
                        <div class="row gy-3">
                            <?php if (!empty($section_1['hinh_anh_1'])): ?>
                                <div class="col-md-6">
                                    <?php echo wp_get_attachment_image($section_1['hinh_anh_1'], 'full', false, ['class' => 'vinfast_block_gallery_img']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($section_1['hinh_anh_2'])): ?>
                                <div class="col-md-6">
                                    <?php echo wp_get_attachment_image($section_1['hinh_anh_2'], 'full', false, ['class' => 'vinfast_block_gallery_img']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php if (!empty($section_1['hinh_anh_3'])): ?>
                            <?php echo wp_get_attachment_image($section_1['hinh_anh_3'], 'full', false, ['class' => 'vinfast_block_gallery_img']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php
$section_2 = get_field('section_2');

$has_title   = !empty($section_2['tieu_de']);
$has_company = !empty($section_2['ten_cong_ty']);
$has_msg     = !empty($section_2['thong_diep']);
$has_bg      = !empty($section_2['anh_san_pham']);

if ($has_title || $has_company || $has_msg || $has_bg) : ?>
    <section class="vinfast_intro">
        <?php if ($has_bg) : ?>
            <?php
            // Ảnh nền: dùng ảnh ACF (anh_san_pham) → class vinfast_intro_bg
            echo wp_get_attachment_image(
                $section_2['anh_san_pham'],
                'full',
                false,
                array('class' => 'vinfast_intro_bg', 'alt' => 'Giới thiệu')
            );
            ?>
        <?php endif; ?>

        <div class="vinfast_intro_left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="vinfast_intro_content">
                            <?php if ($has_title) : ?>
                                <h3 class="vinfast_intro_title"><?php echo $section_2['tieu_de']; ?></h3>
                            <?php endif; ?>

                            <?php if ($has_company) : ?>
                                <h2 class="vinfast_intro_company"><?php echo $section_2['ten_cong_ty']; ?></h2>
                            <?php endif; ?>

                            <?php if ($has_msg) : ?>
                                <div class="vinfast_intro_text editor">
                                    <?php echo $section_2['thong_diep']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!-- SECTION: Vision / Mission / Philosophy / Core Values -->

<?php
$section_3 = get_field('section_3');
if ($section_3) :
?>
    <section class="vision_section">
        <div class="container">
            <div class="vision_section_media">
                <?php if (!empty($section_3['background'])) : ?>
                    <?php echo wp_get_attachment_image($section_3['background'], 'full', false, [
                        'class' => 'vision_section_bg',
                        'alt'   => 'Ảnh nền nhà máy và khuôn viên'
                    ]); ?>
                <?php endif; ?>
                <div class="vision_section_overlay" aria-hidden="true"></div>

                <div class="vision_section_container">
                    <?php if (!empty($section_3['gia_tri_cot_loi']) && is_array($section_3['gia_tri_cot_loi'])) : ?>
                        <div class="row gy-4">
                            <?php foreach ($section_3['gia_tri_cot_loi'] as $item) : ?>
                                <?php if (!empty($item['tieu_de']) || !empty($item['mo_ta'])) : ?>
                                    <div class="col-6 col-lg-3">
                                        <article class="vision_item">
                                            <?php if (!empty($item['tieu_de'])) : ?>
                                                <h3 class="vision_item_title"><?php echo $item['tieu_de']; ?></h3>
                                            <?php endif; ?>
                                            <?php if (!empty($item['mo_ta'])) : ?>
                                                <div class="vision_item_desc"><?php echo $item['mo_ta']; ?></div>
                                            <?php endif; ?>
                                        </article>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$section_4 = get_field('section_4');
if (!empty($section_4)) : ?>
    <section class="brand_history">
        <div class="container">
            <?php if (!empty($section_4['tieu_de'])) : ?>
                <h2 class="brand_history_title"><?php echo $section_4['tieu_de']; ?></h2>
            <?php endif; ?>

            <?php if (!empty($section_4['danh_sach_su_kien'])) : ?>
                <div class="brand_history_list">
                    <div class="row gy-4">
                        <?php foreach ($section_4['danh_sach_su_kien'] as $item) : ?>
                            <?php if (!empty($item['ten']) && !empty($item['ngay_dien_ra'])) : ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="brand_history_item">
                                        <?php if (!empty($item['hinh_anh'])) : ?>
                                            <?php echo wp_get_attachment_image($item['hinh_anh'], 'full', false, ['class' => 'brand_history_img']); ?>
                                        <?php else : ?>
                                            <img class="brand_history_img" src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="Default">
                                        <?php endif; ?>

                                        <div class="brand_history_content">
                                            <div class="brand_history_date">
                                                <?php echo str_replace('/', '.', $item['ngay_dien_ra']); ?>
                                            </div>
                                            <h3 class="brand_history_text"><?php echo $item['ten']; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>


<?php
get_footer();
