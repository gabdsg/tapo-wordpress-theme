<?php
    // Get archive image
    $img = wpsfi_display_image(get_queried_object()->term_id, 'full');

    $xpath = new DOMXPath(@DOMDocument::loadHTML($img));
    $src = $xpath->evaluate("string(//img/@src)");
    
    if (strpos($src, "images/placeholder.png") !== false ){
        $src = "";
    }
?>

<header class="archive-header" style="background-image: url(<?php echo $src ?>); background-color: #00599b">
    <div class="container">
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
    </div>
</header>

<div class="container archive-container">
    <?php
    while ( have_posts() ) :
        the_post();

        /*
        * Include the Post-Type-specific template for the content.
        * If you want to override this in a child theme, then include a file
        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
        */
        get_template_part( 'template-parts/content', get_post_type() );

    endwhile; 
    ?>
</div>

<?php if (get_the_posts_navigation()): ?>
<div class="container page-navigation">
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

<?php endif; ?>