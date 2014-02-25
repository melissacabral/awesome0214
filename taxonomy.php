<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
	if( have_posts() ): ?>

	<h2 class="archive-title">Products filtered by: <?php single_cat_title(); ?></h2>

		<?php 
		while( have_posts() ): 
			the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			
			<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'thumb' ) ); ?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<div class="entry-content">
				<?php the_excerpt(); ?>

				<?php //the_meta(); //list of all custom fields ?>

				<?php 
				//show just the price
				$price = get_post_meta( $post->ID, 'price', true ); 

				if( $price ):
					echo '<span class="product-price">$';
					echo $price;
					echo '</span>';
				endif;?>

			</div>
	
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php //check to see if this is a singular or archive view
			if( is_singular() ):
				previous_post_link();
				next_post_link();
			else:
				//archive!
				//if pagenavi plugin is available, use it
				//otherwise, do default WP prev/next buttons
				if( function_exists('wp_pagenavi') ):
					wp_pagenavi();
				else:
					next_posts_link( '&larr; Older Posts' ); 
					previous_posts_link( 'Newer Posts &rarr;' );
				endif;
				
			endif; ?>
		</div>


	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('shop'); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>