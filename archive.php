<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xe_dien
 */

get_header();

$category = get_queried_object();
?>

<div class="archive_post py-mb py-lg-pc">
    <div class="container">
        <h2 class="title">
            <?php echo $category->name; ?>
        </h2>

        <!-- Content Post -->
        <div class="row gy-4">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
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
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-12">
                    <p>Chưa có bài viết phù hợp.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => false,
                'next_text' => false,
            ));
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

<?php
get_footer();
