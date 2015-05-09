<?php

// =============================================================================
// VIEWS/RENEW/CONTENT.PHP
// -----------------------------------------------------------------------------
// Standard post output for Renew.
// =============================================================================

?>

<article id="cliente-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-wrap">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="entry-featured">
                <?php
                    the_post_thumbnail("large");
                ?>
            </div>
        <?php endif; ?>
    </div>
</article>