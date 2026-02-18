<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_CTA_Banner_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_cta_banner';
    }

    public function get_title() {
        return __( 'Nusrat - CTA Banner', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'cta', 'call to action', 'banner', 'contact', 'nusrat' ];
    }

    protected function register_controls() {

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
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Ready to Upgrade Your Home?', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __( 'Description', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Get in touch with us for bulk orders, special requests, or any questions', 'nusrat-widgets' ),
            ]
        );

        $this->end_controls_section();

        // Contact Info
        $this->start_controls_section(
            'section_contact',
            [
                'label' => __( 'Contact Info', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_phone',
            [
                'label'   => __( 'Show Phone', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'phone',
            [
                'label'     => __( 'Phone Number', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '+357 99 315676',
                'condition' => [ 'show_phone' => 'yes' ],
            ]
        );

        $this->add_control(
            'show_email',
            [
                'label'   => __( 'Show Email', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'email',
            [
                'label'     => __( 'Email', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'info@nicochem.com.cy',
                'condition' => [ 'show_email' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            'section_button',
            [
                'label' => __( 'Button', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'   => __( 'Button Text', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Contact Us Today', 'nusrat-widgets' ),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label'   => __( 'Button Link', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'btn_icon',
            [
                'label'   => __( 'Button Icon', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-paper-plane',
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
            'bg_color_start',
            [
                'label'   => __( 'Background Gradient Start', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => '#1A3C6E',
            ]
        );

        $this->add_control(
            'bg_color_end',
            [
                'label'   => __( 'Background Gradient End', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => '#2A5298',
            ]
        );

        $this->add_control(
            'btn_bg',
            [
                'label'     => __( 'Button Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#E8792B',
                'selectors' => [
                    '{{WRAPPER}} .nw-cta-btn' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .nw-cta-btn:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_typo',
                'label'    => __( 'Heading Typography', 'nusrat-widgets' ),
                'selector' => '{{WRAPPER}} .nw-cta h2',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $bg_start = ! empty( $s['bg_color_start'] ) ? $s['bg_color_start'] : '#1A3C6E';
        $bg_end   = ! empty( $s['bg_color_end'] ) ? $s['bg_color_end'] : '#2A5298';
        $link_url = ! empty( $s['btn_link']['url'] ) ? $s['btn_link']['url'] : '#';
        $target   = ! empty( $s['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $has_icon = ! empty( $s['btn_icon'] ) && ! empty( $s['btn_icon']['value'] );

        $phone_clean = preg_replace( '/[^0-9+]/', '', $s['phone'] );
        ?>
        <section class="nw-cta" style="background: linear-gradient(135deg, <?php echo esc_attr( $bg_start ); ?> 0%, <?php echo esc_attr( $bg_end ); ?> 100%);">
            <div class="nw-cta-container">
                <?php if ( ! empty( $s['heading'] ) ) : ?>
                    <h2><?php echo esc_html( $s['heading'] ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $s['description'] ) ) : ?>
                    <p class="nw-cta-desc"><?php echo esc_html( $s['description'] ); ?></p>
                <?php endif; ?>

                <div class="nw-cta-contacts">
                    <?php if ( $s['show_phone'] === 'yes' && ! empty( $s['phone'] ) ) : ?>
                        <a href="tel:<?php echo esc_attr( $phone_clean ); ?>">
                            <i class="fas fa-phone"></i> <?php echo esc_html( $s['phone'] ); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ( $s['show_email'] === 'yes' && ! empty( $s['email'] ) ) : ?>
                        <a href="mailto:<?php echo esc_attr( $s['email'] ); ?>">
                            <i class="fas fa-envelope"></i> <?php echo esc_html( $s['email'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ( ! empty( $s['btn_text'] ) ) : ?>
                    <a href="<?php echo esc_url( $link_url ); ?>"<?php echo $target; ?> class="nw-cta-btn">
                        <?php if ( $has_icon ) : ?>
                            <span class="nw-btn-icon"><?php \Elementor\Icons_Manager::render_icon( $s['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                        <?php endif; ?>
                        <span><?php echo esc_html( $s['btn_text'] ); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}
