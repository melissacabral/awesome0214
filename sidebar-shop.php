<aside id="sidebar">
	
	<?php //hide the button if on the shop archive
	if( ! is_post_type_archive( 'product' ) AND ! is_singular( 'product' ) ): ?>
	<section class="widget products-view-all">
		<a href="<?php echo get_post_type_archive_link( 'product' ); ?>" class="button">View All Products</a>
	</section>
<?php endif; ?>

	<section class="widget">
		<h3 class="widget-title">Filter by Brand:</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'brand',
				'title_li' => '',
			) ); ?>
		</ul>
	</section>

	<section class="widget">
		<h3 class="widget-title">Filter by Feature:</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'feature',
				'title_li' => '',
			) ); ?>
		</ul>
	</section>

</aside>