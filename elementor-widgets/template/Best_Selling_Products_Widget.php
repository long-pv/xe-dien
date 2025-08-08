<?php
if (!defined('ABSPATH')) exit;

class Best_Selling_Products_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'best_selling_products_widget';
    }

    public function get_title()
    {
        return __('Sản phẩm bán chạy', 'child_theme');
    }

    public function get_icon()
    {
        return 'eicon-products';
    }

    public function get_categories()
    {
        return ['custom_builder_theme'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Danh sách sản phẩm', 'child_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'best_selling_products',
            [
                'label' => __('Chọn sản phẩm bán chạy', 'child_theme'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'label_block' => true,
                'options' => $this->get_all_products(),
            ]
        );

        $this->end_controls_section();
    }

    // Lấy danh sách sản phẩm WooCommerce
    private function get_all_products()
    {
        $args = [
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ];
        $products = get_posts($args);
        $options = [];
        foreach ($products as $product) {
            $options[$product->ID] = $product->post_title;
        }
        return $options;
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $product_ids = $settings['best_selling_products'] ?? [];

        if (!empty($product_ids)) :
?>
            <div class="home_best_selling">
                <div class="best_selling_slider">
                    <?php
                    foreach ($product_ids as $product_id) :
                        $product = wc_get_product($product_id);
                        if (!$product) continue;

                        $product_name = $product->get_name();
                        $product_image_url = wp_get_attachment_url($product->get_image_id());
                        $product_url = get_permalink($product_id);
                        $add_to_cart_url = esc_url(add_query_arg('add-to-cart', $product_id, wc_get_cart_url()));

                        // ACF Fields
                        $introduce = get_field('introduce', $product_id) ?? '';
                        $maximum_speed = get_field('maximum_speed', $product_id) ?? '';
                        $distance_traveled = get_field('distance_traveled', $product_id) ?? '';
                        $trunk_width = get_field('trunk_width', $product_id) ?? '';
                        $minimum_price_from = get_field('minimum_price_from', $product_id) ?? '';
                    ?>
                        <div>
                            <div class="best_selling_item">
                                <div class="content">
                                    <h3 class="title"><?php echo esc_html($product_name); ?></h3>
                                    <div class="desc"><?php echo esc_html($introduce); ?></div>

                                    <div class="feature">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="value"><?php echo esc_html($maximum_speed ?: 'N/A'); ?></div>
                                                <div class="title">TỐC ĐỘ TỐI ĐA</div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="value"><?php echo esc_html($distance_traveled ?: 'N/A'); ?></div>
                                                <div class="title">QUÃNG ĐƯỜNG DI CHUYỂN</div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="value"><?php echo esc_html($trunk_width ?: 'N/A'); ?></div>
                                                <div class="title">ĐỘ RỘNG CỐP XE</div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="value"><?php echo esc_html($minimum_price_from ?: 'N/A'); ?></div>
                                                <div class="title">GIÁ TỐI THIỂU TỪ</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="list_btn">
                                        <a href="<?php echo esc_url($product_url); ?>" class="btn_2">XEM CHI TIẾT</a>
                                        <a href="<?php echo esc_url($add_to_cart_url); ?>" class="btn_3">ĐẶT CỌC</a>
                                    </div>
                                </div>
                                <div class="img_wrap">
                                    <img src="<?php echo esc_url($product_image_url); ?>" alt="<?php echo esc_attr($product_name); ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
<?php
        endif;
    }
}
