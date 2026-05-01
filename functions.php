<?php
/**
 * ImmensTheme functions.
 */

// 1. Allow custom scripts in header/footer via option
add_action('wp_head', 'immens_custom_header_scripts', 9999);
add_action('wp_footer', 'immens_custom_footer_scripts', 9999);

function immers_custom_scripts_option($key) {
    $opt = get_option('immens_custom_scripts', []);
    if (!is_array($opt)) $opt = [];
    return isset($opt[$key]) ? $opt[$key] : '';
}

function immers_custom_header_scripts() {
    echo immers_custom_scripts_option('header');
}

function immers_custom_footer_scripts() {
    echo immers_custom_scripts_option('footer');
}

// Provide REST endpoint to update scripts (POST)
add_action('rest_api_init', function() {
    register_rest_route('immens/v1', '/script', [
        'methods' => 'POST',
        'callback' => 'immens_script_cb',
        'permission_callback' => function () { return current_user_can('manage_options'); },
    ]);
});

function immens_script_cb(WP_REST_Request $request) {
    $data = $request->get_json_params();
    if (!isset($data['key']) || !isset($data['code'])) {
        return new WP_REST_Response(['error' => 'Missing key or code'], 400);
    }
    $opt = get_option('immens_custom_scripts', []);
    if (!is_array($opt)) $opt = [];
    $opt[$data['key']] = $data['code'];
    update_option('immens_custom_scripts', $opt);
    return new WP_REST_Response(['status' => 'ok']);
}

// 2. Hook into WooCommerce before checkout to inject pixels
add_action('woocommerce_before_checkout_form', function() {
    // placeholder: will be overridden by admin via header script option
    echo immers_custom_scripts_option('checkout_pixel');
});

// 3. Hook into FluentCRM email templates via custom filter
if (class_exists('FluentCRM\Lists\ListModel')) {
    add_filter('fluentcrm_email_body', function($body,$mail) {
        // Example: prepend header code for tracking
        $header = immers_custom_scripts_option('mailer_header');
        return $header . $body;
    }, 10, 2);
}

// Recommend to enqueue minimal block patterns and editor settings if needed
