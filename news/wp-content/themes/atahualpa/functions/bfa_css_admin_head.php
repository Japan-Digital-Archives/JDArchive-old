<?php
// Add admin page CSS
function bfa_add_stuff_admin_head() {
	global $templateURI, $homeURL;
	
	if ( isset($_GET['page'])) {
		if ( $_GET['page'] == "functions.php" ) {

			// Create a WP nonce for the Ajax action later on
			$nonce = wp_create_nonce( 'reset_widget_areas' );
			$nonce2 = wp_create_nonce( 'delete_bfa_ata4' );

			echo '
			<script src="' . $templateURI . '/options/jscolor/jscolor.js" type="text/javascript"></script>
			<script src="' . $templateURI . '/js/ajaxupload.js" type="text/javascript"></script>
			<script type="text/javascript">
			/* <![CDATA[ */
			jQuery.noConflict();
			jQuery(document).ready(function(){   

			
			// Since 3.4.7.: Upload settings file	
			
				new AjaxUpload("#importSettings-upload", {
					action: "' . $homeURL . '/?bfa_ata_file=settings-upload",
					name: "userfile",
					onComplete: function(file, response){
						jQuery("div#atasettingsfile").html(response).fadeIn("fast").fadeOut(7000); 
						// Refresh admin pages to fill forms with new values
						window.location = window.location;
					}
				});
				
				/*since 3.4.3:*/
				jQuery("a#reset_widget_areas").bind("click", function() { 
					var delWidgetAreas = "";
					jQuery("input[type=\'checkbox\'][name=\'delete_widget_areas\']").each(function(){
					if(this.checked){
					delWidgetAreas += "&delete_areas[]=" + this.value;
					}
					});
					jQuery.ajax({
						type: "post", 
						url: "admin-ajax.php",
						data: "action=reset_bfa_ata_widget_areas" + delWidgetAreas + "&_ajax_nonce=' . $nonce . '",
						success: function(html){ 
							jQuery("#formstatus").html( html ).fadeIn("fast").fadeOut(3000); 
						}
					}); 
					// prevent form or link from being processed the traditional way:
					return false;
				});

				/*since 3.5.0:*/
				jQuery("a#delete_bfa_ata4").bind("click", function() { 
					jQuery.ajax({
						type: "post", 
						url: "admin-ajax.php",
						data: "action=bfa_delete_bfa_ata4&_ajax_nonce=' . $nonce2 . '",
						success: function(html){ 
							jQuery("#bfa_ata4_deleted").html( html ).fadeIn("fast").fadeOut(3000); 
							window.location = window.location;
						}
					}); 			
					// prevent form or link from being processed the traditional way:
					return false;
					
				});
			
				var textareawidth = jQuery(document).width() - 430; 		
				jQuery("div.mooarea, textarea.growing").css({width: textareawidth}); 
			});
			/* ]]> */	
			</script>	
			<style type="text/css">
				div.tabcontent { 
					height: auto; border: none; margin: 0; padding: 0; display:none; width: auto;
				} 
				.bfa-container { 
					width: auto 100%; border: solid 3px #C6D9E9; background-color: #E4F2FD; margin: 0 auto 7px auto; padding: 0;
					-moz-border-radius: 10px; -khtml-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;	
				} 
				.bfa-container div.infohighlight {
					background:#f3fafe; padding:15px; border: 2px solid #C6D9E9;
					-moz-border-radius: 10px; -khtml-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px;	
				}
				.bfa-container h3.infohighlight-header {
					color: #247aa8;
					margin: 30px 0 10px 0;
					font-family:georgia;
					font-weight:normal;
					font-size: 20px;
				}
				.bfa-container ul {
					list-style: circle url(' . $templateURI . '/options/images/list-arrow.gif) !important; 
					margin: 1em 1em 1em 2em;
				} 
				.bfa-container-left { 
					display: block; float: left; text-align: right; width: 35%; border-right: solid 1px #C6D9E9; 
					margin: 0; padding: 10px; 
				} 
				.bfa-container-right { 
					display: block; float: right; width: 58%; margin: 0; padding: 10px; 
				} 
				.bfa-container-full { 
					width: auto; margin: 0; padding: 10px; 
				} 
				.bfa-container h2 { 
					font-size: 1.5em; color: #666; margin:0; padding: 3px; border: none
				} 
				.bfa-container input { 
					text-align: right 
				} 
				.bfa-container label {
					font-size: 16px; font-weight: bold; color: #385f7e; display: block; margin-bottom: 5px;
				}
				.bfa-container-left label {
				margin-bottom: 0;
				}
				.bfa-container label.widget_area_label {
				font-size: 12px; color: black; display: inline; margin: 0 0 5px 5px;
				}
				.bfa-container input, 
				.bfa-container-left textarea, 
				.bfa-container-left select { 
					margin: 7px 0 4px 7px;
				} 
				ul#bfaoptiontabs {
					text-align: left;list-style-type: none; margin: 0 0 0 0; padding: 0; -moz-padding-start: 0;
				} 
				ul#bfaoptiontabs li {
					/*display: inline;*/ width: 190px; list-style-type: none; margin-bottom: 0; 
				} 
				ul#bfaoptiontabs li a:link, 
				ul#bfaoptiontabs li a:visited, 
				ul#bfaoptiontabs li a:active {
					display: -moz-inline-box; display: inline-block; white-space: nowrap; outline: 0; 
					text-decoration: none; position: relative; z-index: 1; padding: 2px 6px; margin-right: 0px; 
					margin-bottom: 3px; border: 2px solid #C6D9E9; font-size: 0.9em; color: #2582a9; background-color: #E4F2FD; 
					-moz-border-radius: 3px; -khtml-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; width: 170px;
				} 
				ul#bfaoptiontabs li a:hover {
					border: 2px solid #D54E21; background-color: #ffffff; color: #D54E21;
				} 
				ul#bfaoptiontabs li a.selected {
					border: 2px solid #883215; background-color: #D54E21; color: #ffffff !important; outline: 0;
				} 
				table.bfa-optiontable-layout {
					width: 100%; 
				} 
				table.bfa-optiontable {
					text-align: left; white-space: wrap; background-color: #f1f9fe; border-collapse: collapse; 
					border: solid 1px #c4e2fb;
				} 
				table.bfa-optiontable input {
					margin: 0 2px 0 2px; padding: 2px; text-align: left;
				} 
				table.bfa-optiontable input.color {
					text-align: right;
				} 
				table.bfa-optiontable thead tr td {
					line-height: 11px; 
				} 
				table.bfa-optiontable-layout td {
					vertical-align: top; 
				} 
				table.bfa-optiontable td {
					vertical-align:middle; padding: 1px 3px;
				} 
				table.bfa-optiontable thead td {
					text-align: center; background-color: #c4e2fb; font-weight: bold; padding: 5px; 
				}
				/* For widget area parameters table */ 
				td.bfa-td {
					vertical-align: top;
					padding: 15px 5px 5px 5px;
					border-top: dashed 1px black;
				}
				div.more_blog_title_font {
					display: none;
				} 
				div.more_show_header_image { 
					display: none;
				} 
				h4 {
					font-size: 18px; font-family: "Courier New", Courier, monospace; margin-bottom: 5px;
				} 
				code {
					background: #ffffff; padding-left: 5px; padding-right: 5px;
				} 
				i {
					color: red; font-style: normal; font-weight: bold;
				} 
				input.save-tab { 
					display: block; 
					margin: 15px auto 4px auto;
					border: 0 !important;
					padding: 0 !important;
					width: 565px; 
					height: 174px; 
					background: url(' . $templateURI . '/options/images/save-changes.gif) top left !important; 
				}
				input.save-tab:hover { 
					background: url(' . $templateURI . '/options/images/save-changes.gif) bottom left !important; 
				}
				input.reset-tab { 
					display: block; 
					margin: 25px auto 2px auto;
					border: 0 !important;
					padding: 0 !important;
					width: 250px; 
					height: 68px; 
					background: url(' . $templateURI . '/options/images/reset-settings.gif) top left !important; ; 
				} 
				input.reset-tab:hover { 
					background: url(' . $templateURI . '/options/images/reset-settings.gif) bottom left !important; ; 
				} 
				input.reset-all { 
					overflow: visible; /* for IE */
					letter-spacing: -1px;
					line-height: normal !important; font-size: 1.5em !important; padding: 5px 10px 5px 45px; 
					background: #777 url(' . $templateURI . '/options/images/reset-all-gray.png) no-repeat 5% 50% !important; 
					background-image: none; color: #ddd; text-align: center; font-weight: bold; border: solid 3px #555; 
				} 
				input.reset-all:hover { 
					border: solid 3px #ff9393; color: #fff;
					background: #800 url(' . $templateURI . '/options/images/reset-all.png) 5% 50% no-repeat !important;
				} 
				p.submit { 
					text-align: center; 
				} 
				.clearfix:after {
					content: "."; 
					display: block; 
					height: 0; 
					clear: both; 
					visibility: hidden;
				}				
				.clearfix {
					min-width: 0;		/* trigger hasLayout for IE7 */
					display: inline-block;
					/* \*/	display: block;	/* Hide from IE Mac */
				}				
				* html .clearfix {
					/* \*/  height: 1%;	/* Hide from IE Mac */ 
				}
			</style> 
			<script type="text/javascript"> 
				<!-- 
				function confirmPageReset() { 
					var agree=confirm("This will reset ALL the options on this page.\nAre you sure?"); 
					if (agree) return true ; 
					else return false ; 
				} 
				// --> 
			</script>
			<script type="text/javascript"> 
				<!-- 
				function confirmSubmit() { 
					var agree=confirm("Are you sure? This will reset ALL theme options."); 
					if (agree) return true ; 
					else return false ; 
				} 
				// --> 
			</script>';
			
			// add jquery to WP 2.3 and older
			if ( substr(get_bloginfo('version'), 0, 3) < 2.5 ) {
				echo '<script type="text/javascript" src="' . $templateURI . '/js/jquery-1.2.6.min.js"></script>';
			}
			echo '
			<script type="text/javascript" src="' . $templateURI . '/options/tabcontent/tabcontent.js">
				/***********************************************
				* Tab Content script v2.2- Copyright Dynamic Drive DHTML code library (www.dynamicdrive.com)
				* This notice MUST stay intact for legal use
				* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
				***********************************************/
			</script>
			<script src="' . $templateURI . '/options/mootools-for-textarea.js" type="text/javascript"></script>
			<script src="' . $templateURI . '/options/UvumiTextarea-compressed.js" type="text/javascript"></script>
			<link rel="stylesheet" href="' . $templateURI . '/options/uvumi-textarea.css" type="text/css" />
			<!--[if IE]>
			<link rel="stylesheet" href="' . $templateURI . '/options/uvumi-textarea-ie.css" type="text/css" />
			<![endif]--> 
			<script type="text/javascript">
				new UvumiTextarea({
					selector:\'textarea.growing\',
					maxChar:0
				});
			</script>
			';
		}
	}
}
?>