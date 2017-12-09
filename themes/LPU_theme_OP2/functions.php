<?php

// Nom du menu choisi dans l'admin wordpress
function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'), /*Nom du menu choisi dans l'admin wordpress*/
            'extra-menu' => __('Extra Menu')
        )
    );
}

add_action('init', 'register_my_menus');

//Retire la marge de la balise html
add_action('get_header', 'remove_admin_login_header');

function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

// chargement fichier js + styles
function my_scripts_enqueue()
{

    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/scripts/jquery.js');

    wp_register_style('bootstrapcss', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css', array(), '3.0.0', 'all');
    wp_enqueue_style('bootstrapcss');
    wp_register_script('bootstrapjs', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array(), '3.0.0');
    wp_enqueue_script('bootstrapjs');

    wp_enqueue_script('photo-galleryjs', get_template_directory_uri() . '/scripts/photo-gallery.js');
    wp_enqueue_script('contact-form', get_template_directory_uri() . '/scripts/contact-form.js');
    wp_enqueue_script('lpu-js', get_template_directory_uri() . '/scripts/lpu-js.js');

}

add_action('wp_enqueue_scripts', 'my_scripts_enqueue');


// Image � la Une
add_theme_support('post-thumbnails');

//supprimer toutes les références aux pages seules.
class mono_walker extends Walker_Nav_Menu
{
//    function start_el(&$output, $item, $depth, $args)
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
//        $class_names = '';
        $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';


        //Récupère l'URL DE l'item
        $parsedURL = parse_url(esc_attr($item->url));
        //Supprime le dernier '/' de l'url
        $cleanURL = substr_replace($parsedURL['path'], '', -1);
        //On split la chaine sur les '/'
        $pathTab = explode('/', $cleanURL);
        //On modifie la chaine derrière le dernier '/'
        $pathTab[sizeof($pathTab) - 1] = '#' . $pathTab[sizeof($pathTab) - 1];
        //On reconstitue l'URL complète modifiée
        $path = implode('/', $pathTab);
        //On injecte la nouvelle URL dans le href de l'item
        $attributes .= !empty($item->url) ? ' href="' . $path . '"' : '';
//        $attributes .= !empty($item->url) ? ' class="js-scrollTo"' : '';
        $attributes .= !empty($item->url) ? ' data-title="' . sanitize_title($item->title) . '"' : '';
        $description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';

        if ($depth != 0) $description = "";

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
        $item_output .= $description . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// personnaliser entête
$args = array(
    'width' => 980,
    'height' => 60,
    'default-image' => get_template_directory_uri() . '/images/logo-les-pelles-usees.png',
);

add_theme_support('custom-header', $args);

//Limite taille de la description article
add_filter('excerpt_more', 'wpdocs_excerpt_more');

function wpdocs_custom_excerpt_length($length)
{
    return 25;
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

//Ajout lien Voir plus à la fin des articles
function wpdocs_excerpt_more($more)
{
    return sprintf('... <a class="read-more" href="%1$s">%2$s</a>',
        get_permalink(get_the_ID()),
        __('Lire la suite', 'textdomain')
    );
}

function php_text($text)
{
    if (strpos($text, '< ' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $text);
        $text = ob_get_contents();
        ob_end_clean();
    }
    return $text;
}

add_filter('widget_text', 'php_text', 99);

