<article class="news-archive">

	<?php
		$src = get_template_directory_uri() . "/img/news-header.png";
	?>

	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<h1 class="title">News</h1>
					<p class="text">Read about TalkingPoints in the news. We don't like to toot our own horn, but love it when others do.</p>
				</div>
				<div class="col-md-6 col-xs-12">
					<img class="img-fluid" src="<?php echo $src ?>" alt="News">
				</div>
			</div>
		</div>
	</div>

	<div class="container m-t-100">

		<?php 
		$taxonomy = 'year';


		// Query your specified taxonomy to get, in order, each category
		$categories = get_terms($taxonomy, array (
			'orderby' => $taxonomy,
			'order' => 'DESC'));


		foreach( $categories as $category ):?>

			<?php if ($category->name == "Featured news"): ?>

				<div class="news-header">

						<h2><?php echo $category->name; ?></h2>

						<div class="actions">
							
						</div>

					</div>

				<div class="news-archive-list news-archive-list-grid">

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


							
								<a id="post-<?php the_ID(); ?>" class="archive-news-list-item" href="<?php echo $news_url;?>" target="_blank">
								
										<?php if (has_post_thumbnail()){ the_post_thumbnail(); } ?>

										<?php 
											$news_page = get_post_meta( get_the_ID(), 'page', true );
											$news_page_color = get_post_meta( get_the_ID(), 'color', true );
											
											if (empty($news_page_color)){
												$news_page_color = "#000";
											}
											
											if ( ! empty( $news_page ) ) {
												echo "<span class='page-name' style='color: ".$news_page_color.";'>". $news_page . "</span>";
											}
										?>

										
										<h4 class="entry-title"><?php the_title(); ?></h4>
										<?php 
											$news_date = get_post_meta( get_the_ID(), 'date', true );
											// Check if the custom field has a value.
											if ( ! empty( $news_date ) ) {
												echo "<span class='date'>". date('F dS, Y', strtotime($news_date)) . "</span>";
											}
										?>
										
										<?php the_excerpt(); ?>
								
									

								</a>
						
							
							<?php endwhile;?>
							<?php wp_reset_postdata();?>
					</div>

			<?php else: ?>
				
				<div class="news-<?php echo $category->slug; ?>">

					<div class="news-header">

						<h2><?php echo $category->name; ?> news</h2>

						<div class="actions">
							<button class="slider-button prev"><i class="fas fa-chevron-left"></i></button>
							<button class="slider-button next"><i class="fas fa-chevron-right"></i></button>
						</div>

					</div>

					<div class="siema news-archive-list">

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


								<a id="post-<?php the_ID(); ?>" class="archive-news-list-item" href="<?php echo $news_url;?>" target="_blank">
								

										<?php if (has_post_thumbnail()){ the_post_thumbnail(); } ?>
										<?php 
											$news_page = get_post_meta( get_the_ID(), 'page', true );
											$news_page_color = get_post_meta( get_the_ID(), 'color', true );
											
											if (empty($news_page_color)){
												$news_page_color = "#000";
											}
											
											if ( ! empty( $news_date ) ) {
												echo "<span class='page-name' style='color: ".$news_page_color.";'>". $news_page . "</span>";
											}
										?>

										<h4 class="entry-title"><?php the_title(); ?></h4>
										<?php 
											$news_date = get_post_meta( get_the_ID(), 'date', true );
											// Check if the custom field has a value.
											if ( ! empty( $news_date ) ) {
												echo "<span class='date'>". date('F dS, Y', strtotime($news_date)) . "</span>";
											}
										?>
										
										<?php the_excerpt(); ?>
							
									

								</a>
						
							
							<?php endwhile;?>
							<?php wp_reset_postdata();?>


							<script>
								const mySiema<?php echo $category->slug; ?> = new Siema({
									selector: '.news-<?php echo $category->slug; ?> .siema',
									perPage: {
										768 : 2,
										1024:3,
									},
								});

								const prev<?php echo $category->slug; ?> = document.querySelector('.news-<?php echo $category->slug; ?> .prev');
								const next<?php echo $category->slug; ?> = document.querySelector('.news-<?php echo $category->slug; ?> .next');

								prev<?php echo $category->slug; ?>.addEventListener('click', () => mySiema<?php echo $category->slug; ?>.prev());
								next<?php echo $category->slug; ?>.addEventListener('click', () => mySiema<?php echo $category->slug; ?>.next());
							</script>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach;?> 
	</div>
	
</article>

<script>
	document.querySelectorAll(".archive-news-list-item h4").forEach((e)=>{
		$clamp(e, {clamp: 3});
	});

	document.querySelectorAll(".archive-news-list-item p").forEach((e)=>{
		$clamp(e, {clamp: 2});
	});
	
</script>
