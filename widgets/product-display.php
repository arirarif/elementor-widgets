<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_Product_Display_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_product_display';
    }

    public function get_title() {
        return __( 'Nusrat - Product Display', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-products';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'product', 'woocommerce', 'shop', 'grid', 'nusrat' ];
    }

    protected function register_controls() {

        // ===== CONTENT: Section Header =====
        $this->start_controls_section(
            'section_header',
            [
                'label' => __( 'Section Header', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_header',
            [
                'label'   => __( 'Show Section Header', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'     => __( 'Heading', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Best Sellers', 'nusrat-widgets' ),
                'condition' => [ 'show_header' => 'yes' ],
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label'     => __( 'Subheading', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Our most popular products loved by customers', 'nusrat-widgets' ),
                'condition' => [ 'show_header' => 'yes' ],
            ]
        );

        $this->add_control(
            'show_accent_line',
            [
                'label'     => __( 'Show Accent Line', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'default'   => 'yes',
                'condition' => [ 'show_header' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        // ===== CONTENT: Query =====
        $this->start_controls_section(
            'section_query',
            [
                'label' => __( 'Product Query', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'product_source',
            [
                'label'   => __( 'Show Products By', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'latest',
                'options' => [
                    'latest'   => __( 'Latest', 'nusrat-widgets' ),
                    'featured' => __( 'Featured', 'nusrat-widgets' ),
                    'best_selling' => __( 'Best Selling', 'nusrat-widgets' ),
                    'on_sale'  => __( 'On Sale', 'nusrat-widgets' ),
                    'top_rated' => __( 'Top Rated', 'nusrat-widgets' ),
                    'manual'   => __( 'Manual Selection', 'nusrat-widgets' ),
                ],
            ]
        );

        $this->add_control(
            'product_count',
            [
                'label'   => __( 'Number of Products', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
                'min'     => 1,
                'max'     => 20,
                'condition' => [ 'product_source!' => 'manual' ],
            ]
        );

        $this->add_control(
            'product_category',
            [
                'label'       => __( 'Filter by Category (slug)', 'nusrat-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'Enter category slug to filter. Leave empty for all.', 'nusrat-widgets' ),
                'condition'   => [ 'product_source!' => 'manual' ],
            ]
        );

        $this->add_control(
            'manual_product_ids',
            [
                'label'       => __( 'Product IDs', 'nusrat-widgets' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'Comma-separated product IDs (e.g. 12, 45, 78, 102)', 'nusrat-widgets' ),
                'condition'   => [ 'product_source' => 'manual' ],
            ]
        );

        $this->end_controls_section();

        // ===== CONTENT: Layout =====
        $this->start_controls_section(
            'section_layout',
            [
                'label' => __( 'Layout', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label'   => __( 'Columns', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '2' => __( '2 Columns', 'nusrat-widgets' ),
                    '3' => __( '3 Columns', 'nusrat-widgets' ),
                    '4' => __( '4 Columns', 'nusrat-widgets' ),
                ],
            ]
        );

        $this->add_responsive_control(
            'card_gap',
            [
                'label'      => __( 'Gap Between Cards', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
                'default'    => [ 'size' => 24 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-products-grid' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== CONTENT: Display Options =====
        $this->start_controls_section(
            'section_display',
            [
                'label' => __( 'Display Options', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_badge',
            [
                'label'   => __( 'Show Sale / New Badge', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_category',
            [
                'label'   => __( 'Show Product Category', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_price',
            [
                'label'   => __( 'Show Price', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_cart_btn',
            [
                'label'   => __( 'Show Add to Cart Button', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'cart_btn_text',
            [
                'label'     => __( 'Button Text', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Add to Cart', 'nusrat-widgets' ),
                'condition' => [ 'show_cart_btn' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        // ===== STYLE: Section =====
        $this->start_controls_section(
            'section_style_general',
            [
                'label' => __( 'Section', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bg',
            [
                'label'     => __( 'Background Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .nw-products' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label'      => __( 'Section Padding', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'default'    => [
                    'top'    => '80',
                    'right'  => '0',
                    'bottom' => '80',
                    'left'   => '0',
                    'unit'   => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .nw-products' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label'     => __( 'Accent Line Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#E8792B',
                'selectors' => [
                    '{{WRAPPER}} .nw-accent-line' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== STYLE: Card =====
        $this->start_controls_section(
            'section_style_card',
            [
                'label' => __( 'Product Card', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_bg',
            [
                'label'     => __( 'Card Background', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .nw-product-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label'      => __( 'Border Radius', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 30 ] ],
                'default'    => [ 'size' => 12 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-product-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label'      => __( 'Image Area Height', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 120, 'max' => 400 ] ],
                'default'    => [ 'size' => 220 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-product-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== STYLE: Button =====
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => __( 'Add to Cart Button', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_bg',
            [
                'label'     => __( 'Button Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#E8792B',
                'selectors' => [
                    '{{WRAPPER}} .nw-btn-cart' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_hover_bg',
            [
                'label'     => __( 'Button Hover Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#D56A20',
                'selectors' => [
                    '{{WRAPPER}} .nw-btn-cart:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label'     => __( 'Button Text Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .nw-btn-cart' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .nw-btn-cart i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_radius',
            [
                'label'      => __( 'Button Radius', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 30 ] ],
                'default'    => [ 'size' => 6 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-btn-cart' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== STYLE: Typography =====
        $this->start_controls_section(
            'section_style_typo',
            [
                'label' => __( 'Typography', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typography',
                'label'    => __( 'Section Heading', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-products-header h2',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Product Title', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-product-info h3',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'price_typography',
                'label'    => __( 'Price', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-product-price .nw-current-price',
            ]
        );

        $this->end_controls_section();

        // ===== STYLE: Badge =====
        $this->start_controls_section(
            'section_style_badge',
            [
                'label' => __( 'Badge', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'badge_new_bg',
            [
                'label'     => __( 'New Badge Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#5BAE3B',
                'selectors' => [
                    '{{WRAPPER}} .nw-badge-new' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_sale_bg',
            [
                'label'     => __( 'Sale Badge Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#E8792B',
                'selectors' => [
                    '{{WRAPPER}} .nw-badge-sale' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Build WP_Query args based on widget settings
     */
    private function get_query_args( $settings ) {
        $args = [
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => ! empty( $settings['product_count'] ) ? (int) $settings['product_count'] : 4,
        ];

        // Category filter
        if ( ! empty( $settings['product_category'] ) ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => sanitize_text_field( $settings['product_category'] ),
                ],
            ];
        }

        switch ( $settings['product_source'] ) {
            case 'featured':
                $args['tax_query'][] = [
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ];
                break;

            case 'best_selling':
                $args['meta_key'] = 'total_sales';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'DESC';
                break;

            case 'on_sale':
                $args['post__in'] = wc_get_product_ids_on_sale();
                if ( empty( $args['post__in'] ) ) {
                    $args['post__in'] = [ 0 ];
                }
                break;

            case 'top_rated':
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'DESC';
                break;

            case 'manual':
                $ids = array_map( 'absint', explode( ',', $settings['manual_product_ids'] ) );
                $args['post__in']       = $ids;
                $args['orderby']        = 'post__in';
                $args['posts_per_page'] = count( $ids );
                break;

            default: // latest
                $args['orderby'] = 'date';
                $args['order']   = 'DESC';
                break;
        }

        return $args;
    }

    /**
     * Check if product is "new" (published within last 30 days)
     */
    private function is_new_product( $product ) {
        $created = $product->get_date_created();
        if ( ! $created ) {
            return false;
        }
        $now  = new \DateTime();
        $diff = $now->diff( $created );
        return $diff->days <= 30;
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        if ( ! class_exists( 'WooCommerce' ) ) {
            echo '<p style="text-align:center;padding:40px;color:#999;">WooCommerce is required for this widget.</p>';
            return;
        }

        $columns = ! empty( $s['columns'] ) ? $s['columns'] : '4';
        $query   = new \WP_Query( $this->get_query_args( $s ) );
        ?>
        <section class="nw-products">
            <div class="nw-products-container">

                <?php if ( $s['show_header'] === 'yes' && ( ! empty( $s['heading'] ) || ! empty( $s['subheading'] ) ) ) : ?>
                    <div class="nw-products-header">
                        <?php if ( ! empty( $s['heading'] ) ) : ?>
                            <h2><?php echo esc_html( $s['heading'] ); ?></h2>
                        <?php endif; ?>
                        <?php if ( ! empty( $s['subheading'] ) ) : ?>
                            <p><?php echo esc_html( $s['subheading'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( $s['show_accent_line'] === 'yes' ) : ?>
                            <div class="nw-accent-line"></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $query->have_posts() ) : ?>
                    <div class="nw-products-grid nw-products-cols-<?php echo esc_attr( $columns ); ?>">
                        <?php while ( $query->have_posts() ) : $query->the_post();
                            global $product;
                            if ( ! $product ) continue;

                            $is_on_sale = $product->is_on_sale();
                            $is_new     = $this->is_new_product( $product );
                            $image      = wp_get_attachment_image_src( get_post_thumbnail_id(), 'woocommerce_thumbnail' );
                            $image_url  = $image ? $image[0] : wc_placeholder_img_src();
                            $categories = get_the_terms( get_the_ID(), 'product_cat' );
                            $cat_name   = ( $categories && ! is_wp_error( $categories ) ) ? $categories[0]->name : '';
                        ?>
                            <div class="nw-product-card">
                                <a href="<?php the_permalink(); ?>" class="nw-product-image">
                                    <?php if ( $s['show_badge'] === 'yes' ) : ?>
                                        <?php if ( $is_on_sale ) : ?>
                                            <span class="nw-product-badge nw-badge-sale"><?php esc_html_e( 'Sale', 'nusrat-widgets' ); ?></span>
                                        <?php elseif ( $is_new ) : ?>
                                            <span class="nw-product-badge nw-badge-new"><?php esc_html_e( 'New', 'nusrat-widgets' ); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy">
                                </a>
                                <div class="nw-product-info">
                                    <?php if ( $s['show_category'] === 'yes' && $cat_name ) : ?>
                                        <span class="nw-product-cat"><?php echo esc_html( $cat_name ); ?></span>
                                    <?php endif; ?>

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                    <?php if ( $s['show_price'] === 'yes' ) : ?>
                                        <div class="nw-product-price">
                                            <?php if ( $is_on_sale && $product->get_regular_price() ) : ?>
                                                <span class="nw-current-price"><?php echo wp_kses_post( wc_price( $product->get_sale_price() ) ); ?></span>
                                                <span class="nw-old-price"><?php echo wp_kses_post( wc_price( $product->get_regular_price() ) ); ?></span>
                                            <?php else : ?>
                                                <span class="nw-current-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( $s['show_cart_btn'] === 'yes' ) : ?>
                                        <?php if ( $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() ) : ?>
                                            <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
                                               data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
                                               data-quantity="1"
                                               class="nw-btn-cart add_to_cart_button ajax_add_to_cart">
                                                <i class="fas fa-cart-plus"></i>
                                                <span><?php echo esc_html( $s['cart_btn_text'] ); ?></span>
                                            </a>
                                        <?php else : ?>
                                            <a href="<?php the_permalink(); ?>" class="nw-btn-cart">
                                                <i class="fas fa-eye"></i>
                                                <span><?php esc_html_e( 'View Product', 'nusrat-widgets' ); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>
                    <p class="nw-no-products"><?php esc_html_e( 'No products found.', 'nusrat-widgets' ); ?></p>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}
