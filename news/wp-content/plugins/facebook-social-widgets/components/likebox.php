<?php 
class FBW_LikeBox extends WP_Widget {
	function FBW_LikeBox() {
		$widget_ops = array('classname' => 'widget_fbw_likebox', 'description' => 'The Like Box is a social plugin that enables Facebook Page owners to attract and gain Likes from their own website.' );
		$this->WP_Widget('fbw_likebox', 'Facebook - Like Box', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;

		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		if ( !empty( $title ) ) { echo $before_title . $instance['title'] . $after_title; };
		$header = ( !empty( $instance['title'] ) ) ? 'false' : 'true' ;
		$stream = ( $instance['stream'] ) ? 'false' : 'true' ;
		$url = get_bloginfo('url');
		
		//echo "<fb:like-box id='{$instance['id']}' stream='{$stream}' width='{$instance['width']}' height='{$instance['height']}' connection='{$instance['connection']}' header='{$header}' />";
		
		// Use iFrame until FB fixes their shit.
		echo "<iframe src='http://www.facebook.com/plugins/fan.php?id={$instance['id']}&amp;width={$instance['width']}&amp;connections={$instance['connection']}&amp;stream={$stream}&amp;header={$header}' scrolling='no' frameborder='0' allowTransparency='true' style='border:none; overflow:hidden; width:{$instance['width']}px; height:{$instance['height']}px'></iframe>";
		?>
		<?php
		/*/
		?>
			<script>
			  window.fbAsyncInit = function() {
			    FB.init({ status: true, cookie: true,
			             xfbml: true});
			  };
			</script>
		<?php
		
		/**/
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['width'] = strip_tags($new_instance['width']);
		$instance['height'] = strip_tags($new_instance['height']);
		$instance['stream'] = strip_tags($new_instance['stream']);
		$instance['id'] = strip_tags($new_instance['id']);
		$instance['connection'] = strip_tags($new_instance['connection']);
		
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'width' => '',
			'height' => '',  
			'stream' => '1', 
			'id' => '111416595535370',
			'connection' => ''
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
				<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('Facebook Page ID:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $instance['id']; ?>" /><br/>
				<small><?php _e('The ID of the Facebook Page for this Like box.', PLUG_LOCAL ); ?></small>
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
				<label for="<?php echo $this->get_field_id( 'connection' ); ?>"><?php _e('Connections:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'connection' ); ?>" name="<?php echo $this->get_field_name( 'connection' ); ?>" value="<?php echo $instance['connection']; ?>" /><br/>
				<small><?php _e('Show a sample of this many users who have liked this Page.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'stream' ); ?>" name="<?php echo $this->get_field_name( 'stream' ); ?>" value="1" <?php if($stream) echo "checked";?>>
				<label for="<?php echo $this->get_field_id( 'stream' ); ?>"><?php _e('Show the profile stream for the public profile.', PLUG_LOCAL); ?></label>
			</p>
	<?php
	}
}
