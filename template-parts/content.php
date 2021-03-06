<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TalkingPoints
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<!-- SINGLE POST -->
	<?php if ( is_singular() ) : ?>
		
		<header class="entry-header">
			<div class="container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php talkingpoints_post_thumbnail(); ?>
			</div>
		</header>

		<div class="container">

			<div class="entry-content">
				<?php the_content(); ?>
			</div>			
		</div>
	

	<!-- POST IN LIST -->
	<?php else : ?>

		<div class="post-item">
			
			<a class="thumbnail-container" href="<?php echo esc_url( get_permalink() ); ?>">
				<div class="thumbnail">
					<?php talkingpoints_post_thumbnail(); ?>
				</div>
			</a>
			
			<div class="post-info">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php the_title( '<h4>', '</h4>' ); ?>
				</a>
				<?php talkingpoints_posted_on(); ?>
				<?php the_excerpt(); ?>
		
			</div>
	
		</div>

	<?php endif; ?>
	
	

	<!-- <footer class="entry-footer">
		<?php //talkingpoints_entry_footer(); ?>
	</footer> -->
</article><!-- #post-<?php the_ID(); ?> -->
