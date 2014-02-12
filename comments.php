<?php 
//hide the comments if the post is password protected
if( post_password_required() ){
	return;  //stop the rest of this file from running
}


//separate the comments from the trackbacks and pingbacks so we can count them
$comments_by_type = separate_comments($comments);

//count the comments only
$comment_count = count($comments_by_type['comment']);

//count trackbacks and pingbacks
$pings_count = count($comments_by_type['pings']);

?>

<section id="comments" class="clearfix">
	<h3>
<?php echo $comment_count == 1 ? '1 comment so far' : $comment_count . ' comments so far. '; ?> 

	 | <a href="#respond">Leave a comment</a></h3>

	<div class="commentlist">
		<?php wp_list_comments( array(
			'style' => 'div',
			'type' => 'comment',
			'avatar_size' => 70,
			'callback' => 'awesome_comment', //defined in functions.php
		) ); ?>
	</div>

	<?php //show pagination only if needed
	if( get_comment_pages_count() > 1 AND get_option( 'page_comments' ) ): ?>
		<div class="pagination">
			<?php previous_comments_link(); ?>
			<?php next_comments_link(); ?>
		</div>
	<?php endif; //comment_pagination ?>

	<?php comment_form(); ?>
</section>

<section id="trackbacks">
	<h3><?php echo $pings_count; ?> Sites mention this post</h3>

	<ol>
		<?php wp_list_comments( array(
			'type' => 'pings', //both trackbacks and pingbacks
		) ); ?>
	</ol>

</section>