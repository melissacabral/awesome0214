<aside id="sidebar"> 

	<?php 
	//display the blog sidebar registered in functions.php
	if( ! dynamic_sidebar( 'Page Sidebar' ) ): 

		//FALLBACK CONTENT in case widgets don't exist in the blog sidebar
		?>

		<section id="categories" class="widget">
			<h3 class="widget-title">Popular Categories </h3>
			<ul>
				<?php
				//show up to  10 most popular categories by number of posts
				wp_list_categories( array(
					'title_li' => '',
					'show_count' => 1,
					'orderby' => 'count',
					'order' => 'DESC',
					'number' => 10,
				) ); ?>           
			</ul>
		</section>
		<section id="archives" class="widget">
			<h3 class="widget-title"> Archives </h3>
			<ul>
				<?php wp_get_archives(array(
					'type' => 'yearly',
				)); ?>
			</ul>
		</section>
		<section id="tags" class="widget">
			<h3 class="widget-title"> Tags </h3>
			<div class="tag_cloud">
				<?php wp_tag_cloud( array(
							'smallest' => 11,
							'largest' => 18,
						)); ?>
			</div>
		</section>
		<section id="meta" class="widget">
			<h3 class="widget-title"> Meta </h3>
			<ul>
				<?php wp_register(); //show admin link if logged in, otherwise nothing. If registration is open, displays the register button ?>

				<li><?php wp_loginout(); //shows login or logout ?></li>
			
			<?php if( !is_user_logged_in() ): ?>
				<li><?php wp_login_form(); ?></li>
			<?php endif; ?>
			</ul>
		</section>

	<?php endif; //end of fallback sidebar content ?>
</aside><!-- end #sidebar -->