<?php
/**
 * Nisehatakiti Factory theme functions.
 */

if (!defined('ABSPATH')) {
    exit;
}

function nisehatakiti_factory_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('woocommerce');

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'nisehatakiti-factory'),
            'footer'  => __('Footer Menu', 'nisehatakiti-factory'),
        )
    );
}
add_action('after_setup_theme', 'nisehatakiti_factory_setup');

function nisehatakiti_factory_assets(): void {
    wp_enqueue_style(
        'nisehatakiti-factory',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'nisehatakiti_factory_assets');

function nisehatakiti_factory_fallback_menu(): void {
    echo '<ul class="nk-nav" aria-label="Primary">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="#products">Products</a></li>';
    echo '<li><a href="#categories">Categories</a></li>';
    echo '<li><a href="#about">About</a></li>';
    echo '</ul>';
}

function nisehatakiti_factory_excerpt(): string {
    return wp_trim_words(get_the_excerpt(), 24, '…');
}
