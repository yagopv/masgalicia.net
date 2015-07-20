<?php

// =============================================================================
// VIEWS/GLOBAL/_INDEX.PHP
// -----------------------------------------------------------------------------
// Includes the index output.
// =============================================================================

$stack = x_get_stack();

if ( is_home() ) :
    $style     = x_get_option( 'x_blog_style', 'standard' );
    $cols      = x_get_option( 'x_blog_masonry_columns', '2' );
    $condition = is_home() && $style == 'masonry';
elseif ( is_archive() ) :
    $style     = x_get_option( 'x_archive_style', 'standard' );
    $cols      = x_get_option( 'x_archive_masonry_columns', '2' );
    $condition = is_archive() && $style == 'masonry';
elseif ( is_search() ) :
    $condition = false;
endif;

?>
        
<?php if ( is_archive() ) : $category = get_the_category(); ?>
    <div id="category-info">
        <h4 id="category-name"><?php echo $category[0]->cat_name; ?></h4>
        <div id="category-description">
            <?php echo category_description(); ?>
        </div>
    </div>
<?php endif; ?>

<?php if ( $condition ) : ?>

    <?php x_get_view( 'global', '_script', 'isotope-index' ); ?>

    <div id="x-iso-container" class="x-iso-container x-iso-container-posts cols-<?php echo $cols; ?>">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <!-- Show only main categories -->
                <?php if ((is_category()) && in_category($wp_query->get_queried_object_id())) { ?>
                    <?php if ( $stack != 'ethos' ) : ?>
                        <?php x_get_view( $stack, 'content', get_post_format() ); ?>
                    <?php else : ?>
                        <?php x_ethos_entry_cover( 'main-content' ); ?>
                    <?php endif; ?>
                <?php } ?>
                
                 <?php if (is_home()) { ?>
                    <?php $category = get_the_category(); ?>
                    <?php $showInFront = get_field("show-in-front"); ?>
                    <?php if (($category[0]->category_parent == '0') && ($showInFront)) { ?>
                        <?php if ( $stack != 'ethos' ) : ?>
                            <?php x_get_view( $stack, 'content', get_post_format() ); ?>
                        <?php else : ?>
                            <?php x_ethos_entry_cover( 'main-content' ); ?>
                        <?php endif; ?>
                    <?php } ?>    
                <?php } ?>               
            <?php endwhile; ?>
        <?php else : ?>
            <?php x_get_view( 'global', '_content-none' ); ?>
        <?php endif; ?>

    </div>

<?php else : ?>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php x_get_view( $stack, 'content', get_post_format() ); ?>
        <?php endwhile; ?>
    <?php else : ?>
        <?php x_get_view( 'global', '_content-none' ); ?>
    <?php endif; ?>

<?php endif; ?>

