<?php
/**
 * Nisehatakiti Factory theme functions.
 */

if (!defined('ABSPATH')) exit;

function nisehatakiti_factory_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('woocommerce');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nisehatakiti-factory'),
        'footer'  => __('Footer Menu', 'nisehatakiti-factory'),
    ));
}
add_action('after_setup_theme', 'nisehatakiti_factory_setup');

function nisehatakiti_factory_assets(): void {
    wp_enqueue_style('nisehatakiti-factory', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // The factory artwork is intentionally a real image layer. SVG is only the fallback
    // until a generated factory image is uploaded in Appearance > Customize.
    $fallback = get_template_directory_uri() . '/assets/factory-manga.svg';
    $desktop  = get_theme_mod('nk_factory_background_image', $fallback);
    $mobile   = get_theme_mod('nk_factory_background_mobile_image', $desktop);

    $desktop = esc_url_raw($desktop ?: $fallback);
    $mobile  = esc_url_raw($mobile ?: $desktop);

    $css = ':root{--nk-factory-art:url("' . esc_url($desktop) . '");--nk-factory-art-mobile:url("' . esc_url($mobile) . '");}';
    wp_add_inline_style('nisehatakiti-factory', $css);
}
add_action('wp_enqueue_scripts', 'nisehatakiti_factory_assets');

function nisehatakiti_factory_customize_register($wp_customize): void {
    $wp_customize->add_section('nk_factory_art', array(
        'title'       => __('Factory Background', 'nisehatakiti-factory'),
        'priority'    => 30,
        'description' => __('Upload the generated factory artwork used behind the HTML interface.', 'nisehatakiti-factory'),
    ));

    $wp_customize->add_setting('nk_factory_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'nk_factory_background_image',
        array(
            'label'       => __('Desktop factory artwork', 'nisehatakiti-factory'),
            'description' => __('Recommended: portrait image, at least 1600×2400px. This is the actual page background.', 'nisehatakiti-factory'),
            'section'     => 'nk_factory_art',
            'settings'    => 'nk_factory_background_image',
        )
    ));

    $wp_customize->add_setting('nk_factory_background_mobile_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'nk_factory_background_mobile_image',
        array(
            'label'       => __('Mobile factory artwork', 'nisehatakiti-factory'),
            'description' => __('Optional. If empty, the desktop artwork is reused.', 'nisehatakiti-factory'),
            'section'     => 'nk_factory_art',
            'settings'    => 'nk_factory_background_mobile_image',
        )
    ));
}
add_action('customize_register', 'nisehatakiti_factory_customize_register');

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