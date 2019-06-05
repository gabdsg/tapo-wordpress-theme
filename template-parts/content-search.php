<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TalkingPoints
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="post-item">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
			
				<?php talkingpoints_post_thumbnail(); ?>
				
				<div class="post-info">
					<?php the_title( '<h4>', '</h4>' ); ?>
					<?php talkingpoints_posted_on(); ?>
					<?php the_excerpt(); ?>
				</div>
			</a>
		</div>

</article><!-- #post-<?php the_ID(); ?> -->
