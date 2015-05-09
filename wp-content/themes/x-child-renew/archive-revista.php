<?php get_header(); ?>

    <div class="archive-custom-title">
        <p><?php echo get_option("revistastitle"); ?></p>
    </div>

    <div class="<?php x_main_content_class(); ?> container-fluid" role="main">        
        <div class="row">            
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="revista row">
                        <div class="revista-image col-md-6">
                            <?php the_post_thumbnail( 'large', array('class' => 'img-thumbnail')); ?> 
                        </div>
                        <div class="revista-content col-md-6">
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <a href="<?php echo  get_permalink(); ?>">+</a>                                                        
                        </div>                                                
                    </div>
                </article>                
            <?php endwhile; ?>
        <?php endif; ?>                               
        </div>                                                                                        
    </div>        
<?php get_footer(); ?>