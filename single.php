<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package xe_dien
 */

get_header();
?>

<div id="vinfast-2025" class="detail__section">
    <div class="container py-mb py-lg-pc">
        <div class="row justify-content-center">
            <!-- Main -->
            <div class="col-lg-10">
                <!-- Heading -->
                <h1 class="detail__heading">
                    <?php the_title(); ?>
                </h1>

                <!-- Info -->
                <div class="detail__info">
                    <div class="detail__meta">
                        <a class="detail__category" href="<?php echo home_url('/'); ?>">VinFast Đức Nghĩa</a>

                        <div class="detail__date">
                            <?php echo get_the_date('l, j/n/Y, H:i'); ?>
                        </div>
                    </div>

                    <div class="detail__topic">
                        <?php
                        $categories = get_the_category();
                        if (! empty($categories)) {
                            echo 'Chủ đề: ';
                            $cats = [];
                            foreach ($categories as $cat) {
                                $url = get_category_link($cat->term_id);
                                $cats[] = '<a href="' . $url . '"><span>' . $cat->name . '</span></a>';
                            }
                            echo implode(', ', $cats);
                        }
                        ?>
                    </div>
                </div>

                <!-- Content Main -->
                <div class="detail__content--main editor">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- New News -->
    <div class="news__list">
        <div class="container">
            <div class="news__inner">
                <h2 class="news__heading">
                    Tin Tức Mới Nhất
                </h2>

                <a href="#" class="news__link">
                    Xem thêm
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                            fill="#3E6AE1" />
                    </svg>
                </a>
            </div>

            <!-- Content Post -->
            <div class="row gy-4">
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3, // chỉ lấy 1 bài mới nhất
                    'post__not_in'   => array(get_the_ID()), // loại trừ bài hiện tại
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="post__item" data-mh="post_item">
                                <!-- Thumbnail Post -->
                                <a class="d-block post__thumbnail" href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', array(
                                            'fetchpriority' => 'high',
                                            'decoding'      => 'async',
                                        )); ?>
                                    <?php endif; ?>
                                </a>

                                <!-- Content Post -->
                                <div class="post__content" data-mh="post__content">
                                    <!-- Title Post -->
                                    <a class="d-flex post__title" href="<?php the_permalink(); ?>">
                                        <h3 class="line-2"><?php the_title(); ?></h3>
                                    </a>

                                    <!-- Excerpt Post -->
                                    <p class="post__desc line-3">
                                        <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
                                    </p>

                                    <!-- Info Post -->
                                    <div class="post__info d-flex">
                                        <!-- Author Post -->
                                        <div class="post__category">
                                            <!-- Icon -->
                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/icon_1.svg'; ?>" alt="icon 1">
                                            <!-- Link Author -->
                                            <a href="<?php echo home_url('/'); ?>" class="post__category--name">
                                                VinFast Đức Nghĩa
                                            </a>
                                        </div>

                                        <!-- Date -->
                                        <div class="post__date">
                                            <?php echo get_the_date('l, j/n/Y, H:i'); ?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>

    <?php
    $contact_form = get_field('contact_form', 'option');
    if (!empty($contact_form) && is_array($contact_form)) :
        $title = $contact_form['title'] ?? '';
        $description = $contact_form['description'] ?? '';
        $form_id = $contact_form['form'] ?? '';
        $image = $contact_form['image'] ?? '';
    ?>
        <div class="home_form_contact">
            <div class="row gx-0">
                <div class="col-lg-6">
                    <div class="img_wrap">
                        <?php if ($image) : ?>
                            <img src="<?php echo $image; ?>" alt="Contact form">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inner">
                        <div class="content">
                            <div class="logo">
                                <?php $logo_url = get_template_directory_uri() . '/assets/images/logo.svg'; ?>
                                <img src="<?php echo $logo_url; ?>" alt="logo">
                            </div>

                            <?php if ($title) : ?>
                                <h2 class="title"><?php echo $title; ?></h2>
                            <?php endif; ?>

                            <?php if ($description) : ?>
                                <div class="desc"><?php echo $description; ?></div>
                            <?php endif; ?>

                            <?php
                            if ($form_id) {
                                echo do_shortcode('[contact-form-7 id="' . $form_id . '"]');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php
get_footer();
