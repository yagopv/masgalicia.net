<?php get_header(); ?>

    <div class="<?php x_main_content_class(); ?>" role="main">
		<?php echo do_shortcode( get_field("code") ); ?>
	</div>
	
<?php get_footer(); ?>