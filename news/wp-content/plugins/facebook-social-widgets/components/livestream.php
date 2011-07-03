<?php 
class FBW_LiveStream extends WP_Widget {
	function FBW_LiveStream() {
		$widget_ops = array('classname' => 'widget_fbw_livestream', 'description' => 'The Live Stream plugin lets users visiting your site or application share activity and comments in real time. ' );
		$this->WP_Widget('fbw_livestream', 'Facebook - Live Stream', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;

		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		if ( !empty( $title ) ) { echo $before_title . $instance['title'] . $after_title; };
		$header = ( !empty( $instance['title'] ) ) ? 'false' : 'true' ;
		$stream = ( $instance['stream'] ) ? 'false' : 'true' ;
		$url = get_bloginfo('url');
		
		echo "<fb:live-stream app_id='{$instance['id']}' width='{$instance['width']}' height='{$instance['height']}' xid='{$instance['xid']}' />";

		?>
			<script>
			  window.fbAsyncInit = function() {
			    FB.init({ status: true, cookie: true,
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
		$instance['id'] = strip_tags($new_instance['id']);
		$instance['xid'] = strip_tags($new_instance['xid']);
		
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'width' => '',
			'height' => '',  
			'id' => '',
			'xid' => ''
		) );
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$width = strip_tags($instance['width']);
		$height = strip_tags($instance['height']);
		$stream = strip_tags($instance['stream']);
		$id = strip_tags($instance['id']);
		$connection = strip_tags($instance['connection']);

	?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', PLUG_LOCAL); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" /><br/>
				<small><?php _e('Leave blank if you rather show the Facebook header on the plugin.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('App ID:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $instance['id']; ?>" /><br/>
				<small><?php _e('Your Facebook application ID or API key.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" /><br/>
				<small><?php _e('The width of the plugin in pixels.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" /><br/>
				<small><?php _e('The height of the plugin in pixels.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'xid' ); ?>"><?php _e('XID:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'xid' ); ?>" name="<?php echo $this->get_field_name( 'xid' ); ?>" value="<?php echo $instance['xid']; ?>" /><br/>
				<small><?php _e('If you have multiple live stream boxes on the same page, specify a unique `xid` for each.', PLUG_LOCAL ); ?></small>
			</p>
	<?php
	}
}
