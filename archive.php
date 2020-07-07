<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TalkingPoints
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			<?php if ( have_posts() ) :

				get_template_part( 'template-parts/archive', get_post_type() );		

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
