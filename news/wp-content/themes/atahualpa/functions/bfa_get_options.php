<?php if (!function_exists('bfa_get_options')) {
	function bfa_get_options() {
		global $options, $bfa_ata;

		if (get_option('bfa_ata4') === FALSE) {

			// 268 Old ATA 3.X options:
			$bfa_ata3 = array(
			"start_here",
			"import_settings",
			"use_bfa_seo",
			"homepage_meta_description",
			"homepage_meta_keywords",
			"add_blogtitle",
			"title_separator_code",
			"archive_noindex",
			"cat_noindex",
			"tag_noindex",
			"h1_on_single_pages",
			"nofollow",
			"body_style",
			"link_color",
			"link_hover_color",
			"link_default_decoration",
			"link_hover_decoration",
			"link_weight",
			"layout_width",
			"layout_min_width",
			"layout_max_width",
			"layout_style",
			"layout_style_leftright_padding",
			"favicon_file",
			"configure_header",
			"logoarea_style",
			"logo",
			"logo_style",
			"blog_title_show",
			"blog_title_style",
			"blog_title_weight",
			"blog_title_color",
			"blog_title_color_hover",
			"blog_tagline_show",
			"blog_tagline_style",
			"show_search_box",
			"searchbox_style",
			"searchbox_text",
			"horbar1",
			"horbar2",
			"header_image_info",
			"header_image_javascript",
			"header_image_javascript_preload",
			"header_image_clickable",
			"headerimage_height",
			"headerimage_alignment",
			"header_opacity_left",
			"header_opacity_left_width",
			"header_opacity_left_color",
			"header_opacity_right",
			"header_opacity_right_width",
			"header_opacity_right_color",
			"overlay_blog_title",
			"overlay_blog_tagline",
			"overlay_box_style",
			"rss_settings_info"	,
			"rss_box_width",
			"show_posts_icon",
			"post_feed_link",
			"post_feed_link_title",
			"show_comments_icon",
			"comment_feed_link",
			"comment_feed_link_title",
			"show_email_icon",
			"email_subscribe_link",
			"email_subscribe_link_title",
			"feedburner_email_id",
			"feedburner_old_new",
			"animate_page_menu_bar",
			"home_page_menu_bar",
			"exclude_page_menu_bar",
			"levels_page_menu_bar",
			"sorting_page_menu_bar",
			"titles_page_menu_bar",
			"page_menu_1st_level_not_linked",
			"anchor_border_page_menu_bar",
			"page_menu_bar_background_color",
			"page_menu_bar_background_color_hover",
			"page_menu_bar_background_color_parent",
			"page_menu_font",
			"page_menu_bar_link_color",
			"page_menu_bar_link_color_hover",
			"page_menu_transform",
			"page_menu_arrows",
			"page_menu_submenu_width",
			"animate_cat_menu_bar",
			"home_cat_menu_bar",
			"exclude_cat_menu_bar",
			"levels_cat_menu_bar",
			"sorting_cat_menu_bar",
			"order_cat_menu_bar",
			"titles_cat_menu_bar",
			"add_descr_cat_menu_links",
			"default_cat_descr_text",
			"anchor_border_cat_menu_bar",
			"cat_menu_bar_background_color",
			"cat_menu_bar_background_color_hover",
			"cat_menu_bar_background_color_parent",
			"cat_menu_font",
			"cat_menu_bar_link_color",
			"cat_menu_bar_link_color_hover",
			"cat_menu_transform",
			"cat_menu_arrows",
			"cat_menu_submenu_width",
			"center_column_style",
			"content_above_loop",
			"content_inside_loop",
			"content_below_loop",
			"content_not_found",
			"next_prev_orientation",
			"home_multi_next_prev",
			"home_single_next_prev",
			"multi_next_prev_newer",
			"multi_next_prev_older",
			"single_next_prev_newer",
			"single_next_prev_older",
			"comments_next_prev_newer",
			"comments_next_prev_older",
			"location_comments_next_prev",
			"next_prev_style_comments_above",
			"next_prev_style_comments_below",
			"next_prev_comments_pagination",
			"location_multi_next_prev",
			"location_single_next_prev",
			"next_prev_style_top",
			"next_prev_style_middle",
			"next_prev_style_bottom",
			"leftcol_on",
			"left_col_pages_exclude",
			"left_col_cats_exclude",
			"leftcol2_on",
			"left_col2_pages_exclude",
			"left_col2_cats_exclude",
			"rightcol_on",
			"right_col_pages_exclude",
			"right_col_cats_exclude",
			"rightcol2_on",
			// legacy "ight_col2" besides "right_col2" due to typo in "bfa_theme_options.php" in ATA 3.4.6
			"ight_col2_pages_exclude",
			"right_col2_pages_exclude",
			//
			"right_col2_cats_exclude",
			"left_sidebar_width",
			"left_sidebar2_width",
			"right_sidebar_width",
			"right_sidebar2_width",
			"left_sidebar_style",
			"left_sidebar2_style",
			"right_sidebar_style",
			"right_sidebar2_style",
			"widget_container",
			"widget_title_box",
			"widget_title",
			"widget_content",
			"widget_lists",
			"widget_lists2",
			"widget_lists3",
			"category_widget_display_type",
			"select_font_size",
			"widget_areas_reset",
			"widget_areas_info",
			"post_kicker_home",
			"post_kicker_multi",
			"post_kicker_single",
			"post_kicker_page",
			"post_byline_home",
			"post_byline_multi",
			"post_byline_single",
			"post_byline_page",
			"post_footer_home",
			"post_footer_multi",
			"post_footer_single",
			"post_footer_page",
			"post_container_style",
			"post_container_sticky_style",
			"post_kicker_style",
			"post_kicker_style_links",
			"post_kicker_style_links_hover",
			"post_headline_style",
			"post_headline_style_text",
			"post_headline_style_links",
			"post_headline_style_links_hover",
			"post_byline_style",
			"post_byline_style_links",
			"post_byline_style_links_hover",
			"post_bodycopy_style",
			"post_footer_style",
			"post_footer_style_links",
			"post_footer_style_links_hover",
			"excerpt_length",
			"dont_strip_excerpts",
			"custom_read_more",
			"excerpts_home",
			"full_posts_homepage",
			"excerpts_category",
			"excerpts_archive",
			"excerpts_tag",
			"excerpts_search",
			"excerpts_author",
			"post_thumbnail_width",
			"post_thumbnail_height",
			"post_thumbnail_crop",
			"post_thumbnail_css",
			"more_tag",
			"author_highlight",
			"author_highlight_color",
			"author_highlight_border_color",
			"comment_background_color",
			"comment_alt_background_color",
			"comment_border",
			"comment_author_size",
			"comment_reply_link_text",
			"comment_edit_link_text",
			"comment_moderation_text",
			"comments_are_closed_text",
			"comments_on_pages",
			"separate_trackback",
			"avatar_size",
			"avatar_style",
			"show_xhtml_tags",
			"comment_form_style",
			"submit_button_style",
			"comment_display_order",
			"footer_style",
			"footer_style_links",
			"footer_style_links_hover",
			"footer_style_content",
			"sticky_layout_footer",
			"footer_show_queries",
			"table",
			"table_caption",
			"table_th",
			"table_td",
			"table_tfoot_td",
			"table_zebra_stripes",
			"table_zebra_td",
			"table_hover_rows",
			"table_hover_td",
			"form_input_field_style",
			"form_input_field_background",
			"highlight_forms",
			"highlight_forms_style",
			"button_style",
			"button_style_hover",
			"blockquote_style",
			"blockquote_style_2nd_level",
			"post_image_style",
			"post_image_caption_style",
			"image_caption_text",
			"html_inserts_header",
			"html_inserts_body_tag",
			"html_inserts_body_top",
			"html_inserts_body_bottom",
			"html_inserts_css",
			"archives_page_id",
			"archives_date_show",
			"archives_date_title",
			"archives_date_type",
			"archives_date_limit",
			"archives_date_count",
			"archives_category_show",
			"archives_category_title",
			"archives_category_count",
			"archives_category_depth",
			"archives_category_orderby",
			"archives_category_order",
			"archives_category_feed",
			"css_external",
			"javascript_external",
			"pngfix_selectors",
			"css_compress",
			"allow_debug");

			// If no old settings exit, use the new 'default' style
			$old_setting_exists = 'no';

			foreach ($bfa_ata3 as $old_option) {
				if (get_option( 'bfa_ata_' . $old_option ) !== FALSE )
					$old_setting_exists = 'yes';
			}
			
			
			// Separate option bfa_widget_areas
			if (get_option('bfa_widget_areas') !== FALSE) {
				$all_old_widget_areas = get_option('bfa_widget_areas');
				foreach ( $all_old_widget_areas as $old_widget_area) {
					if ( isset($old_widget_area) )
						$old_setting_exists = 'yes';
				}
			}
			// toArray: turn object into array for PHP < 5.1 - included JSON.php does not return array with ,TRUE
			if ( $old_setting_exists == 'yes' ) 
				$bfa_ata_default = toArray(json_decode(file_get_contents( TEMPLATEPATH . '/styles/ata-classic.txt' ), TRUE));
			else
				$bfa_ata_default = toArray(json_decode(file_get_contents( TEMPLATEPATH . '/styles/ata-classic.txt' ), TRUE));	
				
			foreach ($options as $value) { 
				if ($value['type'] != 'info') {
					if (get_option( 'bfa_ata_' . $value['id'] ) === FALSE) {	
						 $bfa_ata4[ $value['id'] ] = $bfa_ata_default[ $value['id'] ];
					} else {  
						$bfa_ata4[ $value['id'] ] = get_option( 'bfa_ata_' . $value['id'] );
					}
				}
			}

			
			/*
				foreach ($options as $value) {
					if ($value['type'] != 'info') {
							if ( $value['escape'] == "yes" ) {
								if( get_option( 'bfa_ata_' . $value['id'] ) === FALSE ) 
									$bfa_ata[ $value['id'] ] = stripslashes(bfa_escape($_REQUEST[ $value['id'] ]  )); 
								else 
									unset ($bfa_ata[ $value['id'] ]); 
							} elseif ($value['stripslashes'] == "no") { 
								if( get_option( 'bfa_ata_' . $value['id'] ) === FALSE ) 
									$bfa_ata[ $value['id'] ] = $_REQUEST[ $value['id'] ]  ; 
								else 
									unset ($bfa_ata[ $value['id'] ]);  
							} else { 
								if( get_option( 'bfa_ata_' . $value['id'] ) === FALSE ) 
									$bfa_ata[ $value['id'] ] = stripslashes($_REQUEST[ $value['id'] ]  ); 
								else 
									unset ($bfa_ata[ $value['id'] ]); 
							} 
					}
				} 
			*/		
					
			
			// Separate option bfa_widget_areas
			$bfa_ata4['bfa_widget_areas'] = get_option('bfa_widget_areas');
			
			update_option('bfa_ata4', $bfa_ata4);
		}

		$bfa_ata = get_option('bfa_ata4');

		if ( is_page() ) {
			global $wp_query;
			$current_page_id = $wp_query->get_queried_object_id();
			}


		//figure out sidebars and "colspan=XX", based on theme options and type or ID of page that we are currently on:

		$cols = 1;
		$left_col = '';
		$left_col2 = '';
		$right_col = '';
		$right_col2 = '';

		if ( is_page() AND (function_exists('is_front_page') ? !is_front_page() : '') AND !is_home() ) {


			if ($bfa_ata['left_col_pages_exclude'] != "") { 
				$pages_exlude_left = explode(",", str_replace(" ", "", $bfa_ata['left_col_pages_exclude']));
				if ( isset($bfa_ata['leftcol_on']['page']) AND !in_array($current_page_id, $pages_exlude_left) ) {
					$cols++; $left_col = "on";
				}
			} else {
				if ( isset($bfa_ata['leftcol_on']['page']) ) {
					$cols++; $left_col = "on";
				}
			}

			if ($bfa_ata['left_col2_pages_exclude'] != "") { 
				$pages_exlude_left2 = explode(",", str_replace(" ", "", $bfa_ata['left_col2_pages_exclude']));
				if ( isset($bfa_ata['leftcol2_on']['page']) AND !in_array($current_page_id, $pages_exlude_left2) ) {
					$cols++; $left_col2 = "on";
				}
			} else {
				if ( isset($bfa_ata['leftcol2_on']['page']) ) {
					$cols++; $left_col2 = "on";
				}
			}
				
			if ($bfa_ata['right_col_pages_exclude'] != "") { 
				$pages_exlude_right = explode(",", str_replace(" ", "", $bfa_ata['right_col_pages_exclude']));
				if ( isset($bfa_ata['rightcol_on']['page']) AND !in_array($current_page_id, $pages_exlude_right) ) {
					$cols++; $right_col = "on"; 
				}
			} else {
				if ( isset($bfa_ata['rightcol_on']['page']) ) {
					$cols++; $right_col = "on"; 
				}
			}

			if ($bfa_ata['right_col2_pages_exclude'] != "") { 
				$pages_exlude_right2 = explode(",", str_replace(" ", "", $bfa_ata['right_col2_pages_exclude']));
				if ( isset($bfa_ata['rightcol2_on']['page']) AND !in_array($current_page_id, $pages_exlude_right2) ) {
					$cols++; $right_col2 = "on"; 
				}
			} else {
				if ( isset($bfa_ata['rightcol2_on']['page']) ) {
					$cols++; $right_col2 = "on"; 
				}
			}
			
		} elseif ( is_category() ) {

			$current_cat_id = get_query_var('cat');

			if ($bfa_ata['left_col_cats_exclude'] != "") {
				$cats_exlude_left = explode(",", str_replace(" ", "", $bfa_ata['left_col_cats_exclude']));
				if ( isset($bfa_ata['leftcol_on']['category']) AND !in_array($current_cat_id, $cats_exlude_left) ) {
					$cols++; $left_col = "on"; 
				}
			} else {
				if ( isset($bfa_ata['leftcol_on']['category']) ) {
					$cols++; $left_col = "on"; 
				}
			}

			if ($bfa_ata['left_col2_cats_exclude'] != "") {
				$cats_exlude_left2 = explode(",", str_replace(" ", "", $bfa_ata['left_col2_cats_exclude']));
				if ( isset($bfa_ata['leftcol2_on']['category']) AND !in_array($current_cat_id, $cats_exlude_left2) ) {
					$cols++; $left_col2 = "on"; 
				}
			} else {
				if ( isset($bfa_ata['leftcol2_on']['category']) ) {
					$cols++; $left_col2 = "on"; 
				}
			}
				
			if ($bfa_ata['right_col_cats_exclude'] != "") {
				$cats_exlude_right = explode(",", str_replace(" ", "", $bfa_ata['right_col_cats_exclude']));
				if ( isset($bfa_ata['rightcol_on']['category']) AND !in_array($current_cat_id, $cats_exlude_right) ) {
					$cols++; $right_col = "on"; 
				}
			} else {
				if ( isset($bfa_ata['rightcol_on']['category']) ) {
					$cols++; $right_col = "on"; 
				}
			}

			if ($bfa_ata['right_col2_cats_exclude'] != "") {
				$cats_exlude_right2 = explode(",", str_replace(" ", "", $bfa_ata['right_col2_cats_exclude']));
				if ( isset($bfa_ata['rightcol2_on']['category']) AND !in_array($current_cat_id, $cats_exlude_right2) ) {
					$cols++; $right_col2 = "on"; 
				}
			} else {
				if ( isset($bfa_ata['rightcol2_on']['category']) ) {
					$cols++; $right_col2 = "on"; 
				}
			}
				
		} else {

			if ( (is_home() && isset($bfa_ata['leftcol_on']['homepage'])) OR 
			( function_exists('is_front_page') ? is_front_page() AND isset($bfa_ata['leftcol_on']['frontpage']) : '') OR 
			( is_single() && isset($bfa_ata['leftcol_on']['single'])) OR ( is_date() AND isset($bfa_ata['leftcol_on']['date'])) OR 
			( is_tag() && isset($bfa_ata['leftcol_on']['tag'])) OR ( is_archive() AND !( is_tag() OR is_author() OR is_date() OR is_category()) && isset($bfa_ata['leftcol_on']['taxonomy'])) 
			OR ( is_search() AND isset($bfa_ata['leftcol_on']['search'])) OR 
			( is_author() && isset($bfa_ata['leftcol_on']['author'])) OR ( is_404() AND isset($bfa_ata['leftcol_on']['404'])) OR 
			( is_attachment() && isset($bfa_ata['leftcol_on']['attachment'])) ) {
				$cols++; $left_col = "on"; 
			}

			if ( (is_home() && isset($bfa_ata['leftcol2_on']['homepage'])) OR 
			( function_exists('is_front_page') ? is_front_page() AND isset($bfa_ata['leftcol2_on']['frontpage']) : '') OR 
			( is_single() && isset($bfa_ata['leftcol2_on']['single'])) OR ( is_date() AND isset($bfa_ata['leftcol2_on']['date'])) OR 
			( is_tag() && isset($bfa_ata['leftcol2_on']['tag'])) OR ( is_archive() AND !( is_tag() OR is_author() OR is_date() OR is_category()) && isset($bfa_ata['leftcol2_on']['taxonomy'])) 
			OR ( is_search() AND isset($bfa_ata['leftcol2_on']['search'])) OR 
			( is_author() && isset($bfa_ata['leftcol2_on']['author'])) OR ( is_404() AND isset($bfa_ata['leftcol2_on']['404'])) OR 
			( is_attachment() && isset($bfa_ata['leftcol2_on']['attachment'])) ) {
				$cols++; $left_col2 = "on"; 
			}
				
			if ( (is_home() && isset($bfa_ata['rightcol_on']['homepage'])) OR 
			( function_exists('is_front_page') ? is_front_page() AND isset($bfa_ata['rightcol_on']['frontpage']) : '') OR 
			( is_single() && isset($bfa_ata['rightcol_on']['single'])) OR ( is_date() AND isset($bfa_ata['rightcol_on']['date'])) OR 
			( is_tag() && isset($bfa_ata['rightcol_on']['tag'])) OR ( is_archive() AND !( is_tag() OR is_author() OR is_date() OR is_category()) && isset($bfa_ata['rightcol_on']['taxonomy'])) 
			OR ( is_search() AND isset($bfa_ata['rightcol_on']['search'])) OR 
			( is_author() && isset($bfa_ata['rightcol_on']['author'])) OR ( is_404() AND isset($bfa_ata['rightcol_on']['404'])) OR 
			( is_attachment() && isset($bfa_ata['rightcol_on']['attachment'])) ) {
				$cols++; $right_col = "on"; 
			}

			if ( (is_home() && isset($bfa_ata['rightcol2_on']['homepage'])) OR 
			( function_exists('is_front_page') ? is_front_page() AND isset($bfa_ata['rightcol2_on']['frontpage']) : '') OR 
			( is_single() && isset($bfa_ata['rightcol2_on']['single'])) OR ( is_date() AND isset($bfa_ata['rightcol2_on']['date'])) OR 
			( is_tag() && isset($bfa_ata['rightcol2_on']['tag'])) OR ( is_archive() AND !( is_tag() OR is_author() OR is_date() OR is_category()) && isset($bfa_ata['rightcol2_on']['taxonomy'])) 
			OR ( is_search() AND isset($bfa_ata['rightcol2_on']['search'])) OR 
			( is_author() && isset($bfa_ata['rightcol2_on']['author'])) OR ( is_404() AND isset($bfa_ata['rightcol2_on']['404'])) OR 
			( is_attachment() && isset($bfa_ata['rightcol2_on']['attachment'])) ) {
				$cols++; $right_col2 = "on"; 
			}
				
		}


		// $bfa_ata['h1_on_single_pages'] turn the blogtitle to h2 and the post/page title to h1 on single post pages and static "page" pages

		if ( $bfa_ata['h1_on_single_pages'] == "Yes" AND ( is_single() OR is_page() ) ) {
			$bfa_ata['h_blogtitle'] = 2; $bfa_ata['h_posttitle'] = 1; 
		} else {
			$bfa_ata['h_blogtitle'] = 1; $bfa_ata['h_posttitle'] = 2; 
		}

		$result = array($bfa_ata, $cols, $left_col, $left_col2, $right_col, $right_col2, $bfa_ata['h_blogtitle'], $bfa_ata['h_posttitle']);

	return $result;
	}
}
?>