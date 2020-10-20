<?php

function theme_enqueue_styles() {

    /**
    * Remove margin top for logged user follow
    * https://wordpress.stackexchange.com/questions/17643/why-is-wp-head-creating-a-top-margin-at-the-top-of-my-theme-header
    */
    remove_action('wp_head', '_admin_bar_bump_cb');

    $parenthandle = 'twentytwenty-style';

    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'gworks-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_custom_fonts() {
    ?>
    <style type="text/css">
        @font-face {
            font-family: 'Vinkel-Bold';
            src: url('<?php echo get_stylesheet_directory_uri(). '/assets/fonts/Vinkel-Bold.otf' ?>') format('opentype');
        }

        @font-face {
            font-family: 'Vinkel-Light';
            src: url('<?php echo get_stylesheet_directory_uri(). '/assets/fonts/Vinkel-Light.otf' ?>') format('opentype');
        }

        @font-face {
            font-family: 'Vinkel-Regular';
            src: url('<?php echo get_stylesheet_directory_uri(). '/assets/fonts/Vinkel-Regular.otf' ?>') format('opentype');
        }
    </style>
    <?php
    }
    add_action( 'wp_head', 'theme_custom_fonts' );