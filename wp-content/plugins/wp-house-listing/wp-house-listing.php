<?php 
/*
Plugin Name: Недвижимость [Quant]
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Описание плагина
Version:      20180108
Author:       Quant
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
License:     GPL2

*/
//Exit if accessd directly 
if (! defined( 'ABSPATH' )) {
	exit;
}




// add_option( 'myhack_extraction_length', '255', '', 'yes' );
// var_dump(get_option( 'myhack_extraction_length' ));
$dir = plugin_dir_path(__FILE__);
require ($dir.'wp-house-cpt.php');
require ($dir.'wp-house-fields.php');

require ($dir.'wp-harray-cpt.php');
//require ($dir.'wp-harray-fields.php');


require ($dir.'wp-house-shortcode.php');

require ($dir.'wp-house-render-admin.php');


function dwwp_admin_enqueue_scripts(){
global $pagenow, $typenow;
$screen  = get_current_screen();
	// wp_enqueue_style('bootstrap-css','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
	// 	wp_enqueue_style('bootstrap-css-theme','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
	// 	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
//    wp_enqueue_script('jquery-ui-datepicker');
//    wp_enqueue_script('dwwp-admin-js',plugins_url('js/admin-houses.js',__FILE__),array('jquery', 'jquery-ui-sortable'),'20170122',true);
//

if ( ($pagenow=='post.php' || $pagenow=='post-new.php' || $pagenow=='edit.php') && (($typenow == 'house')  ||   ($typenow == 'hrarray')) ) {

		wp_enqueue_style('dwwp-admin-css',plugins_url('css/admin-houses.css',__FILE__));

		wp_enqueue_script('dwwp-admin-js',plugins_url('js/admin-houses.js',__FILE__),array('jquery', 'jquery-ui-sortable','jquery-ui-datepicker'),'20170122',true);
    wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
    wp_enqueue_style( 'jquery-ui' );

    wp_localize_script('dwwp-admin-js','WP_HOUSE_LISTING',array(
'security'=>wp_create_nonce('wp-house-order'),
'success'=>__('Список сохранен успешно'),
'error'=> __('Ошибка сохранения списка')
   ));
}




//var_dump($screen->post_type);
//die;
}

add_action( 'admin_enqueue_scripts','dwwp_admin_enqueue_scripts');

function remove_post_custom_fields() {

    remove_meta_box( 'tagsdiv-hr_options', 'hrarray', 'side' );
    remove_meta_box( 'tagsdiv-material', 'hrarray', 'side' );
    remove_meta_box( 'tagsdiv-relationships', 'hrarray', 'side' );
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

function dwwp_add_submenu_page() {
add_submenu_page(
	'edit.php?post_type=house',
	 'Настройки домов',
	 'Настройки домов', 
	 'manage_options', 
	 'settings_house',
	 'settings_admin_houses_callback'
	);
}
add_action( 'admin_menu','dwwp_add_submenu_page');
