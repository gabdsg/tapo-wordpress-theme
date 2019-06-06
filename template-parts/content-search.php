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
			
			<a class="thumbnail-container" href="<?php echo esc_url( get_permalink() ); ?>">
				<div class="thumbnail <?php if (get_post_type() == 'news') { echo "small"; } ?>">
					<?php talkingpoints_post_thumbnail(); ?>
				</div>
			</a>
			
			<div class="post-info">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php the_title( '<h4>', '</h4>' ); ?>
				</a>
				<?php talkingpoints_posted_on(); ?>
				<?php the_excerpt(); ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more">
					Read more here
				</a>
			</div>
	
		</div>

</article><!-- #post-<?php the_ID(); ?> -->
