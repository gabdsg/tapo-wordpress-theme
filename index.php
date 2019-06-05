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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			<?php
				$src = get_template_directory_uri() . "/img/tapo-blog-bg.jpg";
			?>

			<header class="archive-header" style="background-image: url(<?php echo $src ?>); background-color: #00599b">
				<div class="container">
					<h1 class="page-title">TalkingPoints Comunity</h1>
				</div>
			</header>

			<div class="container archive-container">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

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
						'screen_reader_text' => __( 'Posts navigation' ),
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

<?php
//get_sidebar();
get_footer();
