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
		<div class="container">
			<header class="entry-header">
                <br>
                <br>
                <?php if (has_post_thumbnail()){ the_post_thumbnail(); } ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">        
                <?php 
                    $news_date = get_post_meta( get_the_ID(), 'date', true );
                    // Check if the custom field has a value.
                    if ( ! empty( $news_date ) ) {
                        echo "<p><b>". date('F dS, Y', strtotime($news_date)) . "</b></p>";
                    }
                ?>
                
                <?php the_excerpt(); ?>

                <?php 
                    $news_url = esc_url(get_post_meta( get_the_ID(), 'url', true ));
                    // Check if the custom field has a value.
                    if ( ! empty( $news_url ) ) {
                    ?> <a href="<?php echo $news_url?>" target="_blank">Read the complete story</a> <br><br><br><?php
                    }
                ?>
			</div>			
		</div>
	
	<?php endif; ?>
	
	

	<!-- <footer class="entry-footer">
		<?php //talkingpoints_entry_footer(); ?>
	</footer> -->
</article><!-- #post-<?php the_ID(); ?> -->
