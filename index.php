<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TalkingPoints
 */

get_header();
?>


<?php
		$src = get_template_directory_uri() . "/img/blog-header.png";
	?>

	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<h1 class="title">TalkingPoints blog</h1>
					<p class="text">Learn how teachers are using TalkingPoints to connect with families outside the classroom, across language barriers, and much more. </p>
					<a href="#" class="btn btn-primary btn-rounded btn-uppercased">Contact us</a>
				</div>
				<div class="col-md-6 col-xs-12">
					<img class="img-fluid" src="<?php echo $src ?>" alt="News">
				</div>
			</div>
		</div>
	</div>

	<div id="primary" class="content-area bg-gray">
		<main id="main" class="site-main">


	

			<div class="container archive-container">

		<?php
		if ( have_posts() ) :


			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; ?>

			<div class="page-navigation">
				<?php
				$args = wp_parse_args(
					$args,
					array(
						'prev_text'          => __( '< Older posts' ),
						'next_text'          => __( 'Newer posts >' ),
						'screen_reader_text' => __( ' ' ),
					)
				);
				the_posts_navigation($args);
				?>
			</div>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<script>
	document.querySelectorAll(".post-info h4").forEach((e)=>{
		$clamp(e, {clamp: 2});
	});

	document.querySelectorAll(".post-info p").forEach((e)=>{
		$clamp(e, {clamp: 6});
	});
	
</script>

<?php
//get_sidebar();
get_footer();
?>


