<?php
/*
Plugin Name: Social Media Counters
Plugin URI: http://www.philhancox.co.uk/social-media-counters-wordpress-plugin
Description: Add social media counters to your blog so users can share your content and see how many others have shared. Add to the top of posts, bottom of posts or both. Services include Twitter, Facebook, the new Google +1 and more.
Version: 1.1.1
Author: Phil Hancox
Author URI: http://www.philhancox.co.uk
License: GPL2
Copyright: 2011  Phil Hancox  philh@ncox.co.uk
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


add_action('admin_menu', 'ph_social_media_counters_menu');
add_action( 'admin_init', 'ph_register_social_media_counters_settings' );
wp_enqueue_script('common');

function ph_social_media_counters_menu() {

  add_submenu_page( 'options-general.php', 'Social Media Counters', 'Social Media Counters', '8', 'ph_social_media_counters', 'ph_social_media_counters_page');

}

function ph_register_social_media_counters_settings() {
	// What options to enable
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_enable' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_enable' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_enable' );
	// New global settings
	register_setting( 'ph_social_media_counters_options_group', 'ph_twitter_data_via' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_method' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_method' );
		
	// Services and styles for top of post
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_button' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_twitter' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_facebook' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_buzz' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_digg' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_stumble' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_addthis' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_linkedin' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_service_plusone' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_style_title' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_style_title_style' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_post' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_page' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_home' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_category' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_date' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_tag' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_author' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_top_type_search' );
	
	// Services and styles for bottom of post
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_button' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_twitter' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_facebook' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_buzz' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_digg' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_stumble' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_addthis' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_linkedin' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_service_plusone' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_style_title' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_style_title_style' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_post' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_page' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_home' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_category' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_date' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_tag' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_author' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_bottom_type_search' );
	
	// Services and styles for excerpts
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_button' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_twitter' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_facebook' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_buzz' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_digg' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_stumble' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_addthis' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_linkedin' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_service_plusone' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_style_title' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_style_title_style' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_post' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_page' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_home' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_category' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_date' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_tag' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_author' );
	register_setting( 'ph_social_media_counters_options_group', 'ph_social_counter_excerpt_type_search' );	
	
	$post_types = get_post_types('','names'); 
	foreach ($post_types as $post_type ) {
			if($post_type != "revision" && $post_type != "nav_menu_item") {
				$post_type_option_top = 'ph_social_counter_top_type_'.$post_type;
				register_setting( 'ph_social_media_counters_options_group', $post_type_option_top );
				$post_type_option_bottom = 'ph_social_counter_bottom_type_'.$post_type;
				register_setting( 'ph_social_media_counters_options_group', $post_type_option_bottom );				
			}
	}

}

function ph_social_media_counters_page() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
?>


<div class="wrap">
<div id="icon-users" class="icon32"></div><h2>Social Media Counters Options</h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="post-body">
<div id="post-body-content">

<form method="post" action="options.php"> 
<?php settings_fields( 'ph_social_media_counters_options_group' ); ?>
           
	<div id="ph_social_media_share_settings" class="stuffbox">
    		<h3 class="hndle"><span>Settings</span></h3>
    			<div class="inside">
					<p>Twitter username<br /><span style="font-size: 10px">If you add your username, this will appear in the user's Tweet as "via @username".</span></p>
					<input type="text" name="ph_twitter_data_via" value="<?php echo get_option('ph_twitter_data_via'); ?>" />
					
                    
				</div>
	</div>
    
    
	<div id="ph_social_media_share_top" class="stuffbox">
    		<h3 class="hndle"><span>Top of Post</span></h3>
    			<div class="inside">
					<?php ph_social_media_options( 'top' ); ?>
				</div>
	</div>
                    

	<div id="ph_social_media_share_bottom" class="stuffbox">
    		<h3 class="hndle"><span>Bottom of Post</span></h3>
    			<div class="inside">
					<?php ph_social_media_options( 'bottom' ); ?>
				</div>
	</div>
                    

	<div id="ph_social_media_share_bottom" class="stuffbox">
    		<h3 class="hndle"><span>Excerpts</span></h3>
    			<div class="inside">
					<?php ph_social_media_options( 'excerpt' ); ?>
				</div>
	</div>
      

<input class="button-primary" type="submit" name="send" value="Save settings" id="submitbutton" />

</form>

</div>
</div>

    <div id="side-info-column" class="inner-sidebar">
    
        <div class="postbox">
            <h3 class="hndle"><span>Created by</span></h3>	
            <div class="inside">
            	<div style="width: 170px; margin: 0 auto;">
                <a href="http://www.philhancox.co.uk" target="_blank"><img src="<?php echo plugins_url('/images/phil_hancox_logo.png' , __FILE__); ?>" alt="" border="0" /></a>
            	<p>Developed by <strong><a href="http://www.philhancox.co.uk/" target="_blank">Phil Hancox</a></strong></p>
                <p><em><a href="http://www.philhancox.co.uk/" target="_blank">http://www.philhancox.co.uk</a></em></p>
                <p><em>Follow me on Twitter: <a href="http://www.twitter.com/philhancox" target="_blank">@philhancox</a></em></p>
                </div>
            </div>
        </div>

        <div class="postbox">
            <h3 class="hndle"><span>Contact</span></h3>	
            <div class="inside">    
            <h2>Version 1.1</h2>
            <p>Please send enquiries, bugs, feature requests and so on to philh@ncox.co.uk or use the comment form on the official plugin page which can be found by <a href="http://www.philhancox.co.uk/social-media-counters-wordpress-plugin" target="_blank">clicking here</a>.</p>
            </div>
        </div>

        <div class="postbox">
            <h3 class="hndle"><span>Donate</span></h3>	
            <div class="inside">    
            <p>If you enjoy this plugin and find it useful, why not buy me a beer? If you wish to, please use the Donate button below. Thank you! <strong><a href="http://www.philhancox.co.uk/donate" target="_blank">Click here for more information</a></strong></p>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="22A268P8AZSZA">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

            </div>
        </div>
                        
    </div>

</div>
<div class="clear"></div>
<?php 
}


function ph_social_media_options ( $choice ) {
	
	if($choice == "top") {
		$choice_text = "Top of Post";	
	} elseif($choice == "bottom") {
		$choice_text = "Bottom of Post";	
	} elseif($choice == "excerpt") {
		$choice_text = "Excerpts";	
	}
?>
<p><input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_enable') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_enable" /> Enable <?php echo $choice_text; ?></p>

<div id="ph_social_counter_<?php echo $choice; ?>_box">
<h2>Where to display</h2>
<p>
<?php if($choice == "top" || $choice == "bottom") { ?>
	<?php
	$post_types = get_post_types('','names'); 
	foreach ($post_types as $post_type ) {
			if($post_type != "revision" && $post_type != "nav_menu_item") {
	?>
	<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_type_'.$post_type.'') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_type_<?php echo $post_type; ?>" /> <?php $post_type_name = ucfirst(str_replace('_', ' ', $post_type)); echo $post_type_name; ?>
	<?php } 
	} ?>
<?php } else { ?>
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_type_category') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_type_category" /> Category Pages 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_type_tag') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_type_tag" /> Tag Pages 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_type_date') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_type_date" /> Date Archives (Year, Month, Date) 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_type_search') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_type_search" /> Search Pages 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_type_author') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_type_author" /> Author Archives
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_type_home') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_type_home" /> Homepage 
<?php } ?>
</p>

<h2>Buttons</h2>

<p><img src="<?php echo plugins_url('/images/button_thin.png' , __FILE__); ?>" alt="" border="0" /><br /><input type="radio"<?php if(get_option('ph_social_counter_'.$choice.'_button') == "thin") { ?> checked<?php } ?> name="ph_social_counter_<?php echo $choice; ?>_button" value="thin" /> Thin buttons</p>
<p><img src="<?php echo plugins_url('/images/button_tall.png' , __FILE__); ?>" alt="" border="0" /><br /><input type="radio"<?php if(get_option('ph_social_counter_'.$choice.'_button') != "thin") { ?> checked<?php } ?> name="ph_social_counter_<?php echo $choice; ?>_button" value="tall" /> Tall buttons</p>


<h2>Services</h2>

<p>
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_twitter') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_twitter" /> Twitter 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_facebook') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_facebook" /> Facebook 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_buzz') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_buzz" /> Google Buzz 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_digg') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_digg" /> Digg 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_stumble') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_stumble" /> StumbleUpon 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_addthis') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_addthis" /> AddThis 
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_linkedin') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_linkedin" /> LinkedIn</p>
<input type="checkbox" <?php if(get_option('ph_social_counter_'.$choice.'_service_plusone') == "on") { ?>checked <?php } ?>name="ph_social_counter_<?php echo $choice; ?>_service_plusone" /> Google +1</p>

<h2>Style</h2>

<h4>Title</h4>
<input type="text" name="ph_social_counter_<?php echo $choice; ?>_style_title" value="<?php echo get_option('ph_social_counter_'.$choice.'_style_title'); ?>" />

<h4>Title Style</h4>
<span class="ph_social_media_admin_sub">The title, regardless of property, is given a class of "ph_social_counter_<?php echo $choice; ?>_title" so you can apply your own additional CSS if necessary.</span> </p>
<select name="ph_social_counter_<?php echo $choice; ?>_style_title_style">
<option <?php if(get_option('ph_social_counter_'.$choice.'_style_title_style') == "p") { ?>selected <?php } ?>value="p">&lt;p&gt;</option>
<option <?php if(get_option('ph_social_counter_'.$choice.'_style_title_style') == "h1") { ?>selected <?php } ?>value="h1">&lt;h1&gt;</option>
<option <?php if(get_option('ph_social_counter_'.$choice.'_style_title_style') == "h2") { ?>selected <?php } ?>value="h2">&lt;h2&gt;</option>
<option <?php if(get_option('ph_social_counter_'.$choice.'_style_title_style') == "h3") { ?>selected <?php } ?>value="h3">&lt;h3&gt;</option>
<option <?php if(get_option('ph_social_counter_'.$choice.'_style_title_style') == "h4") { ?>selected <?php } ?>value="h4">&lt;h4&gt;</option>
<option <?php if(get_option('ph_social_counter_'.$choice.'_style_title_style') == "h5") { ?>selected <?php } ?>value="h5">&lt;h5&gt;</option>
<option <?php if(get_option('ph_social_counter_'.$choice.'_style_title_style') == "h6") { ?>selected <?php } ?>value="h6">&lt;h6&gt;</option>
</select>
</div>

<?php

	
}

function ph_social_media_counters_apply( $content ) {
		global $post;
		$link = get_permalink();
		$title = rawurlencode( get_the_title() );	
		$queried_post_type = get_query_var('post_type');
		
		
		
		if($queried_post_type) {
		$post_types = get_post_types('','names'); 
			foreach ($post_types as $post_type ) {
				$post_type_option = "";
				if($post_type != "revision" && $post_type != "nav_menu_item") {
					$post_type_option = 'ph_social_counter_top_type_'.$post_type;
					if(get_option( $post_type_option )=="on" && $queried_post_type == $post_type) {
						$top_show = 1;	
					}
				}
			}
		} elseif(get_option('ph_social_counter_top_type_post')=="on" && is_single()) { 
			$top_show = 1; 
		} elseif(get_option('ph_social_counter_top_type_page')=="on" && is_page()) { 
			$top_show = 1; 
		} elseif(get_option('ph_social_counter_top_type_home')=="on" && is_front_page()) { 
			$top_show = 1;  
		} else {
			$top_show = 0;
		}
		
		if(1 == $top_show && get_option('ph_social_counter_top_enable') == "on") {
			$phsmc = ph_social_media_counters_display( 'top', $link, $title );
		}	

			$phsmc .= $content;

		if(get_option('ph_social_counter_bottom_type_post')=="on" && is_single()) { 
			$bottom_show = 1; 
		} elseif(get_option('ph_social_counter_bottom_type_page')=="on" && is_page()) { 
			$bottom_show = 1; 
		} elseif(get_option('ph_social_counter_bottom_type_home')=="on" && is_front_page()) { 
			$bottom_show = 1;  
		} else {
			$bottom_show = 0;
		}
		
		if(1 == $bottom_show && get_option('ph_social_counter_bottom_enable') == "on") {
			$phsmc .= ph_social_media_counters_display( 'bottom', $link, $title );
		}
				
		$content = $phsmc;
				
return $content;
	
}

function ph_social_media_counters_excerpt_apply( $content ) {
		global $post;
		$link = get_permalink();
		$title = rawurlencode( get_the_title() );	
			
		if(get_option('ph_social_counter_excerpt_type_category')=="on" && is_category()) { 
			$excerpt_show = 1; 
		} elseif(get_option('ph_social_counter_excerpt_type_date')=="on" && is_date()) { 
			$excerpt_show = 1; 
		} elseif(get_option('ph_social_counter_excerpt_type_tag')=="on" && is_tag()) { 
			$excerpt_show = 1;   
		} elseif(get_option('ph_social_counter_excerpt_type_author')=="on" && is_author()) { 
			$excerpt_show = 1;  
		} elseif(get_option('ph_social_counter_excerpt_type_search')=="on" && is_search()) { 
			$excerpt_show = 1;  
		} elseif(get_option('ph_social_counter_excerpt_type_home')=="on" && is_front_page()) { 
			$excerpt_show = 1;  
		} elseif(get_option('ph_social_counter_excerpt_type_home')=="on" && is_home()) { 
			$excerpt_show = 1;  
		} else {
			$excerpt_show = 0;
		}
		
		if(1 == $excerpt_show && get_option('ph_social_counter_excerpt_enable') == "on") {
			$phsmc = ph_social_media_counters_display( 'excerpt', $link, $title );
		}	

			$phsmc .= $content;	
	
			$content = $phsmc;
	
return $content;

}

function ph_social_media_counters_display( $choice, $link, $title ) {
		$unencoded_link = $link;
		$encoded_link = rawurlencode( $link );
		
		if(get_option('ph_social_counter_'.$choice.'_enable') == "on") {
		
			$twitter_handle = get_option('ph_twitter_data_via');
			if($twitter_handle && $twitter_handle != "") { $data_via = ' data-via="'.$twitter_handle.'"';}
				
		$phsmc .= '<div id="ph_social_share_'.$choice.'" class="ph_social_share_box ph_social_share_box_'.$choice.'">';

		if(get_option('ph_social_counter_'.$choice.'_button') == "thin") {
			
		$ph_social_counter_style_title = get_option('ph_social_counter_'.$choice.'_style_title');
		$phscbsts = get_option('ph_social_counter_'.$choice.'_style_title_style');
		if($ph_social_counter_style_title != "") {
			$phsmc .= '<'.$phscbsts.'>'.$ph_social_counter_style_title.'</'.$phscbsts.'>';
		}
		
		// FACEBOOK SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_facebook') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_facebook">';
		$phsmc .= '<a name="fb_share" type="button_count" share_url="'.$encoded_link.'" href="http://www.facebook.com/sharer.php?u='.$encoded_link.'&t='.$title.'">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>';
 		$phsmc .= '</div>';
		}
 
		// TWITTER SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_twitter') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_twitter">';
		$phsmc .= '<a href="http://twitter.com/share" class="twitter-share-button" data-url="'.$unencoded_link.'" data-count="horizontal"'.$data_via.'>Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
  		$phsmc .= '</div>';
		}
		
		// LINKEDIN SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_linkedin') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_linkedin">';
		$phsmc .= '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="right" data-url="'.$encoded_link.'"></script>';
		$phsmc .= '</div>';
		}
		
		// DIGG SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_digg') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_digg">';
		$phsmc .= "<script type='text/javascript'>(function() { var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0]; s.type = 'text/javascript'; s.async = true; s.src = 'http://widgets.digg.com/buttons.js'; s1.parentNode.insertBefore(s, s1); })(); </script>";
		$phsmc .= '<a class="DiggThisButton DiggCompact" href="http://digg.com/submit?url='.$encoded_link.'&amp;title='.$title.'"></a>';
		$phsmc .= '</div>';
		}
		
		// STUMBLEUPON SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_stumble') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_stumble">';
		$phsmc .= '<script src="http://www.stumbleupon.com/hostedbadge.php?s=1&r='.$unencoded_link.'"></script>';
		$phsmc .= '</div>';
		}

		// GOOGLE BUZZ SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_buzz') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_buzz">';
		$phsmc .= '<a title="Post to Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="small-count" data-url="'.$encoded_link.'"></a><script src="http://www.google.com/buzz/api/button.js"></script>';
		$phsmc .= '</div>';
		}
		
		// PLUSONE SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_plusone') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_plusone">';
		$phsmc .= '<g:plusone size="medium" href="'.$encoded_link.'"></g:plusone>';
		$phsmc .= '</div>';
		$phsmc .= '<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>';
		}		

		
		// ADDTHIS SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_addthis') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_addthis">';
		$phsmc .= '<a class="addthis_counter addthis_pill_style" addthis:url="'.$encoded_link.'" addthis:title="'.$title.'"></a>';
		$phsmc .= '</div>';
		$phsmc .= '<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>';
		}
		
		$phsmc .= '<div class="clear"></div>';
		$phsmc .= '</div>';
		
		} else {
		$ph_social_counter_style_title = get_option('ph_social_counter_'.$choice.'_style_title');
		$phscbsts = get_option('ph_social_counter_'.$choice.'_style_title_style');
		if($ph_social_counter_style_title != "") {
			$phsmc .= '<'.$phscbsts.'>'.$ph_social_counter_style_title.'</'.$phscbsts.'>';
		}
		
		// FACEBOOK SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_facebook') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_facebook">';
		$phsmc .= '<a name="fb_share" type="box_count" share_url="'.$encoded_link.'" href="http://www.facebook.com/sharer.php?u='.$encoded_link.'&t='.$title.'">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>';
 		$phsmc .= '</div>';
		}
 
		// TWITTER SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_twitter') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_twitter">';
		$phsmc .= '<a href="http://twitter.com/share" class="twitter-share-button" data-url="'.$unencoded_link.'" data-count="vertical"'.$data_via.'>Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
		$phsmc .= '</div>';
		}
		
		// LINKEDIN SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_linkedin') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_linkedin">';
		$phsmc .= '<script src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="top" data-url="'.$encoded_link.'"></script>';
		$phsmc .= '</div>';
		}
		
		// DIGG SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_digg') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_digg">';
		$phsmc .= "<script type='text/javascript'>(function() { var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0]; s.type = 'text/javascript'; s.async = true; s.src = 'http://widgets.digg.com/buttons.js'; s1.parentNode.insertBefore(s, s1); })(); </script>";
		$phsmc .= '<a class="DiggThisButton DiggMedium" href="http://digg.com/submit?url='.$encoded_link.'&amp;title='.$title.'"></a>';
		$phsmc .= '</div>';
		}
		
		// STUMBLEUPON SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_stumble') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_stumble">';
		$phsmc .= '<script src="http://www.stumbleupon.com/hostedbadge.php?s=5&r='.$unencoded_link.'"></script>';
		$phsmc .= '</div>';
		}

		// GOOGLE BUZZ SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_buzz') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_buzz">';
		$phsmc .= '<a title="Post to Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post" data-button-style="normal-count" data-url="'.$encoded_link.'"></a><script src="http://www.google.com/buzz/api/button.js"></script>';
		$phsmc .= '</div>';
		}
		
		// PLUSONE SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_plusone') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_plusone">';
		$phsmc .= '<g:plusone size="tall" href="'.$encoded_link.'"></g:plusone>';
		$phsmc .= '</div>';
		$phsmc .= '<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>';
		}		

		// ADDTHIS SHARE
		if(get_option('ph_social_counter_'.$choice.'_service_addthis') == "on") {
		$phsmc .= '<div class="phsmc" id="phsmc_'.$choice.'_addthis">';
		$phsmc .= '<a class="addthis_counter" addthis:url="'.$encoded_link.'" addthis:title="'.$title.'"></a>';
		$phsmc .= '</div>';
		$phsmc .= '<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>';
		}
		
		$phsmc .= '<div class="clear"></div>';
		$phsmc .= '</div>';
		}
		
		return $phsmc;
		
		}
		

}

add_action('wp_print_styles', 'ph_social_counter_style');

function ph_social_counter_style() {
	$css_url = plugins_url('/style.css' , __FILE__);
	$css_file = plugins_url('/style.css' , __FILE__);
	// if ( file_exists($css_file) ) {
		wp_register_style('Social Media Counters CSS', $css_url);
		wp_enqueue_style('Social Media Counters CSS');
	// }
}

add_filter( 'the_content', 'ph_social_media_counters_apply' );
add_filter( 'the_excerpt', 'ph_social_media_counters_excerpt_apply' );




// Hello Helen.

?>
