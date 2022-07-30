<?php

/**
* Plugin Name: Widgets ProyectoWeb
* Description: Contiene los widgets creados para el proyecto personal.
* Author: David Rojas
* Version: 1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function register_essential_custom_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/Widgets/ProjectInformationWidget.php' );  // include the widget file

    $widgets_manager->register( new \ProjectInformationWidget() );  // register the widget

}
add_action( 'elementor/widgets/register', 'register_essential_custom_widgets' );