<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_Category_Showcase_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_category_showcase';
    }

    public function get_title() {
        return __( 'Nusrat - Category Showcase', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'category', 'grid', 'showcase', 'cards', 'nusrat' ];
    }

    protected function register_controls() {

        // ===== CONTENT TAB =====

        // Section Header
        $this->start_controls_section(
            'section_header',
            [
                'label' => __( 'Section Header', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'   => __( 'Heading', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Shop by Category', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label'   => __( 'Subheading', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Browse our curated collections for every corner of your home', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'show_accent_line',
            [
                'label'   => __( 'Show Accent Line', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        // Category Items
        $this->start_controls_section(
            'section_categories',
            [
                'label' => __( 'Categories', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label'   => __( 'Category Image', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'   => __( 'Category Name', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Category Name', 'nusrat-widgets' ),
            ]
        );

        $repeater->add_control(
            'link_text',
            [
                'label'   => __( 'Link Text', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Shop Now', 'nusrat-widgets' ),
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label'       => __( 'Link URL', 'nusrat-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => [ 'url' => '#' ],
                'placeholder' => __( 'https://your-link.com', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'categories',
            [
                'label'   => __( 'Category Items', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'title'     => __( 'Cookware', 'nusrat-widgets' ),
                        'link_text' => __( 'Shop Now', 'nusrat-widgets' ),
                        'image'     => [ 'url' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80' ],
                    ],
                    [
                        'title'     => __( 'Home Decor', 'nusrat-widgets' ),
                        'link_text' => __( 'Shop Now', 'nusrat-widgets' ),
                        'image'     => [ 'url' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=600&q=80' ],
                    ],
                    [
                        'title'     => __( 'Kitchen Tools', 'nusrat-widgets' ),
                        'link_text' => __( 'Shop Now', 'nusrat-widgets' ),
                        'image'     => [ 'url' => 'https://images.unsplash.com/photo-1610701596007-11502861dcfa?w=600&q=80' ],
                    ],
                    [
                        'title'     => __( 'Tableware & Dining', 'nusrat-widgets' ),
                        'link_text' => __( 'Shop Now', 'nusrat-widgets' ),
                        'image'     => [ 'url' => 'https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?w=600&q=80' ],
                    ],
                    [
                        'title'     => __( 'Storage & Organization', 'nusrat-widgets' ),
                        'link_text' => __( 'Shop Now', 'nusrat-widgets' ),
                        'image'     => [ 'url' => 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?w=600&q=80' ],
                    ],
                    [
                        'title'     => __( 'Cleaning Essentials', 'nusrat-widgets' ),
                        'link_text' => __( 'Shop Now', 'nusrat-widgets' ),
                        'image'     => [ 'url' => 'https://images.unsplash.com/photo-1563453392212-326f5e854473?w=600&q=80' ],
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Grid Layout
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
                'default' => '3',
                'options' => [
                    '2' => __( '2 Columns', 'nusrat-widgets' ),
                    '3' => __( '3 Columns', 'nusrat-widgets' ),
                    '4' => __( '4 Columns', 'nusrat-widgets' ),
                ],
            ]
        );

        $this->add_responsive_control(
            'card_height',
            [
                'label'      => __( 'Card Height', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 150, 'max' => 500 ] ],
                'default'    => [ 'size' => 240 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-cat-card' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .nw-cat-grid' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // ===== STYLE TAB =====

        $this->start_controls_section(
            'section_style_general',
            [
                'label' => __( 'Section Style', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bg',
            [
                'label'     => __( 'Background Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FAFAF7',
                'selectors' => [
                    '{{WRAPPER}} .nw-categories' => 'background-color: {{VALUE}};',
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

        $this->add_control(
            'overlay_color',
            [
                'label'   => __( 'Card Overlay Color', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(26, 60, 110, 0.85)',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label'      => __( 'Card Border Radius', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 30 ] ],
                'default'    => [ 'size' => 12 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-cat-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_typography',
            [
                'label' => __( 'Typography', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typography',
                'label'    => __( 'Heading Typography', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-cat-section-header h2',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'card_title_typography',
                'label'    => __( 'Card Title Typography', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-cat-overlay h3',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $overlay_color = ! empty( $s['overlay_color'] ) ? $s['overlay_color'] : 'rgba(26,60,110,0.85)';
        $columns = ! empty( $s['columns'] ) ? $s['columns'] : '3';
        ?>
        <section class="nw-categories">
            <div class="nw-cat-container">
                <?php if ( ! empty( $s['heading'] ) || ! empty( $s['subheading'] ) ) : ?>
                    <div class="nw-cat-section-header">
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

                <div class="nw-cat-grid nw-cat-cols-<?php echo esc_attr( $columns ); ?>">
                    <?php foreach ( $s['categories'] as $cat ) :
                        $img_url = ! empty( $cat['image']['url'] ) ? $cat['image']['url'] : '';
                        $link_url = ! empty( $cat['link']['url'] ) ? $cat['link']['url'] : '#';
                        $target = ! empty( $cat['link']['is_external'] ) ? ' target="_blank"' : '';
                    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>"<?php echo $target; ?> class="nw-cat-card">
                            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $cat['title'] ); ?>" loading="lazy">
                            <div class="nw-cat-overlay" style="background: linear-gradient(transparent, <?php echo esc_attr( $overlay_color ); ?>);">
                                <h3><?php echo esc_html( $cat['title'] ); ?></h3>
                                <span><?php echo esc_html( $cat['link_text'] ); ?> <i class="fas fa-arrow-right"></i></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
