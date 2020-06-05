<?php

/**
 * dashboard widget remove
 */
	
remove_action('welcome_panel', 'wp_welcome_panel');

add_action('wp_dashboard_setup', 'wpse_73561_remove_all_dashboard_meta_boxes', 9999 );

function wpse_73561_remove_all_dashboard_meta_boxes()
{
    global $wp_meta_boxes;
    $wp_meta_boxes['dashboard']['normal']['core'] = array();
    $wp_meta_boxes['dashboard']['side']['core'] = array();
}



/**
 * woocommerce data tabs remove
 */
add_filter( 'woocommerce_product_data_tabs', 'woo_remove_product_data_tabs', 98 );

function woo_remove_product_data_tabs( $tabs ) {

    unset( $tabs['shipping'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
	unset( $tabs['linked_product']);
	unset( $tabs['attribute']);
	unset( $tabs['advanced']);
	unset( $tabs['direct_checkout']);
	unset( $tabs['marketplace-suggestions']);

    return $tabs;
}


/**
 * menu dan submenu edit
 */
function remove_submenus() { 

$user = wp_get_current_user();
   if ( !in_array( 'administrator', (array) $user->roles ) ) {
                
global $submenu;
	add_menu_page('Tampilan', 'Tampilan', 'edit_theme_options', 'customize.php', '');
	
	//remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'jetpack' );                    //Jetpack* 
	remove_menu_page( 'edit.php' );                   //Posts
	remove_menu_page( 'upload.php' );                 //Media
	remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );                 //Appearance
	remove_menu_page( 'plugins.php' );                //Plugins
	remove_menu_page( 'tools.php' );                  //Tools
	remove_menu_page( 'options-general.php' );        //Settings
	remove_menu_page( 'edit.php' );        //Elementor
	remove_menu_page( 'edit.php?post_type=udb_widgets' );
	remove_menu_page( 'edit.php?post_type=custom-css-js&page=custom-css-js-config' );
	remove_menu_page( 'admin.php?page=snippets' );
	remove_menu_page( 'edit.php?post_type=order');
	remove_menu_page( 'admin.php?page=waorder');
	remove_menu_page( 'nav-menus.php');
	remove_submenu_page( 'woocommerce', 'wc-reports' );
	remove_menu_page( 'edit.php?post_type=shop_coupon');
	

 
   } 
   
 } 
add_action('admin_menu', 'remove_submenus'); 

function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'tampilan', // First separator
        'ongkir dan pembayaran', // Posts
		'plugins.php'
        
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 999 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 999 );



function mytheme_customize_register( $wp_customize ) {
  //All our sections, settings, and controls will be added here
$user = wp_get_current_user();
   if ( !in_array( 'administrator', (array) $user->roles ) ) {

  	$wp_customize->remove_panel( 'nav_menus');
 	$wp_customize->remove_panel( 'widgets');
   }
}
add_action( 'customize_register', 'mytheme_customize_register',999 );



/**
 * edit profile page
 */
function remove_profile_fields( $hook ) {
    ?>
    <style type="text/css">
        form#your-profile p+h2,
		form#your-profile p+h2+table { display:none!important;visibility:hidden!important; }
		.user-description-wrap { display:none!important;visibility:hidden!important; }
    </style>
    <?php
} 

add_action( 'admin_print_styles-profile.php', 'remove_profile_fields',999 );
add_action( 'admin_print_styles-user-edit.php', 'remove_profile_fields',999 );


/**
 * metabox product edit
 */
function remove_my_metaboxes() {

	remove_meta_box( 'woocommerce-product-images',  'product', 'side');
	remove_meta_box( 'tagsdiv-product_tag', 'product', 'side' );
	remove_meta_box('postimagediv','product','side');
	remove_meta_box( 'postexcerpt', 'product', 'normal' );
}
add_action('add_meta_boxes','remove_my_metaboxes',40);


add_filter( 'get_user_option_meta-box-order_product', 'metabox_order' );
function metabox_order( $order ) {
    return array(
        'normal' => join( 
            ",", 
            array(       // Arrange here as you desire
                'product_catdiv',
                'waorder_product_galery',
				'submitdiv'
            )
        ),
    );
}

/**
 * edit tampilan produk
 */
add_action( 'wp_head', function () { ?>
	<style>

	.woocommerce-product-gallery {
    	visibility: hidden;
	}
	.summary {
    	visibility: hidden;
	}
	section.related.products{display: none!important;}
							

	</style>
<?php } );


/**
 * wordpress item edit
 */
function remove_footer_admin () {
    echo "";
} 

add_filter('admin_footer_text', 'remove_footer_admin');

function example_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'example_admin_bar_remove_logo', 0 );

// hide update notifications
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes


function wpse_260669_remove_new_content(){
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'new-content' );
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'wpse_260669_remove_new_content' );

/**
 * Pengganti add to cart woocommerce
 */
// First, remove Add to Cart Button
  
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
  
// Second, add View Product Button
  
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_view_product_button', 10 );
  
function bbloomer_view_product_button() {
global $product;
$link = $product->get_permalink();
echo '<a href="' . $link . '" class="button addtocartbutton">Lihat Produk</a>';
}

/**
 * force column to 1
 */
$func = function( $result, $option, $user ){
    return '1';
};
add_filter( "get_user_option_screen_layout_shop_order", $func, 10, 3 );
add_filter( "get_user_option_screen_layout_product", $func, 10, 3 );

/**
 * capability edit
 */

/* $role = get_role( 'shop_magager' );
$role->remove_cap( 'manage_options' );
$role->remove_cap( 'manage_woocommerce' );
$role->remove_cap( 'view_woocommerce_reports' );
 */