<?php

// =============================================================================
// VIEWS/RENEW/WP-INDEX.PHP
// -----------------------------------------------------------------------------
// Index page output for Renew.
// =============================================================================

?>

<?php get_header(); ?>

    <div class="archive-custom-title">
        <p><?php echo get_option("clientestitle"); ?></p>
    </div>

    <div class="archive-custom-description">
        <p><?php echo get_option("clientesmessage"); ?></p>
    </div>

    <div class="x-container-fluid max width offset cf">
        <div class="<?php x_main_content_class(); ?>" role="main">

            <?php x_get_view( 'global', '_index-clientes' ); ?>

        </div>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>