<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
	if( have_posts() ): ?>
		<?php 
		while( have_posts() ): 
			the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'thumb' ) ); ?>

			<div class="entry-content">
				<?php 
				//if viewing a single post or page, show full content, otherwise show the excerpt (shortened content)
				if( is_single() OR is_page() ):
					the_content();
				else:
					the_excerpt();
				endif; ?>
			</div>
					
		</article><!-- end post -->

		<?php comments_template(); //show comments and comment form?>

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('page'); //include sidebar-page.php ?>
<?php get_footer(); //include footer.php ?>