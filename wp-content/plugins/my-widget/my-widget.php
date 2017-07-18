<?php
/* 
Plugin Name: Mini Widget - Please don't use ^_^
Plugin URI: https://swissacademy.eu
Description: This is a widget plugin that describes how to kill wordpress
Author: CtrlAltDelicious
Version: 0.1
Author URI: https://swissacademy.eu
*/



add_shortcode('test2_banner','randomTestBanner');

/*
add_action('admin_notices','notificari');
add_filter('widget_text','do_shortcode');
add_filter('widget_title','modificaTitlu');
*/


function randomTestBanner() {
    $bannere = array(
    'http://placehold.it/350x80/ff0000/ffffff',
    'http://placehold.it/350x80/00ff00/ff30ee'
    );
    
    $banner_selectat = $bannere[rand(0,3)];
    
    echo "<img src='$banner_selectat' >";    
}
