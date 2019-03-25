<?php get_header(); ?>

<!--        single page              -->

<div class="container ">
    <div class="row">
        <div class="col-md-12 widget">
        <?php
            if(is_active_sidebar('s_p_header_advert')) :
                dynamic_sidebar('s_p_header_advert');
            endif; 
        ?>
        </div>
        <?php
            if(have_posts()):
                while(have_posts()):the_post()
        ?>
        <div class="padding">
            <h1 class="page-title hidden-xs"><?php the_title() ?></h1>
            <h1 class="visible-xs"><?php the_title(); ?> </h1>
            <p style="color: grey"><?php the_time('l, F j, Y g:i a') ?></p><br>
        </div>
            
            <div class="col-md-8 padding">
                <?php the_content(); ?>
                <div class="col-md-12 comment-section">
                    <hr/>
                    <h2>Join The Conversation</h2>
                    <?php comments_template(); ?>
                
                </div>
            </div>
        <?php
            endwhile;	
            else:
                echo '<p>No Content Found</p>';
            endif;
		?>
            <div class="col-md-4" >
                <!-- latest section -->
                <h2 style="margin-top: 0px">Trending</h2>
                <div class="col-md-12 widget">
                <?php
                    if(is_active_sidebar('most_comment')) :
                        dynamic_sidebar('most_comment');
                    endif; 
                ?>
                </div>
                <!-- end of most read section -->
            </div>
    </div>
</div>
    <!--        end of single page              -->

 <!-- latest rows        -->

<div class="container">
    <div class="row">
        <?php
                    if ( false === ( $singleLatest = get_transient( 'singleLatestPost' ) ) ) {
                        $currentID = get_the_ID();
                        $singleLatestPost = new WP_Query( array(
                            // 'cat'   => 3,
                            'orderby'    => 'meta_value_num', //orderby currently set
                            'order'      => 'DESC', //order currently set
                            'posts_per_page' => 6, // show 1 posts
                            'post__not_in' => array($currentID),
                                
                        ));

                        set_transient( 'singleLatestPost', $singleLatestPost, (60 * 60 * 6) );
                    }
                                
                    // singleLatestPosts = get_transient( 'singleLatestPost' );
                    $currentID = get_the_ID();
                    $singleLatestPosts  = new WP_Query( array(
                        // 'cat'   => 3,
						'orderby'    => 'meta_value_num', //orderby currently set
						'order'      => 'DESC', //order currently set
						'posts_per_page' => 8, // show 1 posts
						'post__not_in' => array($currentID),
							
                    ));
                    
                    if($singleLatestPosts->have_posts()):
                        while($singleLatestPosts->have_posts()):$singleLatestPosts->the_post();
                ?>
        <div class="col-md-3">
            <div class="latest-row" >
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('home-latest-post-thumbnail'); ?>
                    <p><?php the_title();?></p>
                </a>
            </div>
        </div>

            <?php 
                endwhile;
                                        
                else :
            ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php
                endif;
                wp_reset_postdata();
            ?>

        
    </div>
</div>

<?php get_footer(); ?>