<?php # error_reporting(-1);
list($bfa_ata, $cols, $left_col, $left_col2, $right_col, $right_col2, $bfa_ata['h_blogtitle'], $bfa_ata['h_posttitle']) = bfa_get_options();
get_header(); 
extract($bfa_ata); 

?>

<?php /* If there are any posts: */
if (have_posts()) : $bfa_ata['postcount'] = 0; /* Postcount needed for option "XX first posts full posts, rest excerpts" */ ?>

	<?php include 'bfa://content_above_loop'; ?>

	<?php while (have_posts()) : the_post(); $bfa_ata['postcount']++; ?>
	
		<?php include 'bfa://content_inside_loop'; ?>
						
	<?php endwhile; ?>

	<?php include 'bfa://content_below_loop'; ?>

<?php /* END of: If there are any posts */
else : /* If there are no posts: */ ?>

<?php include 'bfa://content_not_found'; ?>

<?php endif; /* END of: If there are no posts */ ?>

<?php # center_content_bottom does not exist
# if ( $bfa_ata['center_content_bottom'] != '' ) include 'bfa://center_content_bottom'; ?>

<?php get_footer(); ?>