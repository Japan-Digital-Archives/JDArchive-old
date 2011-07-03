<?php 
class FBW_Recommendations extends WP_Widget {
	function FBW_Recommendations() {
		$widget_ops = array('classname' => 'widget_fbw_recommendations', 'description' => 'The Like button enables users to make connections to your pages and share content back to their friends on Facebook with one click.' );
		$this->WP_Widget('fbw_recommendations', 'Facebook - Recommendations', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;

		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		if ( !empty( $title ) ) { echo $before_title . $instance['title'] . $after_title; };
		$header = ( !empty( $title ) ) ? 'false' : 'true' ;
		$url = get_bloginfo('url');
		
		echo "<fb:recommendations site='{$url}' width='{$instance['width']}' height='{$instance['height']}' header='{$header}' colorscheme='{$instance['scheme']}' border-color='{$instance['bordercolor']}' />";
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
		$instance['height'] = strip_tags($new_instance['height']);
		$instance['scheme'] = strip_tags($new_instance['scheme']);
		$instance['bordercolor'] = strip_tags($new_instance['bordercolor']);
		
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'width' => '',
			'height' => '',
			'scheme' => '',
			'bordercolor' => '' 
			) );
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$width = strip_tags($instance['width']);
		$height = strip_tags($instance['height']);
		$scheme = strip_tags($instance['scheme']);
		$bordercolor = strip_tags($instance['bordercolor']);
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
				<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height:', PLUG_LOCAL ); ?></label>
				<input  size="5" type="text"id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" /><br/>
				<small><?php _e('The height of the plugin in pixels.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'scheme' ); ?>"><?php _e('Color Scheme: ', PLUG_LOCAL); ?></label>
				<select name="<?php echo $this->get_field_name( 'scheme' ); ?>">
					<option value="light" <?php if($scheme == "light") echo "selected";?>><?php _e('Light', PLUG_LOCAL); ?></option>
					<option value="dark" <?php if($scheme == "dark") echo "selected";?>><?php _e('Dark', PLUG_LOCAL); ?></option>
				</select><br/>
				<small><?php _e('The color scheme of the plugin.', PLUG_LOCAL ); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'bordercolor' ); ?>"><?php _e('Border Color:', PLUG_LOCAL ); ?></label>
				<input  size="5" type="text"id="<?php echo $this->get_field_id( 'bordercolor' ); ?>" name="<?php echo $this->get_field_name( 'bordercolor' ); ?>" value="<?php echo $instance['bordercolor']; ?>" /><br/>
				<small><?php _e('The border color of the plugin/box ( example, #EEEEEE ).', PLUG_LOCAL ); ?></small>
			</p>
	<?php
	}
}