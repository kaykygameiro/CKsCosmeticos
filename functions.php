<?php
function cks_scripts() {
    // Enfileira o CSS real
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css');

    // Enfileira o JS
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'cks_scripts');

function registrar_menu_principal() {
  register_nav_menu('menu-principal', 'Menu Principal');
}
add_action('after_setup_theme', 'registrar_menu_principal');
