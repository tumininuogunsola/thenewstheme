<?php
	get_header();
?>
<div class="container">
    <div class="row">

        <div class="col-md-12 widget">
        <?php
            if(is_active_sidebar('s_p_header_advert')) :
                dynamic_sidebar('s_p_header_advert');
            endif; 
        ?>
        </div>

        <div class="col-md-8 content-text">
        <?php
            if(have_posts()):
        ?>
            <div style="margin-top:0px" class="archive-title">	
                <h2>
                    <?php
                        if(is_category())
                        {
                            single_cat_title();
                            the_archive_description( '<h4 class="taxonomy-description">', '</h4>' ); 
                        }
                        else
                        {
                            echo 'Archives';	
                        }

                    ?>
                </h2>
            </div>
            <!-- <div class="col-md-12">
                <div class="">
                    <a href="">
                        <img class="img-responsive" src="img/people-coffee-tea-meeting.jpg" alt="">
                        <div class="caption">
                            <h3 class="capt-title" style="color: black"> Okorocha’s daughter marries his
                                commissioner</h3>
                            <p class="capt-title" style="color: black"> Representatives of Venezuelan opposition leader
                                Juan Guaidó said Monday
                                they had seized three diplomatic properties in the U.S.
                                previously used by the government of President Nicolás Maduro, as the two men continue
                                their tug of...
                                commissioner</p>
                            <p style="color: gray">3 hours ago </p>
                        </div>
                    </a>
                </div>
            </div> -->
            
            <?php
                while(have_posts()):the_post();
            ?>

            <div class="col-md-6">
                <div class="cat-list">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('archive-post-thumbnail'); ?>
                        <div class="caption">
                            <h4 class="capt-title" style="color: black"><?php the_title(); ?></h4>
                            <p style="color: gray"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
                        </div>
                    </a>
                </div>
            </div>

            <?php endwhile; ?>
            <script type='text/javascript' >
                $(document).ready(function () {
                    $("div.cate:first-child").css( "background-color", "blue" )
                    });
                })
            </script>
			
            <div class="col-md-12" style="margin-bottom: 20px">
                <?php echo paginate_links(); ?>
            </div>

            <?php

                else:
                    echo '<div stylr="width:100%;"><h1>No Content Found</h1></div>';

            endif;
            ?>
        </div>












        <div class="col-md-4 ">
            <!-- latest section -->

            <h2>Latest</h2>
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
						'posts_per_page' => 6, // show 1 posts
						'post__not_in' => array($currentID),
							
                    ));
                    
                    if($singleLatestPosts->have_posts()):
                        while($singleLatestPosts->have_posts()):$singleLatestPosts->the_post();
                ?>
    
                    <div class="latest-list clearfix">
                        <div class="pull-left latest-thumbnail" style="width:30%">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                            </a>
                        </div>
                        <div class="pull-right" style="width:65%; margin-left:10px">
                            <a href="<?php the_permalink(); ?>">
                                <h4 style="padding: 0;  margin-top: 0"><?php the_title() ?></h4>
                                <p style="color: grey"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
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
    
            <!-- end of latest -->

            <!-- advert -->
            <div style="height: 300px">
                advert
            </div>
            <!-- advert -->

            <!-- most read section -->
            <h2>Most Read</h2>
            <?php
                    if ( false === ( $singleMostRead = get_transient( 'singleMostReadPost' ) ) ) {
                        $currentID = get_the_ID();
                        $singleMostReadPost = new WP_Query( array(
                            'cat'   => '6',
                            'meta_key'  => 'post_views_count', //meta key currently set
                            'orderby'    => 'meta_value_num', //orderby currently set
                            'order'      => 'DESC', //order currently set
                            'posts_per_page' => 6, // show 1 posts
                            'post__not_in' => array($currentID),
                                
                        ));
                        set_transient( 'singleMostReadPost', $singleMostReadPost, (60 * 60 * 6) );
                    }

					$currentID = get_the_ID();
					$date = strtotime ( '-2 day' ); // Date from two days ago
					$singleMostReadPosts  = new WP_Query( array(
                        'cat'   => '6',
						'meta_key'  => 'post_views_count', //meta key currently set
						'orderby'    => 'meta_value_num', //orderby currently set
						'order'      => 'DESC', //order currently set
						'posts_per_page' => 6, // show 1 posts
						'post__not_in' => array($currentID),
							
					));
                                
                    // singleMostReadPosts = get_transient( 'singleMostReadPost' );
                   
                    $currentID;
                    if($singleMostReadPosts->have_posts()):
                        while($singleMostReadPosts->have_posts()):$singleMostReadPosts->the_post();
                ?>
    
                    <div class="latest-list clearfix">
                        <div class="pull-left latest-thumbnail" style="width:30%">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                            </a>
                        </div>
                        <div class="pull-right" style="width:65%; margin-left:10px">
                            <a href="<?php the_permalink(); ?>">
                                <h4 style="padding: 0;  margin-top: 0"><?php the_title() ?></h4>
                                <p style="color: grey"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
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
           
            <!-- end of most read section -->
        </div>
    </div>
</div>


<?php
	get_footer();
?>