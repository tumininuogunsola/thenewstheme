<?php
	get_header();
?>
<div class="container">
    <div class="row">
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
                    elseif(is_tag())
                    {
                        sing_tag_title();
                        the_archive_description( '<h4 class="taxonomy-description">', '</h4>' );
                    }
                    elseif(is_author())
                    {
                        the_post();
                        echo  get_the_author(). "'s Archives: ";
                        rewind_posts();
                    }
                    elseif(is_day())
                    {
                        echo get_the_date(). " Archives: ";
                    }
                    elseif(is_month())
                    {
                        echo get_the_date('F Y'). " Archives: ";
                    }
                    elseif(is_year())
                    {
                        echo get_the_date('Y'). " Archives: ";
                    }
                    else
                    {
                        echo 'Archives';	
                    }

                ?>
                </h2>
            </div>
            
            <?php
                while(have_posts()):the_post();
            ?>

            <div class="col-md-6 cate">
                <div class="cat-list" style="height: 500px">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('archive-post-thumbnail'); ?>
                        <div class="caption">
                            <h4 class="capt-title" style="color: black; min-height: 50px;"><?php the_title(); ?></h4>
                            <p style="color: gray"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
                        </div>
                    </a>

                    <div class="search-cat" >
                        <h4>
                        <?php
                            $categories = get_the_category();
                            $seperator = ", ";
                            $output = '';
                            if($categories){
                                foreach($categories as $category){
                                    $output .= '<a href="' .get_category_link($category->term_id) .'" style="color: red">'
                                            .strtoupper( $category->cat_name). 
                                            '</a>' . $seperator ;
                                }
                                echo trim($output, $seperator);
                            }
                            ?>
                        </h4>
                    </div>
                </div>
                
            </div>

            <?php endwhile; ?>

            <div class="col-md-12" style="margin-bottom: 20px">
                <?php echo paginate_links(); ?>
            </div>

            <?php

                else:
                    echo '<div stylr="width:100%;"><h1>No Content Found</h1></div>';

            endif;
            ?>
        </div>













        <div class="col-md-4">
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