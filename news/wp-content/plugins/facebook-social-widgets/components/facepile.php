<?php 
class FBW_Facepile extends WP_Widget {
	function FBW_Facepile() {
		$widget_ops = array('classname' => 'widget_fbw_facepile', 'description' => 'The Facepile plugin shows profile pictures of the user\'s friends who have already signed up for your site.' );
		$this->WP_Widget('fbw_facepile', 'Facebook - Facepile', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;

		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		if ( !empty( $title ) ) { echo $before_title . $instance['title'] . $after_title; };
		$header = ( !empty( $title ) ) ? 'false' : 'true' ;
		$url = get_bloginfo('url');
		
		echo "<fb:facepile max-rows='{$instance['maxrows']}' width='{$instance['width']}' />";
		?>
			<script>
			  window.fbAsyncInit = function() {
			    FB.init({ appId: '115235031832128', status: true, cookie: true,
			             xfbml: true});
			  };
			</script>
		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['width'] = strip_tags($new_instance['width']);
		$instance['scheme'] = strip_tags($new_instance['maxrows']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'width' => '',
			'maxrows' => '' 
		) );
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$width = strip_tags($instance['width']);
		$scheme = strip_tags($instance['maxrows']);
	?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', PLUG_LOCAL); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
				<small><?php _e('Widget Title.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" /><br/>
				<small><?php _e('The width of the plugin in pixels.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'maxrows' ); ?>"><?php _e('Number of Rows:', PLUG_LOCAL ); ?></label>
				<input  size="5" type="text"id="<?php echo $this->get_field_id( 'maxrows' ); ?>" name="<?php echo $this->get_field_name( 'maxrows' ); ?>" value="<?php echo $instance['maxrows']; ?>" /><br/>
				<small><?php _e('The maximum number of rows of profile pictures to show.', PLUG_LOCAL ); ?></small>
			</p>
	<?php
	}
}
