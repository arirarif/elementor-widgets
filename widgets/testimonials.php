<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Nusrat_Testimonials_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'nusrat_testimonials';
    }

    public function get_title() {
        return __( 'Nusrat - Testimonials', 'nusrat-widgets' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'nusrat-widgets' ];
    }

    public function get_keywords() {
        return [ 'testimonial', 'review', 'quote', 'rating', 'nusrat' ];
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
            'show_header',
            [
                'label'   => __( 'Show Header', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'     => __( 'Heading', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'What Our Customers Say', 'nusrat-widgets' ),
                'condition' => [ 'show_header' => 'yes' ],
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label'     => __( 'Subheading', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Trusted by homes and businesses across Cyprus', 'nusrat-widgets' ),
                'condition' => [ 'show_header' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        // Testimonials
        $this->start_controls_section(
            'section_testimonials',
            [
                'label' => __( 'Testimonials', 'nusrat-widgets' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'name',
            [
                'label'   => __( 'Name', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'John D.', 'nusrat-widgets' ),
            ]
        );

        $repeater->add_control(
            'role',
            [
                'label'   => __( 'Role / Location', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Limassol', 'nusrat-widgets' ),
            ]
        );

        $repeater->add_control(
            'quote',
            [
                'label'   => __( 'Testimonial', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Excellent products and very fast delivery. The quality is outstanding for the price!', 'nusrat-widgets' ),
            ]
        );

        $repeater->add_control(
            'rating',
            [
                'label'   => __( 'Star Rating', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
                'options' => [
                    '1' => '1 Star',
                    '2' => '2 Stars',
                    '3' => '3 Stars',
                    '4' => '4 Stars',
                    '5' => '5 Stars',
                ],
            ]
        );

        $repeater->add_control(
            'avatar',
            [
                'label' => __( 'Avatar Image (optional)', 'nusrat-widgets' ),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label'   => __( 'Testimonials', 'nusrat-widgets' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'name'   => __( 'Maria K.', 'nusrat-widgets' ),
                        'role'   => __( 'Limassol', 'nusrat-widgets' ),
                        'quote'  => __( 'Excellent range of kitchen products and very fast delivery. The quality is outstanding for the price. Will definitely order again!', 'nusrat-widgets' ),
                        'rating' => '5',
                    ],
                    [
                        'name'   => __( 'Andreas P.', 'nusrat-widgets' ),
                        'role'   => __( 'Restaurant Owner, Nicosia', 'nusrat-widgets' ),
                        'quote'  => __( "We've been ordering supplies for our restaurant from Nicochem for over a year. Great prices and reliable service every time.", 'nusrat-widgets' ),
                        'rating' => '5',
                    ],
                    [
                        'name'   => __( 'Elena S.', 'nusrat-widgets' ),
                        'role'   => __( 'Larnaca', 'nusrat-widgets' ),
                        'quote'  => __( 'Love the home accessories collection! Found beautiful items for my kitchen renovation. The customer service team was very helpful.', 'nusrat-widgets' ),
                        'rating' => '5',
                    ],
                ],
                'title_field' => '{{{ name }}}',
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
                'default' => '3',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
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
                'label'     => __( 'Section Background', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .nw-testimonials' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_bg',
            [
                'label'     => __( 'Card Background', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#FAFAF7',
                'selectors' => [
                    '{{WRAPPER}} .nw-testimonial-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'star_color',
            [
                'label'     => __( 'Star Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#E8792B',
                'selectors' => [
                    '{{WRAPPER}} .nw-testimonial-stars i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'avatar_bg',
            [
                'label'     => __( 'Avatar Fallback Color', 'nusrat-widgets' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1A3C6E',
                'selectors' => [
                    '{{WRAPPER}} .nw-testimonial-initial' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s       = $this->get_settings_for_display();
        $columns = ! empty( $s['columns'] ) ? $s['columns'] : '3';
        ?>
        <section class="nw-testimonials">
            <div class="nw-testimonials-container">
                <?php if ( $s['show_header'] === 'yes' ) : ?>
                    <div class="nw-testimonials-header">
                        <?php if ( ! empty( $s['heading'] ) ) : ?>
                            <h2><?php echo esc_html( $s['heading'] ); ?></h2>
                        <?php endif; ?>
                        <?php if ( ! empty( $s['subheading'] ) ) : ?>
                            <p><?php echo esc_html( $s['subheading'] ); ?></p>
                        <?php endif; ?>
                        <div class="nw-accent-line"></div>
                    </div>
                <?php endif; ?>

                <div class="nw-testimonial-grid nw-testimonial-cols-<?php echo esc_attr( $columns ); ?>">
                    <?php foreach ( $s['testimonials'] as $t ) :
                        $rating  = (int) $t['rating'];
                        $initial = mb_substr( $t['name'], 0, 1 );
                        $has_avatar = ! empty( $t['avatar'] ) && ! empty( $t['avatar']['url'] );
                    ?>
                        <div class="nw-testimonial-card">
                            <div class="nw-testimonial-stars">
                                <?php for ( $i = 0; $i < $rating; $i++ ) : ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                                <?php for ( $i = $rating; $i < 5; $i++ ) : ?>
                                    <i class="far fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <blockquote>&ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;</blockquote>
                            <div class="nw-testimonial-author">
                                <?php if ( $has_avatar ) : ?>
                                    <img src="<?php echo esc_url( $t['avatar']['url'] ); ?>" alt="<?php echo esc_attr( $t['name'] ); ?>" class="nw-testimonial-avatar-img">
                                <?php else : ?>
                                    <span class="nw-testimonial-initial"><?php echo esc_html( $initial ); ?></span>
                                <?php endif; ?>
                                <div>
                                    <h4><?php echo esc_html( $t['name'] ); ?></h4>
                                    <?php if ( ! empty( $t['role'] ) ) : ?>
                                        <span><?php echo esc_html( $t['role'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
