<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TalkingPoints
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container footer-flex-container">
			<nav id="footer-navigation" class="footer-navigation">
				<?php
				wp_nav_menu( array(
					'menu'           => 'footer-menu',
					'theme_location' => 'footer-menu',
					'menu_id'        => 'footer-menu',
				) );
				?>
			</nav><!-- #footer-navigation -->
			<div class="footer-widget">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		</div>
		<div class="site-info">
			<div class="container">
				Copyrighted ©2015 TalklingPoints. All Rights Reserved. TalkingPoints is a 501c3 non-profit organization. · <a href="<?php echo wp_get_upload_dir()["baseurl"] ?>/pdfs/TalkingPoints-Terms-of-Service-08-15-17.pdf" target="_blank">Terms of Service</a> · <a href="<?php echo wp_get_upload_dir()["baseurl"] ?>/pdfs/TalkingPoints-Privacy-Policy-08-15-2017.pdf" target="_blank">Privacy Policy</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>