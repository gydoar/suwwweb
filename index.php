<?php get_header(); ?>

<?php if(of_get_option( 'example_text_mini' )) { ?>
	<h1><?php echo of_get_option( 'example_text_mini'); ?></h1>
<?php } ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>