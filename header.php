<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TalkingPoints
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
	<script src="https://pawelgrzybek.com/siema/assets/siema.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clamp-js/0.7.0/clamp.min.js"></script>
	
	<script>
		window.OFID = "5ee95fc7ae2a9020215afdc1";
		(function(){
		var script = document.createElement('script');
		var url = 'https://cdn.outfunnel.com/c.js?v='+ new Date().toISOString().substring(0,10)
		script.setAttribute('src', url);
		document.getElementsByTagName('head')[0].appendChild(script);
		})();
	</script>
</head>

<body <?php body_class(); ?>>
<?php dynamic_sidebar( 'banner' ); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">

		<nav class="navbar  navbar-expand-lg navbar-light">

		<div class="container">
		
			<?php the_custom_logo(); ?>
		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php
				wp_nav_menu( array(
					'menu'           => 'main-menu',
					'theme_location' => 'main-menu',
					'menu_id'        => 'primary-menu',
					'depth'          => 3,
					'container'      => false,
					'menu_class'     => 'navbar-nav ml-auto',
					'fallback_cb'    => 'bs4navwalker::fallback',
					'walker'         => new bs4navwalker()
				) );
				?>
			</div>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
