<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'google-prettify', get_stylesheet_directory_uri() . '/css/prettify.css');

	wp_enqueue_script( 'google-prettify', get_stylesheet_directory_uri() . '/js/prettify.js');
	wp_enqueue_script( 'twentypisin', get_stylesheet_directory_uri() . '/js/twentypisin.js',array('jquery', 'google-prettify'));

}

add_filter('infinite_scroll_credit', function(){return '';});

add_filter('language_attributes', function($default){
	global $post;
	if( has_category( 'italiano', $post ) ) {
		return "lang=\"it\"";
	}
	return $default;
});


add_action('wp_footer', function(){
    ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-26166520-2', 'auto');
        ga('send', 'pageview');

    </script>
<?php
});

add_filter('jss_cron_string', function(){
    return '*/2 * * * * *';
});

add_filter( 'publicize_checkbox_default', '__return_false' );
