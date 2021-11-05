<?php
/**
 * @package Start-Wars
 */

function starwars_register_widget() {
	register_widget( 'starwars_widget' );
}

add_action( 'widgets_init', 'starwars_register_widget' );


class Starwars_Widget extends WP_Widget {


	function __construct() {
		parent::__construct(
		// widget ID
		'starwars_widget',
		// widget name
		__('Star Wars Widget', 'starwars_widget'),
		// widget description
		array ( 'description' => __( 'Star Wars Widget Challenge', 'starwars_widget' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		//if title is present
		If ( ! empty ( $title ) )
		Echo $args['before_title'] . $title . $args['after_title'];
		//output
		
		if (isset($_SESSION['data_starwars_widget'])) {
		  echo __( $_SESSION['data_starwars_widget'] , 'starwars_widget' );
	    }else {
	    	echo __( 'Greetings Star Wars plug-in!', 'starwars_widget' );
	    }
		echo $args['after_widget'];
	}

	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
		else
		$title = __( 'Star Wars Character Detail', 'starwars_widget' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}