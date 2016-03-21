<?php

// =============================================================================
// VIEWS/RENEW/CONTENT.PHP
// -----------------------------------------------------------------------------
// Standard post output for Renew.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-wrap">
        <header class="entry-header">
            <h1 class="entry-title">
                <?php
                    $category = get_the_category();
                    echo $category[0]->cat_name;
                ?>
            </h1>
        </header>
        <span class="divider">__</span>
        <div class="post-header">
            <?php x_get_view( 'renew', '_content', 'post-header' ); ?>
        </div>
        <?php x_get_view( 'global', '_content' ); ?>
    </div>
</article>