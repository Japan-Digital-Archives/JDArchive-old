<?php 
class FBW_LikeButton extends WP_Widget {
	function FBW_LikeButton() {
		$widget_ops = array('classname' => 'widget_fbw_likebutton', 'description' => 'The Like button enables users to make connections to your pages and share content back to their friends on Facebook with one click.' );
		$this->WP_Widget('fbw_likebutton', 'Facebook - Like Button', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;

		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		if ( !empty( $title ) ) { echo $before_title . $instance['title'] . $after_title; };
		$header = ( !empty( $title ) ) ? 'false' : 'true' ;
		$faces = ( $instance['faces'] ) ? 'false' : 'true' ;
		$url = get_bloginfo('url');
		
		echo "<fb:like href='{$url}' layout='{$instance['layout']}' show-faces='{$faces}' width='{$instance['width']}' action='{$instance['action']}' colorscheme='{$instance['scheme']}' />";
		
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
		$instance['layout'] = strip_tags($new_instance['layout']);
		$instance['faces'] = strip_tags($new_instance['faces']);
		$instance['action'] = strip_tags($new_instance['action']);
		$instance['scheme'] = strip_tags($new_instance['scheme']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'width' => '', 
			'layout' => '', 
			'faces' => '1',
			'action' => '',
			'scheme' => ''
		) );
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$width = strip_tags($instance['width']);
		$height = strip_tags($instance['layout']);
		$faces = strip_tags($instance['faces']);
		$action = strip_tags($instance['action']);
		$scheme = strip_tags($instance['scheme']);

	?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', PLUG_LOCAL); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" /><br/>
				<small><?php _e('Leave blank if you rather show the Facebook header on the plugin.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width:', PLUG_LOCAL); ?></label>
				<input  size="5" type="text" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" /><br/>
				<small><?php _e('The width of the plugin in pixels.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e('Layout Style: ', PLUG_LOCAL); ?></label>
				<select name="<?php echo $this->get_field_name( 'layout' ); ?>">
					<option value="standard" <?php if($layout == "standard") echo "selected";?>><?php _e('standard', PLUG_LOCAL); ?></option>
					<option value="button_count" <?php if($layout == "button_count") echo "selected";?>><?php _e('button_count', PLUG_LOCAL); ?></option>
				</select><br/>
				<small><?php _e('Determines the size and amount of social context next to the button.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" value="1" <?php if($faces) echo "checked";?>>
				<label for="<?php echo $this->get_field_id( 'faces' ); ?>"><?php _e('Show profile pictures below the button.', PLUG_LOCAL); ?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'action' ); ?>"><?php _e('Verb to display: ', PLUG_LOCAL); ?></label>
				<select name="<?php echo $this->get_field_name( 'action' ); ?>">
					<option value="like" <?php if($action == "like") echo "selected";?>><?php _e('like', PLUG_LOCAL); ?></option>
					<option value="recommend" <?php if($action == "recommend") echo "selected";?>><?php _e('recommend', PLUG_LOCAL); ?></option>
				</select><br/>
				<small><?php _e('The verb to display in the button. Currently only \'like\' and \'recommend\' are supported.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'scheme' ); ?>"><?php _e('Color Scheme: ', PLUG_LOCAL); ?></label>
				<select name="<?php echo $this->get_field_name( 'scheme' ); ?>">
					<option value="light" <?php if($scheme == "light") echo "selected";?>><?php _e('Light', PLUG_LOCAL); ?></option>
					<option value="dark" <?php if($scheme == "dark") echo "selected";?>><?php _e('Dark', PLUG_LOCAL); ?></option>
				</select><br/>
				<small><?php _e('The color scheme of the plugin.', PLUG_LOCAL ); ?></small>
			</p>
	<?php
	}
}
