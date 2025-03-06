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


/**
 * Create custom payment table on theme activation
 */
function create_custom_payment_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_payments';
    $charset_collate = $wpdb->get_charset_collate();

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            order_id varchar(50) NOT NULL,
            transaction_id varchar(100) NOT NULL,
            amount decimal(10,2) NOT NULL,
            status varchar(20) NOT NULL,
            payment_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            payment_method varchar(50) NOT NULL,
            customer_email varchar(100) DEFAULT '' NOT NULL,
            response_code varchar(50) DEFAULT '' NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

// Run on theme activation
add_action('after_switch_theme', 'create_custom_payment_table');

// Include payment admin page
require_once get_template_directory() . '/payment-admin.php';

// Add export functionality for payment records
add_action('wp_ajax_export_payment_records', 'export_payment_records');

function export_payment_records() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized access');
    }

    check_admin_referer('export_payment_records_nonce', 'export_nonce');

    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_payments';

    // Get export parameters
    $export_type = $_POST['export_type'];
    $where_clause = '';

    if ($export_type === 'monthly') {
        $month = sanitize_text_field($_POST['export_month']);
        $where_clause = $wpdb->prepare("WHERE DATE_FORMAT(payment_date, '%Y-%m') = %s", $month);
    } else {
        $year = intval($_POST['export_year']);
        $where_clause = $wpdb->prepare("WHERE YEAR(payment_date) = %d", $year);
    }

    $payments = $wpdb->get_results("SELECT * FROM $table_name $where_clause ORDER BY payment_date DESC");

    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="payment-records-' . 
        ($export_type === 'monthly' ? $_POST['export_month'] : $_POST['export_year']) . '.csv"');
    header('Cache-Control: max-age=0');

    // Create output stream
    $output = fopen('php://output', 'w');

    // Add UTF-8 BOM for proper Excel encoding
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

    // Add headers
    fputcsv($output, array(
        'Date',
        'Name',
        'Email',
        'Phone',
        'Company',
        'Order ID',
        'Transaction ID',
        'Amount',
        'Payment Method',
        'Status'
    ));

    // Add data rows
    foreach ($payments as $payment) {
        fputcsv($output, array(
            date('d M Y H:i', strtotime($payment->payment_date)),
            $payment->customer_name,
            $payment->customer_email,
            $payment->customer_phone,
            $payment->customer_company,
            $payment->order_id,
            $payment->transaction_id,
            $payment->amount,
            $payment->payment_method,
            $payment->status
        ));
    }

    fclose($output);
    exit;
}

// Function to get available dates for filtering
function get_available_payment_dates() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_payments';
    
    return array(
        'years' => $wpdb->get_col("SELECT DISTINCT YEAR(payment_date) as year FROM $table_name ORDER BY year DESC"),
        'months' => $wpdb->get_col("SELECT DISTINCT DATE_FORMAT(payment_date, '%Y-%m') as month FROM $table_name ORDER BY month DESC")
    );
}
