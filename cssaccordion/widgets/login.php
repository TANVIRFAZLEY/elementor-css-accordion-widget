<?php

    use Elementor\Widget_Base;

    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }
    // Exit if accessed directly

    class TWM_CUSTOM_LOGIN extends Widget_Base {

        //widget id
        public function get_name() {
            return 'wp_custom_login';
        }

        //widget id
        public function get_title() {
            return __( 'WP Custom Login', 'textdomain' );
        }

        //widget id
        public function get_icon() {
            return 'eicon-lock-user';
        }

        //widget id
        public function get_categories() {
            return ['general'];
        }

        //widget id
        public function get_script_depends() {
            return [''];
        }

        //widget id
        public function get_style_depends() {
            return ['login-css'];
        }

        //register_controls
        protected function _register_controls() {
            $this->start_controls_section(
                'section_content',
                [
                    'label' => __( 'Content', 'textdomain' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'widget_title',
                [
                    'label'       => __( 'Title', 'textdomain' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => __( 'Default title', 'textdomain' ),
                    'placeholder' => __( 'Type your title here', 'textdomain' ),
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'section_style',
                [
                    'label' => __( 'Style', 'textdomain' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'text_transform',
                [
                    'label'     => __( 'Text Transform', 'textdomain' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'default'   => '',
                    'options'   => [
                        ''           => __( 'None', 'textdomain' ),
                        'uppercase'  => __( 'UPPERCASE', 'textdomain' ),
                        'lowercase'  => __( 'lowercase', 'textdomain' ),
                        'capitalize' => __( 'Capitalize', 'textdomain' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        //display
        protected function render() {
            $settings = $this->get_settings_for_display();

            //login
            if ( is_user_logged_in() ) {

                echo '<h2>Welcome. You are logged in!</h2>';

            ?>
<a class="cus_logout_btn" href="<?php echo wp_logout_url(); ?>">Log Out</a>
<?php

            } else {
                echo '<div class="cus_login_form">';
                wp_login_form(

                    array(
                        'echo'           => true,
                        // Default 'redirect' value takes the user back to the request URI.
                        'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                        'form_id'        => 'loginform',
                        'label_username' => __( 'Your Username' ),
                        'label_password' => __( 'Your Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Log In' ),
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                        'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'remember'       => true,
                        'value_username' => '',
                        // Set 'value_remember' to true to default the "Remember me" checkbox to checked.
                        'value_remember' => false,
                    )

                );
                echo '</div>';
            }

        }

        //display with js
        protected function _content_template() {

    }
}