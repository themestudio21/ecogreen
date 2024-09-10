<?php

//Global Constants
define('TCG_THEME_VERSION', '1.0.0');
define('TCG_THEME_NAME', 'ecogreen');
define('TCG_THEME_DEMO_URL', 'ecogreen.themescamp.com'); // used in core
define('TCG_THEME_ID', '00');
define('TCG_FRAMEWORK_VERSION', '2.0.8');
define('TCG_ELEMENTS_VERSION', '1.0.8');
define('TCG_THEME_KEY',false);
define('DARK_LIGHT_SUPPORT', false);
define('TCG_THEME_DEMO_CLOUD',true);
define('TCG_THEME_DEV_MOD',true);                      // used in core  

add_filter( 'tcg_required_plugins', 'tcgs_required_plugins' );
function tcgs_required_plugins( $plugins ) {

    global $framework_source_url, $elements_source_url;

    $framework_source_url = 'https://docs.themescamp.com/plugins/ecogreen/themescamp-core-'.TCG_FRAMEWORK_VERSION.'.zip';
    $elements_source_url = 'https://docs.themescamp.com/plugins/ecogreen/themescamp-elements-'.TCG_ELEMENTS_VERSION.'.zip';


    // Modify the plugins array as needed
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      => esc_html__( 'Elementor Page Builder', 'ecogreen' ),
            'slug'      => 'elementor',
            'required'  => true,
        ),
        array(
            'name'               => esc_html__( 'MetForm', 'ecogreen' ),
            'slug'               => 'metform',
            'required'           => true,
        ), 
        array(
            'name'               => esc_html__( 'ThemesCamp Elements', 'ecogreen' ),
            'slug'               => 'themescamp-elements',
            'source'             => $elements_source_url,
            'required'           => true,
            'force_activation'   => false,// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false,// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
        array(
            'name'               => esc_html__( 'ThemesCamp Core', 'ecogreen' ),
            'slug'               => 'themescamp-core',
            'source'             => $framework_source_url, 
            'required'           => true,
            'force_activation'   => false,// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false,// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
    );

    return $plugins;
}


function modify_link($url, $text, $text_domain) {
    // Replace the old URL with the new one
    echo '<a href="' . esc_url($url) . '" target="_blank">' . esc_html__($text, $text_domain) . '</a>';
}

add_action('tcg_docs_link', function() {
    modify_link('https://fw.themescamp.com/docs-wp/', __('Start Reading', 'ecogreen'), 'ecogreen');
});

add_action('tcg_portfolio_link', function() {
    modify_link('https://www.themescamp.com/portfolios/', __('More Themes', 'ecogreen'), 'ecogreen');
});

add_action('tcg_help_link', function() {
    modify_link('https://themescamp.ticksy.com/', __('Contact us', 'ecogreen'), 'ecogreen');
}); 

// Define the custom filter function to replace the footer text
function tcg_footer_text_replace($text) {
    return '<p>' . esc_html__(sprintf( esc_html__( 'Copyright %s by ThemesCamp All Rights Reserved.', 'ecogreen' ), date('Y') ), 'ecogreen') . '</p>';
}
// Hook into the 'tcg_footer_text' filter
add_filter('tcg_footer_text', 'tcg_footer_text_replace');

?>
