<?php get_header(); ?>

<div class="container">
        <div class="row" style="padding:0 !important">
            <div class="col-md-12"  style="padding:0 !important">
                <div class="header-advert"> 
                <?php
                    if(is_active_sidebar('home_advert')) :
                        dynamic_sidebar('home_advert');
                    endif; 
                ?>
                </div>
                <!-- side headlines-->
                <div class="col-md-3 padding hidden-xs">

                <?php
                    // beginning of the headlines news list loop
                    if ( false === ( $headlines = get_transient( 'headlinesPost' ) ) ) {
                        $headlinesPosts = new WP_Query('cat=14&posts_per_page=2&offset=1');
                        set_transient( 'headlinesPost', $headlinesPost, (60 * 20) );
                    }
                    // $headlinesPosts = get_transient( 'headlinesPost' );
                    $headlinesPosts = new WP_Query('cat=14&posts_per_page=2&offset=1');
                    if($headlinesPosts->have_posts()):
                    while($headlinesPosts->have_posts()):$headlinesPosts->the_post();
                ?> 
                    <div class="side-headline">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('side-headline-post-thumbnail'); ?>
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <p class="desc"><?php the_title(); ?></p>
                        </a>
                    </div>
                <?php 
                    endwhile;
                    
                    else :
                ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php
                    endif;
                    wp_reset_postdata();
                        // main headlines post loops ends here
                ?>

                </div>

                <div class="col-md-6 center-headline"  style="padding:0 !important" >
                <?php
                    if ( false === ( $headline = get_transient( 'headlinesPos' ) ) ) {
                        $headlinesPos = new WP_Query('cat=14&posts_per_page=1');
                        set_transient( 'headlinesPos', $headlinesPos, (60 * 5) );
                    }      
                    // $headlinesPost = get_transient( 'headlinesPos' );
                    $headlinesPost = new WP_Query('cat=14&posts_per_page=1&orderby=date&order=DESC');
                    $currentID;
                    if($headlinesPost->have_posts()):
                    while($headlinesPost->have_posts()):$headlinesPost->the_post();
                    // echo($headlines_id);
                ?>

                <!-- main headlines-->
                
                    <div class="col-md-12 hidden-xs headline-thumbnail"  style="padding:0 !important">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>

                    <div class="col-md-12 visible-xs mobile-headline-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>

                    <div class=" col-md-12" >
                        <a href="<?php the_permalink(); ?>">
                            <h2 class="desc"><?php the_title(); ?> </h2>
                            <p class="desc"> <?php the_excerpt(); ?></p>
                        </a>
                    </div>
                <?php 
                    endwhile;
                    
                    else :
                ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php
                    endif;
                    wp_reset_postdata();
                        // main headlines post loops ends here
                ?>
                </div>

                 <!-- visible on mobile   -->
                <div class="col-md-3 visible-xs">
                    <?php
                        // beginning of the headlines news list loop
                        if ( false === ( $headlines = get_transient( 'headlinesPost' ) ) ) {
                            $headlinesPosts = new WP_Query('cat=14&posts_per_page=2&offset=1');
                            set_transient( 'headlinesPost', $headlinesPost, (60 * 20) );
                        }
                        // $headlinesPosts = get_transient( 'headlinesPost' );
                        $headlinesPosts = new WP_Query('cat=14&posts_per_page=2&offset=1');
                        if($headlinesPosts->have_posts()):
                        while($headlinesPosts->have_posts()):$headlinesPosts->the_post();
                    ?> 
                        <div class="side-headline">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('side-headline-post-thumbnail'); ?>
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <p class="desc"><?php the_title(); ?></p>
                            </a>
                        </div>
                    <?php 
                        endwhile;
                        
                        else :
                    ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php
                        endif;
                        wp_reset_postdata();
                            // main headlines post loops ends here
                    ?>
                </div>

                <!--  brief-->
                <div class="col-md-3 padding  brief">
                    <h1 style="margin-top: 0">Politics</h1>
                    <?php
                        if ( false === ( $politics = get_transient( 'politicsPost' ) ) ) {
                            $politicsPost = new WP_Query('cat=38&posts_per_page=6');
                            set_transient( 'politicsPost', $politicsPost, (60 * 60 * 6) );
                        }
                        
                        $politicsPosts = new WP_Query('cat=38&posts_per_page=6');
                        $currentID;
                        if($politicsPosts->have_posts()):
                        while($politicsPosts->have_posts()):$politicsPosts->the_post();
                    ?>
                        <div class="brief-title">
                            <a href="<?php the_permalink(); ?>">
                                <p ><?php the_title(); ?></p>
                            </a>
                        </div>
                        
                    <?php 
                        endwhile;
                        
                        else :
                    ?>      
                            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php
                        endif;
                        wp_reset_postdata();
                            // main headlines post loops ends here
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--        End of headline section       -->

    <!--        video section       -->

    <div class="video">
        <div class="container">
            <div class="row">
                <div class="col-md-12 video">
                    <h1 style="text-align: center; margin-top: -7px">Video</h1>
                    <div class="col-md-3">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#indept">Indept</a></li>
                            <li><a data-toggle="tab" href="#latest">Latest</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="indept" class="tab-pane fade in active">
                                <div class="clearfix" style="margin-bottom: 10px">
                                    <div class="pull-left" style="width: 48%">
                                        <iframe style="width: 100%; height: 100px"
                                            src="https://www.youtube.com/embed/KiiZLA15uGA" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    </div>
                                    <div class="pull-right" style="width: 48%">
                                        <p style="font-size:0.9em">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Aliquam eu lorem egestas,</p>
                                    </div>
                                </div>

                                <div class="clearfix" style="margin-bottom: 10px">
                                    <div class="pull-left" style="width: 48%">
                                        <iframe style="width: 100%; height: 100px"
                                            src="https://www.youtube.com/embed/QxFGRXLHBzw" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="pull-right" style="width: 48%">
                                        <p style="font-size:0.9em">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Aliquam eu lorem egestas,</p>
                                    </div>
                                </div>




                            </div>
                            <div id="latest" class="tab-pane fade">
                                <div class="clearfix" style="margin-bottom: 10px">
                                    <div class="pull-left" style="width: 48%">
                                        <iframe style="width: 100%; height: 100px"
                                            src="https://www.youtube.com/embed/KiiZLA15uGA" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    </div>
                                    <div class="pull-right" style="width: 48%">
                                        <p style="font-size:0.9em">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Aliquam eu lorem egestas,</p>
                                    </div>
                                </div>

                                <div class="clearfix" style="margin-bottom: 10px">
                                    <div class="pull-left" style="width: 48%">
                                        <iframe style="width: 100%; height: 100px"
                                            src="https://www.youtube.com/embed/QxFGRXLHBzw" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    </div>
                                    <div class="pull-right" style="width: 48%">
                                        <p style="font-size:0.9em">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Aliquam eu lorem egestas,</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--                    middle main video-->
                    <div class="col-md-6 ">
                        <iframe style="width: 100%; height: 400px" src="https://www.youtube.com/embed/-me7cg3vgWY"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <br>
                        <h2><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu lorem egestas</b>
                        </h2>
                    </div>
                    <div class="col-md-3 brief">
                        advert
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--        End of video section       -->

    <!-- latest -->

    <div class="container margin">
        <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <br><h1 style="padding-left: 15px">The Latest</h1><br>
        </div>
            <?php
            
                if ( false === ( $latest = get_transient( 'latestPost' ) ) ) {
                    $latestPost = new WP_Query('posts_per_page=15');
                    set_transient( 'latestPost', $latestPost, (60 * 5) );
                }           
                $latestPosts = get_transient( 'latestPost' );
                
                if($latestPosts->have_posts()):
                    while($latestPosts->have_posts()):$latestPosts->the_post();
            
            ?>
            
            <div class="col-md-8 col-md-offset-2 latest-parent hidden-xs" >
                <div class="col-md-4 latest-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('side-headline-post-thumbnail'); ?>
                    <a>   
                </div>
                <div class="col-md-8" style="height: 300px" >
                    <h5 style="margin-top: 0px;">
						<?php
							$categories = get_the_category();
							$seperator = ", ";
							$output = '';
							if($categories){
								foreach($categories as $category){
									$output .= '<a href="' .get_category_link($category->term_id) .'"; style="margin-top: 0px; color: red !important">'
											.strtoupper( $category->cat_name). 
											'</a>' . $seperator ;
								}
								echo trim($output, $seperator);
							}
							?>
					</h5>

                    <a href="<?php the_permalink(); ?>">
                        <h4 class="visible-xs" ><?php the_title(); ?></h4>
                        <h2 class="hidden-xs"><?php the_title(); ?></h2>
                    <a>
                
                    <p class="latest-date"> <?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2 latest-parent visible-xs" style="min-height:340px !important" >
                <div class="col-md-4 latest-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('side-headline-post-thumbnail'); ?>
                    <a>   
                </div>
                <div class="col-md-8" style="height: 300px" >
                    <h5 style="margin-top: 10pxpx;">
						<?php
							$categories = get_the_category();
							$seperator = ", ";
							$output = '';
							if($categories){
								foreach($categories as $category){
									$output .= '<a href="' .get_category_link($category->term_id) .'"; style="margin-top: 0px; color: red !important">'
											.strtoupper( $category->cat_name). 
											'</a>' . $seperator ;
								}
								echo trim($output, $seperator);
							}
							?>
					</h5>

                    <a href="<?php the_permalink(); ?>">
                        <h4 class="visible-xs" ><?php the_title(); ?></h4>
                        <h2 class="hidden-xs"><?php the_title(); ?></h2>
                    <a>
                
                    <p class="latest-date"> <?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
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
    <!-- end of latest -->

    <!-- Most recent section -->

    <div class="container white">
        <div class="row">
            <div class="col-md-12 ">

                <!-- magazine sub-section -->
                <div class="col-md-4">
                    <h1 style="text-align: center">Magazine</h1><br>
                <section id="carousel">

                    <div class="col-md-12">
                        <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
                        <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel"
                            data-interval="20000">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                                <li data-target="#fade-quote-carousel" data-slide-to="2"></li>

                            </ol>
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                             <!-- active carousel item -->
                            <?php
                                if ( false === ( $opinions = get_transient( 'opinionPost' ) ) ) {
                                    $opinionPost = new WP_Query('cat=93&posts_per_page=1');
                                    set_transient( 'opinionPost', $opinionPost, (60 * 60 * 6) );
                                }
                                
                                // $opinionPosts = get_transient( 'opinionPost' );
                                $opinionPosts = new WP_Query('cat=93&posts_per_page=1');
                                $currentID;
                                if($opinionPosts->have_posts()):
                                while($opinionPosts->have_posts()):$opinionPosts->the_post();
                            ?>
                                <div class=" active item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('magazine-thumbnail'); ?>    
                                </a>
                                    
                                    <!-- <div class="profile-circle" style="background-color: rgba(0,0,0,.2);">
                                            </div> -->
                                    <a href="<?php the_permalink(); ?>">
                                        <blockquote>
                                            <?php the_title() ?>
                                        </blockquote>
                                     </a>
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
                            <!-- end of active carousel -->

                            <!-- remaining carousel -->
                            <?php
                                if ( false === ( $opinions = get_transient( 'opinionPost' ) ) ) {
                                    $opinionPost = new WP_Query('cat=93&posts_per_page=2');
                                    set_transient( 'opinionPost', $opinionPost, (60 * 60 * 6) );
                                }
                                
                                // $opinionPosts = get_transient( 'opinionPost' );
                                $opinionPosts = new WP_Query('cat=93&posts_per_page=2&offset=1');
                                $currentID;
                                if($opinionPosts->have_posts()):
                                while($opinionPosts->have_posts()):$opinionPosts->the_post();
                            ?>

                                <div class="item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('magazine-thumbnail'); ?>    
                                    </a>
                                    <a href="<?php the_permalink(); ?>">
                                        <blockquote>
                                            <?php the_title() ?>
                                        </blockquote>
                                     </a>
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
                            <!-- end of remaining carousel -->
                            </div>
                        </div>
                    </div>

                    </section>
                </div>
                <!-- magazine sub-section -->

                <!--  feactures sub-section -->
                <div class="col-md-5 " style="text-align: center">
                    <h1>Features</h1><br>

                    <?php
                        if ( false === ( $features = get_transient( 'featurePost' ) ) ) {
                            $featurePost = new WP_Query('cat=8&posts_per_page=6');
                            set_transient( 'featurePost', $featurePost, (60 * 60 * 6) );
                        }
                                
                        // $featurePosts = get_transient( 'featurePost' );
                       $featurePosts  = new WP_Query('cat=8&posts_per_page=6');
                        $currentID;
                        if($featurePosts->have_posts()):
                            while($featurePosts->have_posts()):$featurePosts->the_post();
                    ?>

                    <div class="col-md-6 feature">
                        <h3 style="color: darkblue"><?php the_author() ?></h3>
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title() ?></p>
                        <a>
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
                <!--  end feactures sub-section -->

                <!--  most recent sub-section -->
                <div class="col-md-3">
                    <h1 style="text-align: center">Recents</h1><br>
                    <?php
                        if ( false === ( $recents = get_transient( 'recentPost' ) ) ) {
                            $recentPost = new WP_Query('cat=78&posts_per_page=6');
                            set_transient( 'recentPost', $recentPost, (60 * 60 * 6) );
                        }
                                
                        // $recentPosts = get_transient( 'recentPost' );
                       $recentPosts  = new WP_Query('cat=78&posts_per_page=6');
                        $currentID;
                        if($recentPosts->have_posts()):
                            while($recentPosts->have_posts()):$recentPosts->the_post();
                    ?>
                    <div class="recent">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title() ?></p>
                        <a>
                        <p class="time"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
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
                <!--  end most recent sub-section -->
            </div>
        </div>
    </div>

    <!-- End of most recent section -->

    <!--        Must read section       -->

    <div class="video">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br><h1 class="must-title">Opinion</h1><br><br>
                    <?php
                        if ( false === ( $mustReads = get_transient( 'mustReadPost' ) ) ) {
                            $mustReadPost = new WP_Query('cat=340&posts_per_page=3');
                            set_transient( 'mustReadPost', $mustReadPost, (60 * 60 * 6) );
                        }
                                
                        // $mustReadPosts = get_transient( 'mustReadPost' );
                       $mustReadPosts  = new WP_Query('cat=340&posts_per_page=3');
                        $currentID;
                        if($mustReadPosts->have_posts()):
                            while($mustReadPosts->have_posts()):$mustReadPosts->the_post();
                    ?>
                    <div class="col-md-4 must-read">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('must-read-post-thumbnail'); ?>    
                        </a>
                        <h4 class="desc"><?php the_title(); ?></h4>
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
        </div>
    </div><br><br>

    <!--        End of must read section       -->


    <!--    most popular    -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <h1 style="text-align: center">Business</h1><br>
                    <?php
                        if ( false === ( $mostPopulars = get_transient( 'mostPopularPost' ) ) ) {
                            $mostPopularPost = new WP_Query('cat=41&posts_per_page=6');
                            set_transient( 'mostPopularPost', $mostPopularPost, (60 * 60 * 6) );
                        }
                                
                        // $mostPopularPosts = get_transient( 'mostPopularPost' );
                       $mostPopularPosts  = new WP_Query('cat=41&posts_per_page=6');
                        $currentID;
                        if($mostPopularPosts->have_posts()):
                            while($mostPopularPosts->have_posts()):$mostPopularPosts->the_post();
                    ?>
                        <div class="recent">
                            <a href="<?php the_permalink(); ?>">
                                <p><?php the_title(); ?> </p>
                            </a>
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
                <div class="col-md-4">
                    <h1 style="text-align: center">Ranking</h1><br>

                    <?php
                        if ( false === ( $rankingOnes = get_transient( 'rankingOnePost' ) ) ) {
                            $rankingOnePost = new WP_Query('cat=21690&posts_per_page=1');
                            set_transient( 'rankingOnePost', $rankingOnePost, (60 * 60 * 6) );
                        }
                                
                        // $rankingOnePosts = get_transient( 'rankingOnePost' );
                       $rankingOnePosts  = new WP_Query('cat=21690&posts_per_page=1');
                        $currentID;
                        if($rankingOnePosts->have_posts()):
                            while($rankingOnePosts->have_posts()):$rankingOnePosts->the_post();
                    ?>

                        <div class="ranking">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('must-read-post-thumbnail'); ?>    
                            </a> 
                            <div class="ranking-list" style="border-bottom: 1px solid #ddd; height: 80px ">
                                <a href="<?php the_permalink(); ?>">
                                    <p><?php the_title(); ?> </p>
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
                    


                    <?php
                        if ( false === ( $rankings = get_transient( 'rankingPost' ) ) ) {
                            $rankingPost = new WP_Query('cat=21690&posts_per_page=3&offset=1');
                            set_transient( 'rankingPost', $rankingPost, (60 * 60 * 6) );
                        }
                                
                        // $rankingPosts = get_transient( 'rankingPost' );
                       $rankingPosts  = new WP_Query('cat=21690&posts_per_page=3&offset=1');
                        $currentID;
                        if($rankingPosts->have_posts()):
                            while($rankingPosts->have_posts()):$rankingPosts->the_post();
                    ?>

                    <div class="ranking-list" >
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?> </p>
                        </a>
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
                <div class="col-md-4">
                    <h1 style="text-align: center">Smart Living</h1><br>

                    <?php
                        if ( false === ( $smartOnes = get_transient( 'smartOnePost' ) ) ) {
                            $smartOnePost = new WP_Query('cat=259&posts_per_page=1');
                            set_transient( 'smartOnePost', $smartOnePost, (60 * 60 * 6) );
                        }
                                
                        // $smartOnePosts = get_transient( 'smartOnePost' );
                       $smartOnePosts  = new WP_Query('cat=259&posts_per_page=1');
                        $currentID;
                        if($smartOnePosts->have_posts()):
                            while($smartOnePosts->have_posts()):$smartOnePosts->the_post();
                    ?>

                        <div class="ranking">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('must-read-post-thumbnail'); ?>    
                            </a> 
                            <div class="ranking-list" style="border-bottom: 1px solid #ddd; height: 80px " >
                                <a href="<?php the_permalink(); ?>">
                                    <p><?php the_title(); ?> </p>
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
                    


                    <?php
                        if ( false === ( $smarts = get_transient( 'smartPost' ) ) ) {
                            $smartPost = new WP_Query('cat=259&posts_per_page=3&offset=1');
                            set_transient( 'smartPost', $smartPost, (60 * 60 * 6) );
                        }
                                
                        // $smartPosts = get_transient( 'smartPost' );
                       $smartPosts  = new WP_Query('cat=259&posts_per_page=3&offset=1');
                        $currentID;
                        if($smartPosts->have_posts()):
                            while($smartPosts->have_posts()):$smartPosts->the_post();
                    ?>

                    <div class="ranking-list">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?> </p>
                        </a>
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
        </div>
    </div>
    <br><br>
    <!--   end most popular    -->


    <!-- politics -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top:15px">
                <h1 style="padding: 15px">Politics </h1>
                <?php
                    if ( false === ( $politicsOnes = get_transient( 'politicsOnePost' ) ) ) {
                        $politicsOnePost = new WP_Query('cat=38&posts_per_page=1');
                        set_transient( 'politicsOnePost', $politicsOnePost, (60 * 60 * 6) );
                    }
                            
                    // $politicsOnePosts = get_transient( 'politicsOnePost' );
                    $politicsOnePosts  = new WP_Query('cat=38&posts_per_page=1');
                    $currentID;
                    if($politicsOnePosts->have_posts()):
                    while($politicsOnePosts->have_posts()):$politicsOnePosts->the_post();
                ?>
                <div class="col-md-6 politics">
                    <div class="desktop-politics hidden-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>

                    <div class="mobile-politics visible-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>
                   
                    <div class=" hidden-xs" style=" height: 50px " ><br>
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                    </div>
                    <div class="recent visible-xs" style="border-bottom: 1px solid #ddd; height: 85px " >
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?></p>
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
                
                <div class="col-md-3">
                    <?php
                        if ( false === ( $politics = get_transient( 'politicsPost' ) ) ) {
                            $politicsPost = new WP_Query('cat=38&posts_per_page=4&offset=1');
                            set_transient( 'politicsPost', $politicsPost, (60 * 60 * 6) );
                        }
                                
                        // $politicsPosts = get_transient( 'politicsPost' );
                       $politicsPosts  = new WP_Query('cat=38&posts_per_page=4&offset=1');
                        $currentID;
                        if($politicsPosts->have_posts()):
                            while($politicsPosts->have_posts()):$politicsPosts->the_post();
                    ?>

                    <div class="recent" style="height: 85px">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?> </p>
                        </a>
                    </div>
                    <?php 
                        endwhile;
                                        
                        else :
                    ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php
                        endif;
                        wp_reset_postdata();

                        $politics_id = get_cat_ID("politics" );

                        // Get the URL of this category
                        $politics_link = get_category_link( $politics_id );
                     ?>
                      <a style="color: red" href="<?php echo esc_url( $politics_link ); ?>">More...</a>
                </div>
                <div class="col-md-3 widget">
                    <?php
                        if(is_active_sidebar('politics_advert')) :
                            dynamic_sidebar('politics_advert');
                        endif; 
                    ?>
                </div>

            </div>
        </div>
    </div><br><br>
    <!-- end of politics -->

    <!-- world section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top:15px">
                <h1 style="padding: 15px">World News </h1>
                <?php
                    if ( false === ( $worldOnes = get_transient( 'worldOnePost' ) ) ) {
                        $worldOnePost = new WP_Query('cat=67&posts_per_page=1');
                        set_transient( 'worldOnePost', $worldOnePost, (60 * 60 * 6) );
                    }
                            
                    // $worldOnePosts = get_transient( 'worldOnePost' );
                    $worldOnePosts  = new WP_Query('cat=67&posts_per_page=1');
                    $currentID;
                    if($worldOnePosts->have_posts()):
                    while($worldOnePosts->have_posts()):$worldOnePosts->the_post();
                ?>
                <div class="col-md-6 politics">
                    <div class="desktop-politics hidden-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>

                    <div class="mobile-politics visible-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>
                   
                    <div class=" hidden-xs" style=" height: 50px " ><br>
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                    </div>
                    <div class="recent visible-xs" style="border-bottom: 1px solid #ddd; height: 85px " >
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?></p>
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
                
                <div class="col-md-3">
                    <?php
                        if ( false === ( $worldNews = get_transient( 'worldNewsPost' ) ) ) {
                            $worldNewsPost = new WP_Query('cat=67&posts_per_page=4&offset=1');
                            set_transient( 'worldNewsPost', $worldNewsPost, (60 * 60 * 6) );
                        }
                                
                        // $worldNewsPosts = get_transient( 'worldNewsPost' );
                       $worldNewsPosts  = new WP_Query('cat=67&posts_per_page=4&offset=1');
                        $currentID;
                        if($worldNewsPosts->have_posts()):
                            while($worldNewsPosts->have_posts()):$worldNewsPosts->the_post();
                    ?>

                    <div class="recent" style="height: 85px">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?> </p>
                        </a>
                    </div>
                    <?php 
                        endwhile;
                                        
                        else :
                    ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php
                        endif;
                        wp_reset_postdata();
                        $news_id = get_cat_ID("news" );

                        // Get the URL of this category
                        $news_link = get_category_link( $news_id );
                     ?>
                      <a style="color: red" href="<?php echo esc_url( $news_link ); ?>">More</a>
                </div>
                <div class="col-md-3 widget">
                <?php
                    if(is_active_sidebar('news_advert')) :
                        dynamic_sidebar('news_advert');
                    endif; 
                    ?>
                </div>

            </div>
        </div>
    </div><br><br>
    <!-- end of world section -->

    <!-- sport section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top:30px !important">
                <h1 style="padding: 15px">Sports</h1>
                <?php
                    if ( false === ( $sportOnes = get_transient( 'sportOnePost' ) ) ) {
                        $sportOnePost = new WP_Query('cat=91&posts_per_page=1');
                        set_transient( 'sportOnePost', $sportOnePost, (60 * 60 * 6) );
                    }
                            
                    // $sportOnePosts = get_transient( 'sportOnePost' );
                    $sportOnePosts  = new WP_Query('cat=91&posts_per_page=1');
                    $currentID;
                    if($sportOnePosts->have_posts()):
                    while($sportOnePosts->have_posts()):$sportOnePosts->the_post();
                ?>
                <div class="col-md-6 politics">
                    <div class="desktop-politics hidden-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>

                    <div class="mobile-politics visible-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>
                   
                    <div class=" hidden-xs" style=" min-height: 50px " ><br>
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                    </div>
                    <div class="recent visible-xs" style="border-bottom: 1px solid #ddd; height: 85px " >
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?></p>
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
                
                <div class="col-md-3">
                    <?php
                        if ( false === ( $sport = get_transient( 'sportPost' ) ) ) {
                            $sportPost = new WP_Query('cat=91&posts_per_page=4&offset=1');
                            set_transient( 'sportPost', $sportPost, (60 * 60 * 6) );
                        }
                                
                        // sporttPosts = get_transient( 'sportPost' );
                       $sportPosts  = new WP_Query('cat=91&posts_per_page=4&offset=1');
                        $currentID;
                        if($sportPosts->have_posts()):
                            while($sportPosts->have_posts()):$sportPosts->the_post();
                    ?>

                    <div class="recent" style="height: 85px">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?> </p>
                        </a>
                    </div>
                    <?php 
                        endwhile;
                                        
                        else :
                    ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php
                        endif;
                        $sports_id = get_cat_ID("sports" );

                        // Get the URL of this category
                        $sports_link = get_category_link( $sports_id );
                     ?>
                      <a style="color: red" href="<?php echo esc_url( $sports_link ); ?>">More...</a>
                </div>
                <div class="col-md-3 widget">
                <?php
                    if(is_active_sidebar('sports_advert')) :
                        dynamic_sidebar('sports_advert');
                    endif; 
                ?>
                </div>

            </div>
        </div>
    </div><br><br>
    <!-- end of sport section -->

    <!-- entertainment section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top:30px !important">
                <h1 style="padding: 15px">Entertainment </h1>
                <?php
                    if ( false === ( $entertainmentOnes = get_transient( 'entertainmentOnePost' ) ) ) {
                        $entertainmentOnePost = new WP_Query('cat=132&posts_per_page=1');
                        set_transient( 'entertainmentOnePost', $entertainmentOnePost, (60 * 60 * 6) );
                    }
                            
                    // $entertainmentOnePosts = get_transient( 'entertainmentOnePost' );
                    $entertainmentOnePosts  = new WP_Query('cat=132&posts_per_page=1');
                    $currentID;
                    if($entertainmentOnePosts->have_posts()):
                    while($entertainmentOnePosts->have_posts()):$entertainmentOnePosts->the_post();
                ?>
                <div class="col-md-6 politics">
                    <div class="desktop-politics hidden-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>

                    <div class="mobile-politics visible-xs">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('headline-post-thumbnail'); ?>
                        </a>
                    </div>
                   
                    <div class=" hidden-xs" style=" min-height: 80px " ><br>
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                    </div>
                    <div class="recent visible-xs" style="border-bottom: 1px solid #ddd; height: 85px " >
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?></p>
                        </a>
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
                
                <div class="col-md-3">
                    <?php
                        if ( false === ( $entertainment = get_transient( 'entertainmentPost' ) ) ) {
                            $entertainmentPost = new WP_Query('cat=132&posts_per_page=4&offset=1');
                            set_transient( 'entertainmentPost', $entertainmentPost, (60 * 60 * 6) );
                        }
                                
                        // $entertainmentPosts = get_transient( 'entertainmentPost' );
                       $entertainmentPosts  = new WP_Query('cat=132&posts_per_page=4&offset=1');
                        $currentID;
                        if($entertainmentPosts->have_posts()):
                            while($entertainmentPosts->have_posts()):$entertainmentPosts->the_post();
                    ?>

                    <div class="recent" style="height: 85px">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?> </p>
                        </a>
                    </div>
                    <?php 
                        endwhile;
                                        
                        else :
                    ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php
                        endif;
                        wp_reset_postdata();
                        $entertainment_id = get_cat_ID("entertainment" );

                        // Get the URL of this category
                        $entertainment_link = get_category_link( $entertainment_id );
                     ?>
                      <a style="color: red" href="<?php echo esc_url( $entertainment_link ); ?>">More...</a>
                </div>
                <div class="col-md-3 widget">
                <?php
                    if(is_active_sidebar('entertainment_advert')) :
                        dynamic_sidebar('entertainment_advert');
                    endif; 
                ?>
                </div>

            </div>
        </div>
    </div><br><br>
    <!-- end of entertainment section -->
    <?php get_footer(); ?>