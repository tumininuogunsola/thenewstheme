<?php if(have_comments()) : ?>
<h4 id="comments"><?php comments_number('No Comments', 'One Comment','% Comments')?></h4>
<div>
	<?php wp_list_comments(); ?>
</div>

<?php endif; ?>

<?php
	$comments_args = array(
	// change the title of the send button
	'label_submit' => 'Post Comment',
	'title_reply' => 'Post a Comment',
	'Comment_notes_after' => '',
	);
	comment_form($comments_args);
?>