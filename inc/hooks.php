<?php

// Global Constants
define('TCG_THEME_VERSION', '1.0.0');
define('TCG_THEME_NAME', 'ecogreen');
define('TCG_THEME_DEMO_URL', 'https://ecogreen.themescamp.com'); // Ensure URLs are secure
define('TCG_THEME_ID', '00');
define('TCG_FRAMEWORK_VERSION', '2.0.8');
define('TCG_ELEMENTS_VERSION', '1.0.8');
define('TCG_THEME_KEY', false);
define('DARK_LIGHT_SUPPORT', false);
define('TCG_THEME_DEMO_CLOUD', true);
define('TCG_THEME_DEV_MOD', true); // used in core  

// Register required plugins
add_filter('tcg_required_plugins', 'tcgs_required_plugins');
function tcgs_required_plugins($plugins) {

    global $framework_source_url, $elements_source_url;

    $framework_source_url = 'https://docs.themescamp.com/plugins/ecogreen/themescamp-core-' . TCG_FRAMEWORK_VERSION . '.zip';
    $elements_source_url = 'https://docs.themescamp.com/plugins/ecogreen/themescamp-elements-' . TCG_ELEMENTS_VERSION . '.zip';

    // Modify the plugins array as needed
    $plugins = array(
        array(
            'name'      => esc_html__('Elementor Page Builder', 'ecogreen'),
            'slug'      => 'elementor',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('MetForm', 'ecogreen'),
            'slug'      => 'metform',
            'required'  => true,
        ),
        array(
            'name'               => esc_html__('ThemesCamp Elements', 'ecogreen'),
            'slug'               => 'themescamp-elements',
            'source'             => $elements_source_url,
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('ThemesCamp Core', 'ecogreen'),
            'slug'               => 'themescamp-core',
            'source'             => $framework_source_url,
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
    );

    return $plugins;
}

// Helper function to create HTML links
function tcg_modify_link($url, $text) {
    // Ensure the translation function includes the text domain
    return '<a href="' . esc_url($url) . '" target="_blank">' . $text. '</a>';
}

// Add documentation, portfolio, and help links
add_action('tcg_docs_link', function() {
    // Use tcg_modify_link to create the 'Start Reading' link
    echo tcg_modify_link('https://fw.themescamp.com/docs-wp/', esc_html__('Start Reading', 'ecogreen'));
});

add_action('tcg_portfolio_link', function() {
    // Use tcg_modify_link to create the 'More Themes' link
    echo tcg_modify_link('https://www.themescamp.com/portfolios/', esc_html__('More Themes', 'ecogreen'));
});

add_action('tcg_help_link', function() {
    // Use tcg_modify_link to create the 'Contact us' link
    echo tcg_modify_link('https://themescamp.ticksy.com/', esc_html__('Contact us', 'ecogreen'));
});


// Replace footer text
function tcg_footer_text_replace($text) {
    return '<p>' . sprintf(esc_html__('Copyright %s by ThemesCamp All Rights Reserved.', 'ecogreen'), date('Y')) . '</p>';
}
add_filter('tcg_footer_text', 'tcg_footer_text_replace');

?>
