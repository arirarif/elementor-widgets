<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_Hero_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_hero_section';
    }

    public function get_title() {
        return __( 'Nusrat - Hero Section', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'hero', 'banner', 'header', 'nusrat' ];
    }

    protected function register_controls() {

        // ===== CONTENT TAB =====

        // Background Image
        $this->start_controls_section(
            'section_background',
            [
                'label' => __( 'Background', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label'   => __( 'Background Image', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1400&q=80',
                ],
            ]
        );

        $this->end_controls_section();

        // Text Content
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tag_text',
            [
                'label'   => __( 'Tag Text', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Your Home, Your Style', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'   => __( 'Heading', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Everything for Your Kitchen & Home', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __( 'Description', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Quality accessories for every room. From cookware to home essentials, find everything you need with island-wide delivery across Cyprus.', 'nusrat-widgets' ),
            ]
        );

        $this->end_controls_section();

        // Buttons
        $this->start_controls_section(
            'section_buttons',
            [
                'label' => __( 'Buttons', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_primary_text',
            [
                'label'   => __( 'Primary Button Text', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Shop Now', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'btn_primary_link',
            [
                'label'       => __( 'Primary Button Link', 'nusrat-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => [ 'url' => '#' ],
                'placeholder' => __( 'https://your-link.com', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'btn_primary_icon',
            [
                'label'   => __( 'Primary Button Icon', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-shopping-bag',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'btn_secondary_text',
            [
                'label'     => __( 'Secondary Button Text', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'View Collections', 'nusrat-widgets' ),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'btn_secondary_link',
            [
                'label'       => __( 'Secondary Button Link', 'nusrat-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => [ 'url' => '#' ],
                'placeholder' => __( 'https://your-link.com', 'nusrat-widgets' ),
            ]
        );

        $this->end_controls_section();

        // ===== STYLE TAB =====

        // Overlay
        $this->start_controls_section(
            'section_style_overlay',
            [
                'label' => __( 'Overlay', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label'   => __( 'Overlay Color', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(26, 60, 110, 0.7)',
            ]
        );

        $this->add_responsive_control(
            'hero_min_height',
            [
                'label'      => __( 'Minimum Height', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range'      => [
                    'px' => [ 'min' => 200, 'max' => 1000 ],
                    'vh' => [ 'min' => 20, 'max' => 100 ],
                ],
                'default'    => [ 'unit' => 'px', 'size' => 520 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-hero' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Typography Style
        $this->start_controls_section(
            'section_style_text',
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
                'selector' => '{{WRAPPER}} .nw-hero h1',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'desc_typography',
                'label'    => __( 'Description Typography', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-hero p',
            ]
        );

        $this->end_controls_section();

        // Button Style
        $this->start_controls_section(
            'section_style_buttons',
            [
                'label' => __( 'Buttons', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_primary_bg',
            [
                'label'     => __( 'Primary Button Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#E8792B',
                'selectors' => [
                    '{{WRAPPER}} .nw-hero .nw-btn-primary' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_primary_hover_bg',
            [
                'label'     => __( 'Primary Button Hover Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#D56A20',
                'selectors' => [
                    '{{WRAPPER}} .nw-hero .nw-btn-primary:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_border_radius',
            [
                'label'      => __( 'Border Radius', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 0, 'max' => 50 ] ],
                'default'    => [ 'size' => 8 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-hero .nw-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $bg_url = ! empty( $s['bg_image']['url'] ) ? $s['bg_image']['url'] : '';
        $overlay = ! empty( $s['overlay_color'] ) ? $s['overlay_color'] : 'rgba(26,60,110,0.7)';

        $primary_link   = ! empty( $s['btn_primary_link']['url'] ) ? $s['btn_primary_link']['url'] : '#';
        $secondary_link = ! empty( $s['btn_secondary_link']['url'] ) ? $s['btn_secondary_link']['url'] : '#';

        $primary_target   = ! empty( $s['btn_primary_link']['is_external'] ) ? ' target="_blank"' : '';
        $secondary_target = ! empty( $s['btn_secondary_link']['is_external'] ) ? ' target="_blank"' : '';

        // Check if icon has a value
        $has_icon = ! empty( $s['btn_primary_icon'] ) && ! empty( $s['btn_primary_icon']['value'] );
        ?>
        <section class="nw-hero" style="background-image: url('<?php echo esc_url( $bg_url ); ?>');">
            <div class="nw-hero-overlay" style="background: <?php echo esc_attr( $overlay ); ?>;"></div>
            <div class="nw-hero-container">
                <div class="nw-hero-content">
                    <?php if ( ! empty( $s['tag_text'] ) ) : ?>
                        <span class="nw-hero-tag"><?php echo esc_html( $s['tag_text'] ); ?></span>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['heading'] ) ) : ?>
                        <h1><?php echo esc_html( $s['heading'] ); ?></h1>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['description'] ) ) : ?>
                        <p><?php echo esc_html( $s['description'] ); ?></p>
                    <?php endif; ?>

                    <div class="nw-hero-buttons">
                        <?php if ( ! empty( $s['btn_primary_text'] ) ) : ?>
                            <a href="<?php echo esc_url( $primary_link ); ?>"<?php echo $primary_target; ?> class="nw-btn nw-btn-primary">
                                <?php if ( $has_icon ) : ?>
                                    <span class="nw-btn-icon"><?php \Elementor\Icons_Manager::render_icon( $s['btn_primary_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                <?php endif; ?>
                                <span class="nw-btn-text"><?php echo esc_html( $s['btn_primary_text'] ); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $s['btn_secondary_text'] ) ) : ?>
                            <a href="<?php echo esc_url( $secondary_link ); ?>"<?php echo $secondary_target; ?> class="nw-btn nw-btn-outline">
                                <span class="nw-btn-text"><?php echo esc_html( $s['btn_secondary_text'] ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
