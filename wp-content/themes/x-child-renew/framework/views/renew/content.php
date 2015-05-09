<?php

// =============================================================================
// VIEWS/RENEW/CONTENT.PHP
// -----------------------------------------------------------------------------
// Standard post output for Renew.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">    
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="entry-featured">
        <?php
            the_post_thumbnail("large");
            if (class_exists('MultiPostThumbnails')) :
                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL,  'secondary-featured-thumbnail');
            endif;           
        ?>
      </div>
    <?php endif; ?>
    <?php x_get_view( 'renew', '_content', 'post-header' ); ?>
  </div>
</article>