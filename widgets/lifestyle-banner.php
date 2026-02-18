<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_Lifestyle_Banner_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_lifestyle_banner';
    }

    public function get_title() {
        return __( 'Nusrat - Lifestyle Banner', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'lifestyle', 'banner', 'split', 'image', 'nusrat' ];
    }

    protected function register_controls() {

        // Image
        $this->start_controls_section(
            'section_image',
            [
                'label' => __( 'Image', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label'   => __( 'Image', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1556909114-44e3e70034e2?w=800&q=80',
                ],
            ]
        );

        $this->add_control(
            'image_position',
            [
                'label'   => __( 'Image Side', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left'  => __( 'Left', 'nusrat-widgets' ),
                    'right' => __( 'Right', 'nusrat-widgets' ),
                ],
            ]
        );

        $this->end_controls_section();

        // Content
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'   => __( 'Heading', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Make Your Kitchen the Heart of Your Home', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __( 'Description', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Discover our carefully selected range of kitchen accessories, cookware, and home essentials. From everyday basics to premium collections, we bring quality and style to homes across Cyprus.', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'   => __( 'Button Text', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Explore Kitchen Collection', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label'       => __( 'Button Link', 'nusrat-widgets' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'btn_icon',
            [
                'label'   => __( 'Button Icon', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-utensils',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->end_controls_section();

        // Style
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_bg',
            [
                'label'     => __( 'Content Background', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#F5F1EB',
                'selectors' => [
                    '{{WRAPPER}} .nw-lifestyle-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'min_height',
            [
                'label'      => __( 'Minimum Height', 'nusrat-widgets' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [ 'px' => [ 'min' => 200, 'max' => 700 ] ],
                'default'    => [ 'size' => 420 ],
                'selectors'  => [
                    '{{WRAPPER}} .nw-lifestyle' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label'     => __( 'Button Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#5BAE3B',
                'selectors' => [
                    '{{WRAPPER}} .nw-lifestyle-btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_hover_color',
            [
                'label'     => __( 'Button Hover Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#4A9A2E',
                'selectors' => [
                    '{{WRAPPER}} .nw-lifestyle-btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typo',
                'label'    => __( 'Heading Typography', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-lifestyle-text h2',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $img_url    = ! empty( $s['image']['url'] ) ? $s['image']['url'] : '';
        $link_url   = ! empty( $s['btn_link']['url'] ) ? $s['btn_link']['url'] : '#';
        $target     = ! empty( $s['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $has_icon   = ! empty( $s['btn_icon'] ) && ! empty( $s['btn_icon']['value'] );
        $img_side   = ! empty( $s['image_position'] ) ? $s['image_position'] : 'left';
        $flip_class = ( $img_side === 'right' ) ? ' nw-lifestyle-flipped' : '';
        ?>
        <section class="nw-lifestyle<?php echo esc_attr( $flip_class ); ?>">
            <div class="nw-lifestyle-image" style="background-image: url('<?php echo esc_url( $img_url ); ?>');"></div>
            <div class="nw-lifestyle-content">
                <div class="nw-lifestyle-text">
                    <?php if ( ! empty( $s['heading'] ) ) : ?>
                        <h2><?php echo esc_html( $s['heading'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['description'] ) ) : ?>
                        <p><?php echo esc_html( $s['description'] ); ?></p>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['btn_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $link_url ); ?>"<?php echo $target; ?> class="nw-lifestyle-btn">
                            <?php if ( $has_icon ) : ?>
                                <span class="nw-btn-icon"><?php \Elementor\Icons_Manager::render_icon( $s['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                            <?php endif; ?>
                            <span><?php echo esc_html( $s['btn_text'] ); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
