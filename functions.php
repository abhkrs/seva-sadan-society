<?php
function add_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.7', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('owltheme', get_template_directory_uri() . '/css/owl.theme.default.min.css', false, '1.1', 'all');
    wp_enqueue_style('owltheme');

    wp_register_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css', false, '1.1', 'all');
    wp_enqueue_style('owl');

    wp_register_style('style', get_template_directory_uri() . '/css/common.css', false, '1.2', 'all');
    wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'add_css');


function add_script()
{
    wp_register_script('carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), 1.1, true);
    wp_enqueue_script('carousel');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('bootstrap');

    wp_register_script('matchheight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('matchheight');
}
add_action('wp_enqueue_scripts', 'add_script');

function set_custom_template($template)
{
    if (is_singular('post')) {
        $custom_template = locate_template('single.php');
        if ($custom_template != '') {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('single_template', 'set_custom_template');

// 404 Template
function custom_404_template($template) {
    if (is_404()) {
        return locate_template('404.php');
    }
    return $template;
}
add_filter('template_include', 'custom_404_template');


// archive, category, search
function custom_blog_template($template) {
    if (is_category() || is_archive() || is_search()) {
        $custom_template = locate_template('archive.php');
        if (!empty($custom_template)) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('template_include', 'custom_blog_template');


// Name & Phone Number Validation

add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter', 20, 2 );

function custom_text_validation_filter( $result, $tag ) {
    $name = $tag->name;

    if ( 'name' === $name ) {
        $submitted_value = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';

        $regex = '/^[A-Za-z\s]+$/';

        if ( ! preg_match( $regex, $submitted_value ) ) {
            $result->invalidate( $tag, "Only letters and spaces allowed." );
        }
    }

    if ( 'phone' === $name ) {
        $submitted_value = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';

        $regex = '/^\d{10}$/';

        if ( ! preg_match( $regex, $submitted_value ) ) {
            $result->invalidate( $tag, "Phone number must be a 10-digit number." );
        }
    }

    return $result;
}
