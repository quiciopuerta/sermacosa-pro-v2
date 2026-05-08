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
	// Google Fonts - Inter
	wp_enqueue_style(
		'sermacosa-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'sermacosa-style', get_stylesheet_uri(), array( 'sermacosa-fonts' ), SERMACOSA_VERSION );

	// Swiper Slider
	wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );
	wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );

	wp_enqueue_script( 'sermacosa-main', get_template_directory_uri() . '/js/main.js', array('swiper-js'), SERMACOSA_VERSION, true );

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
 * WooCommerce: Related Products Configuration
 */
add_filter( 'woocommerce_output_related_products_args', 'sermacosa_related_products_args', 99 );
function sermacosa_related_products_args( $args ) {
	$args['posts_per_page'] = 8; // 8 items total, 2 rows × 4 columns
	$args['columns'] = 4;
	return $args;
}

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

	// Top Bar Settings
	$wp_customize->add_section( 'sermacosa_top_bar', array(
		'title' => 'Barra Superior',
		'priority' => 32,
	) );

	$wp_customize->add_setting( 'sermacosa_top_bar_support', array(
		'default' => 'SOPORTE 24/7',
	) );

	$wp_customize->add_control( 'sermacosa_top_bar_support', array(
		'label' => 'Texto Soporte',
		'section' => 'sermacosa_top_bar',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'sermacosa_top_bar_location', array(
		'default' => 'ECUADOR',
	) );

	$wp_customize->add_control( 'sermacosa_top_bar_location', array(
		'label' => 'Texto Ubicación',
		'section' => 'sermacosa_top_bar',
		'type' => 'text',
	) );

	// Header CTA
	$wp_customize->add_section( 'sermacosa_header_cta', array(
		'title' => 'Botón Presupuesto',
		'priority' => 33,
	) );

	$wp_customize->add_setting( 'sermacosa_cta_text', array(
		'default' => 'PRESUPUESTO',
	) );

	$wp_customize->add_control( 'sermacosa_cta_text', array(
		'label' => 'Texto del Botón',
		'section' => 'sermacosa_header_cta',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'sermacosa_cta_link', array(
		'default' => '/contacto',
	) );

	$wp_customize->add_control( 'sermacosa_cta_link', array(
		'label' => 'Enlace del Botón',
		'section' => 'sermacosa_header_cta',
		'type' => 'text',
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
 * WooCommerce Support & Integration
 */
add_action( 'after_setup_theme', 'sermacosa_woocommerce_setup' );

/**
 * Related Products: configuration handled above at line 103.
 */


/**
 * Set WooCommerce columns to 4 by default
 */
add_filter('loop_shop_columns', 'sermacosa_loop_columns', 999);
if (!function_exists('sermacosa_loop_columns')) {
	function sermacosa_loop_columns() {
		return 4;
	}
}

/**
 * WooCommerce Content Wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function sermacosa_wrapper_start() {
    echo '<div class="container" style="margin-top: 3rem; margin-bottom: 5rem;">';
}
function sermacosa_wrapper_end() {
    echo '</div>';
}
add_action( 'woocommerce_before_main_content', 'sermacosa_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'sermacosa_wrapper_end', 10 );

/**
 * Remove WooCommerce Sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Custom Logo Filter
 */
function sermacosa_custom_logo( $html ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			wp_get_attachment_image( $custom_logo_id, 'full', false, array( 'class' => 'custom-logo' ) )
		);
	}
	return $html;
}
add_filter( 'get_custom_logo', 'sermacosa_custom_logo' );

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

/**
 * AJAX Form Handler for Contact and Budget
 */
function sermacosa_handle_contact_form() {
    check_ajax_referer( 'sermacosa_form_nonce', 'nonce' );

    $nombre = sanitize_text_field( $_POST['nombre'] );
    $email = sanitize_email( $_POST['email'] );
    $telefono = sanitize_text_field( $_POST['telefono'] );
    $empresa = sanitize_text_field( $_POST['empresa'] );
    $interes = sanitize_text_field( $_POST['productos'] );
    $asunto_user = sanitize_text_field( $_POST['asunto'] );
    $mensaje = sanitize_textarea_field( $_POST['mensaje'] );

    $admin_email = get_option( 'admin_email' );
    $subject = "[Web Presupuesto] " . $asunto_user;
    
    $body = "Nueva solicitud de presupuesto desde la web:\n\n";
    $body .= "Nombre: $nombre\n";
    $body .= "Email: $email\n";
    $body .= "Teléfono: $telefono\n";
    $body .= "Empresa: $empresa\n";
    $body .= "Interés: $interes\n\n";
    $body .= "Mensaje:\n$mensaje";

    $headers = array('Content-Type: text/plain; charset=UTF-8', 'From: ' . $nombre . ' <' . $email . '>');

    if ( wp_mail( $admin_email, $subject, $body, $headers ) ) {
        wp_send_json_success( '¡Gracias! Tu solicitud ha sido enviada con éxito. Nos contactaremos pronto.' );
    } else {
        wp_send_json_error( 'Hubo un problema al enviar el correo. Por favor, inténtalo de nuevo más tarde.' );
    }
}
add_action( 'wp_ajax_sermacosa_contact', 'sermacosa_handle_contact_form' );
add_action( 'wp_ajax_nopriv_sermacosa_contact', 'sermacosa_handle_contact_form' );

/**
 * Localize Script for AJAX
 */
function sermacosa_localize_scripts() {
    wp_localize_script( 'sermacosa-main', 'sermacosa_ajax', array(
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'sermacosa_form_nonce' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'sermacosa_localize_scripts', 25 );

/**
 * Auto-populate Primary Menu if empty
 */
function sermacosa_setup_default_menus() {
    $menu_name = 'Menú Principal';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );

        // Set up menu items
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' => 'Inicio',
            'menu-item-url'   => home_url( '/' ),
            'menu-item-status' => 'publish',
        ) );

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' => 'Maquinaria',
            'menu-item-url'   => home_url( '/shop/' ),
            'menu-item-status' => 'publish',
        ) );

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' => 'Repuestos',
            'menu-item-url'   => home_url( '/categoria-producto/repuestos/' ),
            'menu-item-status' => 'publish',
        ) );

        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title' => 'Contacto',
            'menu-item-url'   => home_url( '/contacto/' ),
            'menu-item-status' => 'publish',
        ) );

        // Assign to primary location
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $menu_id;
        $locations['mobile'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
}
add_action( 'after_setup_theme', 'sermacosa_setup_default_menus' );
