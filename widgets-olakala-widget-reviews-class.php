<?php

class Widgets_Olakala_Widget_Reviews extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget-olakala-reviews',
			'description' => 'Affiche les avis "publics" collectés grâce aux questionnaires de satisfaction client Olakala',
		);
		parent::__construct( 'widget-olakala-reviews', 'Olakala Reviews', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
            // outputs the content of the widget
            echo $args['before_widget'];
            if ( ! empty( $instance['title'] ) ) {
                echo $instance['title'];
            }
            if ( ! empty( $instance['code'] ) ) {
                $olakalaCode = $instance['code'];
                $url = OLAKALA_API_REVIEWS_URL.$olakalaCode;
                ?>
                <script>var $ = jQuery.noConflict();</script>
                <div class="olakala-reviews">
                <?php echo file_get_contents($url); ?>
                </div>
                <?php
            }
            echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
            $title = isset($instance['title']) ? $instance['title'] : esc_html__( 'Titre', 'olakala-widget' );
            $code = isset($instance['code']) ? $instance['code'] : esc_html__( 'Code Olakala', 'olakala-widget' );
            ?>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Titre :', 'olakala-widget' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>"><?php esc_attr_e( 'Code Olakala :', 'olakala-widget' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'code' ) ); ?>" type="text" value="<?php echo esc_attr( $code ); ?>">
            </p>
            <?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['code'] = ( ! empty( $new_instance['code'] ) ) ? strip_tags( $new_instance['code'] ) : '';
            
            return $instance;
	}
}

add_action( 'widgets_init', function(){
    register_widget( 'Widgets_Olakala_Widget_Reviews' );
});