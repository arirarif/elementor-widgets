<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_Trust_Bar_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_trust_bar';
    }

    public function get_title() {
        return __( 'Nusrat - Trust Bar', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'trust', 'features', 'icons', 'bar', 'nusrat' ];
    }

    protected function register_controls() {

        // ===== CONTENT TAB =====

        $this->start_controls_section(
            'section_items',
            [
                'label' => __( 'Trust Items', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'   => __( 'Title', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Feature Title', 'nusrat-widgets' ),
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label'   => __( 'Subtitle', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Short description', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'items',
            [
                'label'   => __( 'Items', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'icon'     => [ 'value' => 'fas fa-boxes-stacked', 'library' => 'fa-solid' ],
                        'title'    => __( '500+ Products', 'nusrat-widgets' ),
                        'subtitle' => __( 'Huge selection of items', 'nusrat-widgets' ),
                    ],
                    [
                        'icon'     => [ 'value' => 'fas fa-truck-fast', 'library' => 'fa-solid' ],
                        'title'    => __( 'Island-Wide Delivery', 'nusrat-widgets' ),
                        'subtitle' => __( 'Fast shipping across Cyprus', 'nusrat-widgets' ),
                    ],
                    [
                        'icon'     => [ 'value' => 'fas fa-tags', 'library' => 'fa-solid' ],
                        'title'    => __( 'Best Prices', 'nusrat-widgets' ),
                        'subtitle' => __( 'Competitive wholesale pricing', 'nusrat-widgets' ),
                    ],
                    [
                        'icon'     => [ 'value' => 'fas fa-headset', 'library' => 'fa-solid' ],
                        'title'    => __( 'Expert Support', 'nusrat-widgets' ),
                        'subtitle' => __( 'Dedicated customer service', 'nusrat-widgets' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // ===== STYLE TAB =====

        $this->start_controls_section(
            'section_style_general',
            [
                'label' => __( 'General', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .nw-trust-bar' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'show_border',
            [
                'label'     => __( 'Show Bottom Border', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::SWITCHER,
                'default'   => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => __( 'Icon Box', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label'     => __( 'Icon Background', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#F5F1EB',
                'selectors' => [
                    '{{WRAPPER}} .nw-trust-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1A3C6E',
                'selectors' => [
                    '{{WRAPPER}} .nw-trust-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .nw-trust-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1E2A3A',
                'selectors' => [
                    '{{WRAPPER}} .nw-trust-item h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'     => __( 'Subtitle Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .nw-trust-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $border_class = ( $s['show_border'] === 'yes' ) ? ' nw-trust-bordered' : '';
        ?>
        <section class="nw-trust-bar<?php echo esc_attr( $border_class ); ?>">
            <div class="nw-trust-container">
                <div class="nw-trust-grid">
                    <?php foreach ( $s['items'] as $item ) : ?>
                        <div class="nw-trust-item">
                            <div class="nw-trust-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <h4><?php echo esc_html( $item['title'] ); ?></h4>
                            <p><?php echo esc_html( $item['subtitle'] ); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
