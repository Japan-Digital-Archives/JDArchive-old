<?php
if ( !class_exists('FacebookWidgetsOptions') ) {
	
	class FacebookWidgetsOptions
	{
		
		function __construct() {
			add_action('admin_menu', array(&$this, 'fbw_option_page' ) );
		}
		function fbw_option_page() {
				add_options_page('Facebook Widgets Options', 'Facebook Social Widgets', 8, __FILE__, array(&$this, 'fbw_options') );
		}
		
		
		
	//build admin interface
	function fbw_options() 
	{
		global $wpdb, $table_prefix;
			
			$new_options = array(
				'fb_api_key'				=> $_POST["fbw_api_key"],

			);
			
		if($_POST['action'] == "save") 
		{
			echo "<div class=\"updated fade\" id=\"updatenotice\"><p>" . __('Your Facebook Widget settings have been updated.', 'FacebookWidgets') . "</p></div>";
			update_option("fbw_options", $new_options);

		}
		
		if($_POST['action'] == "reset") 
		{ 
			echo "<div class=\"updated fade\" id=\"limitcatsupdatenotice\"><p>" . __('Your default settings have been <strong>updated</strong>. </p>', 'FacebookWidgets') . "</div>";
			delete_option("fbw_options", $new_options);
		}
		

		$options = get_option('fbw_options');
		
		?>

	<div class="wrap">
		<h2><?php _e('Facebook Social Widgets:', PLUG_LOCAL ); ?> <?php echo $this->version; ?></h2>
			<form method="post">
				
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row"><label for="fbw_api_key"><?php _e('FB Developer API Key','FacebookWidgets'); ?></label></th>
							<td>
								<input name="fbw_api_key" type="text" id="fbw_api_key" value="<?php echo $options['fbw_api_key'];?>" class="regular-text">
								<span class="description">In order to use certain Facebook Widgets, a unique API KEY is required. The key is assigned to every <strong>pro</strong> account and you can obtain it <a href="http://www.getresponse.com/my_api_key.html">here</a>.</span>
							</td>
						</tr>
					</tbody>
				
				</table>


		<p class="submit">
			<input type="hidden" name="action" value="save" />
			<input type="submit" value="<?php _e('Update Options', 'FacebookWidgets') ?>" />
		</p>
	</form>

	<div class="info">
		<div style="float: left; padding-top:4px;"><?php _e('Developed by Dan Cameron of', 'FacebookWidgets'); ?> <a href="http://sproutventure.com?wp-get-response" title="Custom WordPress Development"><?php _e('Sprout Venture', 'FacebookWidgets'); ?></a>. <?php _e('We provide custom WordPress development and more.', 'FacebookWidgets') ?>
		</div>
		<div style="float: right; margin:0; padding:0; " class="submit">
			<form method="post">
				<input name="reset" type="submit" value="<?php _e('Reset Button', 'FacebookWidgets') ?>" />
				<input type="hidden" name="action" value="reset" />
			</form>
		<div style="clear:both;"></div>
	</div>
	<div style="clear: both;"></div>

	<small><?php _e('Find a bug?', 'FacebookWidgets') ?> <a href="https://redmine.sproutventure.com/projects/wp-get-response/issues" target="blank"><?php _e('Post it as a new issue','FacebookWidgets')?></a>.</small>
</div>


		<?php
	}	//end fbw_option_page
}
}
?>