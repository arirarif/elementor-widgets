<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_Why_Choose_Us_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_why_choose_us';
    }

    public function get_title() {
        return __( 'Nusrat - Why Choose Us', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'why', 'features', 'choose', 'about', 'nusrat' ];
    }

    protected function register_controls() {

        // Header
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
                'default' => __( 'Why Choose Nicochem?', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label'   => __( 'Subheading', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( "We're committed to bringing the best to your home", 'nusrat-widgets' ),
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

        // Feature Items
        $this->start_controls_section(
            'section_items',
            [
                'label' => __( 'Feature Items', 'nusrat-widgets' ),
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
            'description',
            [
                'label'   => __( 'Description', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Short description of this feature', 'nusrat-widgets' ),
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
                        'icon'        => [ 'value' => 'fas fa-award', 'library' => 'fa-solid' ],
                        'title'       => __( 'Quality Products', 'nusrat-widgets' ),
                        'description' => __( 'Carefully sourced products from trusted brands and manufacturers', 'nusrat-widgets' ),
                    ],
                    [
                        'icon'        => [ 'value' => 'fas fa-hand-holding-dollar', 'library' => 'fa-solid' ],
                        'title'       => __( 'Best Prices', 'nusrat-widgets' ),
                        'description' => __( 'Competitive wholesale pricing passed directly to you', 'nusrat-widgets' ),
                    ],
                    [
                        'icon'        => [ 'value' => 'fas fa-truck', 'library' => 'fa-solid' ],
                        'title'       => __( 'Fast Delivery', 'nusrat-widgets' ),
                        'description' => __( 'Island-wide delivery across Cyprus with reliable service', 'nusrat-widgets' ),
                    ],
                    [
                        'icon'        => [ 'value' => 'fas fa-rotate-left', 'library' => 'fa-solid' ],
                        'title'       => __( 'Easy Returns', 'nusrat-widgets' ),
                        'description' => __( 'Hassle-free returns and responsive customer support', 'nusrat-widgets' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Layout
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
            'section_bg',
            [
                'label'     => __( 'Background', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .nw-why-us' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_start',
            [
                'label'     => __( 'Icon Gradient Start', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1A3C6E',
                'selectors' => [
                    '{{WRAPPER}} .nw-why-icon' => 'background: linear-gradient(135deg, {{VALUE}}, var(--nw-why-icon-end, #2A5298));',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_end',
            [
                'label'     => __( 'Icon Gradient End', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#2A5298',
                'selectors' => [
                    '{{WRAPPER}} .nw-why-icon' => '--nw-why-icon-end: {{VALUE}}; background: linear-gradient(135deg, var(--nw-primary), {{VALUE}});',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typo',
                'label'    => __( 'Heading Typography', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-why-header h2',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s       = $this->get_settings_for_display();
        $columns = ! empty( $s['columns'] ) ? $s['columns'] : '4';
        ?>
        <section class="nw-why-us">
            <div class="nw-why-container">
                <?php if ( ! empty( $s['heading'] ) || ! empty( $s['subheading'] ) ) : ?>
                    <div class="nw-why-header">
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

                <div class="nw-why-grid nw-why-cols-<?php echo esc_attr( $columns ); ?>">
                    <?php foreach ( $s['items'] as $item ) : ?>
                        <div class="nw-why-item">
                            <div class="nw-why-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo esc_html( $item['description'] ); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
