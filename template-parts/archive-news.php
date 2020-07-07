
<article class="news-archive">

	<div class="container">

		<h1 class="title">What people are saying about TalkingPoints</h1>



		<?php 
		$taxonomy = 'year';


		// Query your specified taxonomy to get, in order, each category
		$categories = get_terms($taxonomy, array (
			'orderby' => $taxonomy,
			'order' => 'DESC'));


		foreach( $categories as $category ):?>

			<div id="content">    
				<h2 class="news-year-title">
					<?php echo $category->name; ?>
				</h2>

				<div id='archive-content' class="row news-archive-list">

					<?php

					$args = array(
						'post_type' => get_post_type(),
						'tax_query' => array(
								array(
									'taxonomy' => $taxonomy,
									'field' => 'slug',
									'terms' => $category->slug
								)
							) ,
						'meta_key' 	=> 'date',
						'orderby' 	=> 'meta_value',
						'order'		=> 'DESC',
						'meta_type' => 'DATE'
						);

					$query = new WP_Query( $args );

					while( $query->have_posts() ): $query->the_post();

						$news_url = esc_url(get_post_meta( get_the_ID(), 'url', true ));
						// Check if the custom field has a value.
						if ( empty( $news_url ) ) {
							$news_url = esc_url( get_permalink() );
						}
						?>


						<div class="col-md-6 col-lg-4">
							<a id="post-<?php the_ID(); ?>" class="archive-news-list-item" href="<?php echo $news_url;?>" target="_blank">
								<div class="post-info">
									<?php if (has_post_thumbnail()){ the_post_thumbnail(); } ?>
									<h4 class="entry-title"><?php the_title(); ?></h4>
									<?php 
										$news_date = get_post_meta( get_the_ID(), 'date', true );
										// Check if the custom field has a value.
										if ( ! empty( $news_date ) ) {
											echo "<p><b>". date('F dS, Y', strtotime($news_date)) . "</b></p>";
										}
									?>
									
									<?php the_excerpt(); ?>
								</div>
								

							</a><!-- #post -->
						</div>
						
						<?php
					endwhile; 
					wp_reset_postdata();
					?>
				</div> <!-- archive-content -->

			</div> <!-- #content -->

		<?php 

		endforeach;

		?> 
	</div>
</article>