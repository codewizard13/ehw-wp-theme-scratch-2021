<?php

// front-page.php

get_header(); ?>

    <!-- site-content -->
    <div class="site-content clearfix">
    
            <h3>Custom HTML Here!</h3>

            <?php if (have_posts()) :
                while (have_posts()) : the_post();
                
                the_content();
                
                endwhile;
                
                else:
                    echo '<p>No content found</p>';
                endif; ?>
        
        <!-- home-columns -->
        <div class="home-columns clearfix">
        
        
            <!-- one-half -->
            <div class="one-half">
                <h2>Latest Opinion</h2>

                <?php // args
                $args = array(
                    'query' => 'cat=43&posts_per_page=3'
                );
                get_template_part('content', 'latest', $args); ?>
                
                <span class="horiz-center"><a href="<?php echo get_category_link(43); ?>" class="btn-a">View all Opinion Posts</a></span>
            </div><!-- /one-half -->
        
            <!-- one-half -->
            <div class="one-half last">
                <h2>Latest News</h2>

                <?php // args
                $args = array(
                    'query' => 'cat=9&posts_per_page=3'
                );
                get_template_part('content', 'latest', $args); ?>
                
                <span class="horiz-center"><a href="<?php echo get_category_link(9); ?>" class="btn-a">View all News Posts</a></span>                
            </div><!-- /one-half -->
        
        
        </div><!-- /home-columns -->
        
        
    </div><!-- /site-content -->
    
    <?php get_footer();

?>