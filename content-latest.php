<?php

/*
Two types of 'latest' posts: news & opinion
- News = cat=9&posts_per_page=2
- Opinion = cat=43&posts_per_page=2
- $postType, $args
*/

// Determine type of posts to display
$query = $args['query'];

// opinion posts loop begins here
    $latestPosts = new WP_Query($query);
    
    if ($latestPosts->have_posts()) :
    
        while ($latestPosts->have_posts()) : $latestPosts->the_post(); ?>

        <article class="post post-latest">
            <!-- post-thumbnail -->
            <div class="post-thumbnail latest">
                <a href="<?php the_permalink(); ?>"><?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('latest-thumb'); 
                } else {
                    // display default thumb image ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg">
                <?php }; ?>
                </a>       
            </div><!-- /post-thumbnail -->
                
            <header>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> <span class="date"><?php the_time('F j, Y'); ?></span>
            </header>
            
            <?php the_excerpt(); ?>
        </article>
        <?php endwhile;
        
        else:
            // fallback no content msg
    
    endif;
    wp_reset_postdata(); // prevents custom loops from disrupting wp ?>