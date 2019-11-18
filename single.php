<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TalkingPoints
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			
			?>


			<?php if (get_post_type() == 'post' && get_post_status() == 'publish'): ?>
				<div class="recent-posts">
					<div class="container">
						<h4 class="title">Recent Posts</h4>
						<div class="recent-posts-container row">
							<?php
								$catId = get_the_category()[0]->term_id;
								$args = array( 'numberposts' => 2, 'category' => $catId, 'post__not_in' => array( $post->ID ) );
								$recent_posts = wp_get_recent_posts($args);
								foreach( $recent_posts as $recent ): ?>
									<div class="recent-post-item col-lg-6">
										<a href="<?php echo get_permalink($recent["ID"]); ?>">
										
											<?php echo get_the_post_thumbnail($recent["ID"], "medium"); ?>
											
											<div class="post-info">
												<h4><?php echo $recent["post_title"]; ?></h4>		
												<p><?php echo $recent["post_excerpt"]; ?></p>
											</div>
										</a>
									</div>
								<?php endforeach;
								wp_reset_query();
							?>
						</div>
					</div>
				</div>

			<?php endif;?>
			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
