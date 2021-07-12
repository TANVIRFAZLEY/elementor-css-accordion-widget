<?php

    use Elementor\Widget_Base;

    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }
    // Exit if accessed directly

    class TWM_CSSACCORDION extends Widget_Base {

        //widget id
        public function get_name() {
            return 'css_accordion';
        }

        //widget id
        public function get_title() {
            return __( 'Css Toggle', 'textdomain' );
        }

        //widget id
        public function get_icon() {
            return 'eicon-kit-parts';
        }

        //widget id
        public function get_categories() {
            return ['basic'];
        }

        //widget id
        public function get_script_depends() {
            return [''];
        }

        //widget id
        public function get_style_depends() {
            return ['css-accordion'];
        }

        //register_controls
        protected function _register_controls() {
            $this->start_controls_section(
                'section_content',
                [
                    'label' => __( 'Content', 'cssaccordion' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'title', [
                    'label'       => __( 'Title', 'cssaccordion' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'description', [
                    'label' => __( 'Description', 'cssaccordion' ),
                    'type'  => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'toggle_list',
                [
                    'label'       => __( 'Toggle List', 'cssaccordion' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'title'       => __( 'Toggle 1', 'cssaccordion' ),
                            'description' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'cssaccordion' ),
                        ],
                        [
                            'title'       => __( 'Toggle 2', 'cssaccordion' ),
                            'description' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'cssaccordion' ),
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'section_style',
                [
                    'label' => __( 'Style', 'cssaccordion' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'title_style',
                [
                    'label'     => __( 'Title Style', 'cssaccordion' ),
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'name_typography',
                    'label'    => __( 'Title Typography', 'thewebmake' ),
                    'selector' => '{{WRAPPER}} .twm-tab-label',
                ]
            );
            $this->add_control(
                'title_text_color',
                [
                    'label'     => __( 'Title Color', 'thewebmake' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .twm-tab-label' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_text_hover_color',
                [
                    'label'     => __( 'Title Hover Color', 'thewebmake' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .twm-tab-label:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_background_color',
                [
                    'label'     => __( 'Title Background Color', 'thewebmake' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#2c3e50',
                    'selectors' => [
                        '{{WRAPPER}} .twm-tab-label' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'background_hover_color',
                [
                    'label'     => __( 'Title Hover Background Color', 'thewebmake' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#1a252f',
                    'selectors' => [
                        '{{WRAPPER}} .twm-tab-label:hover' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_padding',
                [
                    'label'      => __( 'Title Padding', 'plugin-domain' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .twm-tab-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'description_style',
                [
                    'label'     => __( 'Description Style', 'cssaccordion' ),
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'desc_typography',
                    'label'    => __( 'Description Typography', 'thewebmake' ),
                    'selector' => '{{WRAPPER}} .twm-tab-content',
                ]
            );
            $this->add_control(
                'description_text_color',
                [
                    'label'     => __( 'Description Color', 'thewebmake' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#2c3e50',
                    'selectors' => [
                        '{{WRAPPER}} .twm-tab-content' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'description_background_color',
                [
                    'label'     => __( 'Description Background Color', 'thewebmake' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .twm-tab-content' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'description_padding',
                [
                    'label'      => __( 'Description Padding', 'plugin-domain' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .twm-tab-item input:checked~.twm-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'decs_text_alignment',
                [
                    'label'     => __( 'DescriptionText Alignment', 'thewebmake' ),
                    'type'      => \Elementor\Controls_Manager::CHOOSE,
                    'options'   => [
                        'left'   => [
                            'title' => __( 'Left', 'thewebmake' ),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'thewebmake' ),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right'  => [
                            'title' => __( 'Right', 'thewebmake' ),
                            'icon'  => 'fa fa-align-right',
                        ],
                    ],
                    'default'   => 'left',
                    'selectors' => [
                        '{{WRAPPER}} .twm-tab-content' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        //display
        protected function render() {
            $settings = $this->get_settings_for_display();
            echo $settings['title'];
        ?>

<div class="twm-tab-container">
    <div class="twm-tabs">
        <?php if ( $settings['toggle_list'] ) {?>
        <?php foreach ( $settings['toggle_list'] as $item ) {?>
        <?php $dynamic_id = rand( 78676, 967698 );?>
        <div class="twm-tab-item">
            <input type="checkbox" id="<?php echo $dynamic_id; ?>">
            <label class="twm-tab-label" for="<?php echo $dynamic_id; ?>"><?php echo $item['title']; ?></label>
            <div class="twm-tab-content">
                <?php echo $item['description']; ?>
            </div>
        </div>
        <?php }}?>
    </div>
</div>
<?php

        }

        //display with js
        protected function _content_template() {

    }
}