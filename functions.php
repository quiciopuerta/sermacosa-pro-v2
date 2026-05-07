<?php
/**
 * SERMACOSA PRO V2 Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SERMACOSA_VERSION', '2.0.0' );

/**
 * Theme Support
 */
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'woocommerce' );
add_theme_support( 'custom-logo' );
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );

/**
 * Register Menus
 */
register_nav_menus( array(
	'primary' => 'Menú Principal',
	'footer' => 'Menú Pie de Página',
	'mobile' => 'Menú Móvil'
) );

/**
 * Enqueue Styles and Scripts
 */
function sermacosa_enqueue_assets() {
	wp_enqueue_style( 'sermacosa-style', get_stylesheet_uri(), array(), SERMACOSA_VERSION );
	wp_enqueue_script( 'sermacosa-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), SERMACOSA_VERSION, true );

	// WooCommerce styles
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'woocommerce-general' );
		wp_enqueue_style( 'woocommerce-layout' );
		wp_enqueue_style( 'woocommerce-smallscreen' );
	}
}
add_action( 'wp_enqueue_scripts', 'sermacosa_enqueue_assets' );

/**
 * Register Sidebars
 */
function sermacosa_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar Principal',
		'id' => 'primary-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer-area-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer-area-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer-area-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'sermacosa_widgets_init' );

/**
 * Customizer Settings
 */
function sermacosa_customize_register( $wp_customize ) {
	// Colors Section
	$wp_customize->add_section( 'sermacosa_colors', array(
		'title' => 'Colores SERMACOSA',
		'priority' => 30,
	) );

	// Primary Color
	$wp_customize->add_setting( 'sermacosa_primary_color', array(
		'default' => '#0D1B2A',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sermacosa_primary_color', array(
		'label' => 'Color Primario (Azul Marino)',
		'section' => 'sermacosa_colors',
		'settings' => 'sermacosa_primary_color',
	) ) );

	// Secondary Color
	$wp_customize->add_setting( 'sermacosa_secondary_color', array(
		'default' => '#E8500A',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sermacosa_secondary_color', array(
		'label' => 'Color Secundario (Naranja)',
		'section' => 'sermacosa_colors',
		'settings' => 'sermacosa_secondary_color',
	) ) );

	// Contact Info Section
	$wp_customize->add_section( 'sermacosa_contact', array(
		'title' => 'Información de Contacto',
		'priority' => 31,
	) );

	$wp_customize->add_setting( 'sermacosa_phone', array(
		'default' => '+34 XXX XXX XXX',
	) );

	$wp_customize->add_control( 'sermacosa_phone', array(
		'label' => 'Teléfono',
		'section' => 'sermacosa_contact',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'sermacosa_email', array(
		'default' => 'info@sermacosa.com',
	) );

	$wp_customize->add_control( 'sermacosa_email', array(
		'label' => 'Email',
		'section' => 'sermacosa_contact',
		'type' => 'email',
	) );

	$wp_customize->add_setting( 'sermacosa_address', array(
		'default' => 'Tu dirección aquí',
	) );

	$wp_customize->add_control( 'sermacosa_address', array(
		'label' => 'Dirección',
		'section' => 'sermacosa_contact',
		'type' => 'textarea',
	) );
}
add_action( 'customize_register', 'sermacosa_customize_register' );

/**
 * Custom CSS from Customizer
 */
function sermacosa_custom_css() {
	$primary_color = get_theme_mod( 'sermacosa_primary_color', '#0D1B2A' );
	$secondary_color = get_theme_mod( 'sermacosa_secondary_color', '#E8500A' );
	?>
	<style>
		:root {
			--primary-navy: <?php echo esc_attr( $primary_color ); ?>;
			--primary-orange: <?php echo esc_attr( $secondary_color ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'sermacosa_custom_css' );

/**
 * WooCommerce Support
 */
function sermacosa_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 300,
		'single_image_width' => 500,
	) );
}
add_action( 'after_setup_theme', 'sermacosa_woocommerce_support' );

/**
 * Remove WooCommerce Sidebar
 */
add_filter( 'woocommerce_sidebar_enabled', '__return_false' );

/**
 * Custom Logo Filter
 */
function sermacosa_custom_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$html = sprintf(
		'<a href="%1$s" class="custom-logo-link">%2$s</a>',
		esc_url( home_url( '/' ) ),
		wp_get_attachment_image( $custom_logo_id, 'full' )
	);
	return $html;
}

/**
 * Excerpt length
 */
function sermacosa_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'sermacosa_excerpt_length' );

/**
 * Add Contact Page
 */
function sermacosa_create_contact_page() {
	if ( ! get_page_by_path( 'contacto' ) ) {
		wp_insert_post( array(
			'post_title' => 'Contacto',
			'post_name' => 'contacto',
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_template' => 'contact.php'
		) );
	}
}
add_action( 'init', 'sermacosa_create_contact_page' );
