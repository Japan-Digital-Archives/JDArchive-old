<?php
/*
Plugin Name: Facebook Social Widgets
Plugin URI: http://core.sproutventure.com
Description: Social plugins enable you to provide engaging social experiences to your users with just a line of HTML. Because they are hosted by Facebook, the plugins are personalized for all users who are logged into Facebook — even if the users haven't yet signed up for your site.
Version: 1.0.1
Author: Dan Cameron of Sproutventure
Author URI: http://sproutventure.com 
*/


/**
* Plugin Class
*/
if ( !class_exists('FacebookWidgets') ) {
	
	class FacebookWidgets
	{

		public function __construct()
		{
			define('PLUG_LOCAL', 'fb_widgets');
			
			define('FBW_ABSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
			$this->pluginUrl = str_replace( WP_PLUGIN_DIR, WP_PLUGIN_URL, $this->pluginDirectory );
			
			// Add necessary js
			add_action( 'wp_head', array( $this, 'fb_connect_js' ) );
			//add_action( 'init', array( $this, 'enqueue_resources' ) );
			
			// Activity Widget
			require_once ('components/activity.php');
			add_action( 'widgets_init', create_function('', 'return register_widget("FBW_Activity");') );
			
			// Facepile Widget
			require_once ('components/facepile.php');
			add_action( 'widgets_init', create_function('', 'return register_widget("FBW_Facepile");') );
			
			// Like Button Widget
			require_once ('components/likebutton.php');
			add_action( 'widgets_init', create_function('', 'return register_widget("FBW_LikeButton");') );
			
			// Like Box Widget
			require_once ('components/likebox.php');
			add_action( 'widgets_init', create_function('', 'return register_widget("FBW_LikeBox");') );
			
			// Live Stream Widget
			require_once ('components/livestream.php');
			add_action( 'widgets_init', create_function('', 'return register_widget("FBW_LiveStream");') );
			
			// Recommendations
			require_once ('components/recommendations.php');
			add_action( 'widgets_init', create_function('', 'return register_widget("FBW_Recommendations");') );
			
			// Options panel
			/*/ Disabled until necessary
			if (is_admin()) {
				include ( FBW_ABSPATH . 'views/admin.php' );
				$FBWOptions = new FacebookWidgetsOptions();
			}
			/**/
		}
		public function fb_connect_js()
		{
			/**/ ?>
				<script src="//connect.facebook.net/en_US/all.js"></script>
			<?php
			/**/
		}
		public function enqueue_resources() 
		{
			//wp_enqueue_script('facebook-connect', 'http://connect.facebook.net/en_US/all.js');
		}
		
	}
	global $fbw;
	$fbw = new FacebookWidgets();
	
	// Load up template tags
	// include ('library/template-tags.php');
}