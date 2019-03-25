<?php

if(get_option('thread_comments'))
{
	wp_enqueue_script('comment-reply');
}
//add css
function golden_resources()
{
	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'golden_resources');


// Theme setup
function golden_setup()
{
	// add feature image
    add_theme_support('post-thumbnails');
    add_image_size('headline-post-thumbnail', 650, 340, true);
	add_image_size('side-headline-post-thumbnail', 200, 180, true);
	add_image_size('magazine-post-thumbnail', 200, 400, true);
    add_image_size('home-latest-post-thumbnail', 200, 200, true);
    add_image_size('must-read-post-thumbnail', 300, 250, true);
    add_image_size('side-latest-post-thumbnail', 120, 120, true);
	add_image_size('archive-post-thumbnail', 300, 300, true);

	
	
	// Navigation menus
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu')
	));
	
	
	//Add post format support
	add_theme_support('post-formats', array('aside', 'gallery','link','video'));
}

add_action('after_setup_theme','golden_setup');


// Get Top Ancestor for navigation that has children

function get_top_ancestor_id()
{
	global $post;
	if($post->post_parent)
	{
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}


// Does page has children
function has_children()
{
	global $post;
	$pages = get_pages('child_of='. $post->ID);
	return count($pages);
}

//Add our Widget Locations
function ourWidgetsInit()
{
	register_sidebar(array(
		'name' => 'Home Header Advert',
		'id' => 'home_advert'
	));
	register_sidebar(array(
		'name' => 'Politics Advert',
		'id' => 'politics_advert'
	));
	register_sidebar(array(
		'name' => 'News Advert',
		'id' => 'news_advert'
	));
	register_sidebar(array(
		'name' => 'Sports Advert',
		'id' => 'sports_advert'
	));
	register_sidebar(array(
		'name' => 'Entertainment Advert',
		'id' => 'entertainment_advert'
	));

	register_sidebar(array(
		'name' => 'Single Page header Advert',
		'id' => 's_p_header_advert'
	));

	register_sidebar(array(
		'name' => 'Entertainment Advert',
		'id' => 'entertainment_advert'
	));
	register_sidebar(array(
		'name' => 'Most Comment',
		'id' => 'most_comment'
	));
	
	// register_sidebar(array(
	// 	'name' => 'Sidebar',
	// 	'id' => 'sidebar1',
	// 	'before_widget' => '<div class="widget-item">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h4 class="my-special-class">',
	// 	'after_title' => '</h4>'
		
	// ));
	
	// register_sidebar(array(
	// 	'name' => 'Footer Area 1',
	// 	'id' => 'footer1',
	// 	'before_widget' => '<div class="widget-item footer">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h4 class="my-special-class">',
	// 	'after_title' => '</h4>'
	// ));
	
	// register_sidebar(array(
	// 	'name' => 'Footer Area 2',
	// 	'id' => 'footer2',
	// 	'before_widget' => '<div class="widget-item footer">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h4 class="my-special-class">',
	// 	'after_title' => '</h4>'
	// ));
	
	// register_sidebar(array(
	// 	'name' => 'Footer Area 3',
	// 	'id' => 'footer3',
	// 	'before_widget' => '<div class="widget-item footer">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h4 class="my-special-class">',
	// 	'after_title' => '</h4>'
	// ));
	
	// register_sidebar(array(
	// 	'name' => 'Footer Area 4',
	// 	'id' => 'footer4',
	// 	'before_widget' => '<div class="widget-item footer">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h4 class="my-special-class">',
	// 	'after_title' => '</h4>',
	// ));
	
}

add_action ('widgets_init', 'ourWidgetsInit');




//customized excerpt length
function custom_excerpt_length()
{
	return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

//comment

function the_comments($comment, $args, $depth)

{
	$GLOBALS['comment']=  $comment;
	?>

<li <?php comment_class(); ?> >
	<?php if($comment->comment_approved == '0') : ?>
		<div class="awaiting-moderation"></div>
	<?php else: ?>
	<div id="comment-<?php comment_ID(); ?>">
		<header class="comment-header">
			<?php echo get_avatar($comment, $size='48'); ?>
			<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link());?>
			<div class="comment-meta commentmetadata">
				on <?php comment_date(); ?> at <?php comment_time(); ?>
				 <span><?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
						</span>
				<?php edit_comment_link(__('(Edit)'), '  ', '') ?>
			</div>
		</header>

			<?php if($comment->comment_approved == '0') : ?>
				<div class="awaiting-moderation">Your comment is awaiting moderation.</div>
			<?php endif; ?>
		<?php comment_text(); ?>
		<div class="reply">

			<?php comment_reply_link(array('dept' => $depth, 'max_depth' => $args['max_depth'])) ?>
		</div>
	</div>
	<?php endif; ?>
<?php 

} 



/* end of the code*/ 
	
	

// Set post views count using post meta
 
function setPostViews($postID) {
    return; // added by pressable 10/25/18 do not remove
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Randomize most-comment post query alert
function wpse260713_randomize_posts( $sql_query, $query ) {
    $rand = (int) $query->get( '_randomize_posts_count' );
    if( $rand ) {
        $found_rows = '';
        if( stripos( $sql_query, 'SQL_CALC_FOUND_ROWS' ) !== FALSE ) {
            $found_rows = 'SQL_CALC_FOUND_ROWS';
            $sql_query = str_replace( 'SQL_CALC_FOUND_ROWS ', '', $sql_query );
        }
        $sql_query = sprintf( 'SELECT %s wp_posts.* from ( %s ) wp_posts ORDER BY rand() LIMIT %d', $found_rows, $sql_query, $rand );
    }
    return $sql_query;
}
