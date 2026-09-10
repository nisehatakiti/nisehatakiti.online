<?php
/** Nisehatakiti Factory header. */
if (!defined('ABSPATH')) exit;
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="nk-header">
    <div class="nk-container nk-header-inner">
        <a class="nk-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Nisehatakiti home">
            Nisehatakiti<span class="nk-brand-arrow">↩</span>
            <small>WordPress Factory</small>
        </a>
        <nav aria-label="Primary navigation">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'nk-nav',
                    'fallback_cb' => 'nisehatakiti_factory_fallback_menu',
                ));
            } else {
                nisehatakiti_factory_fallback_menu();
            }
            ?>
        </nav>
    </div>
</header>
