<?php

/* 
Plugin Name: My Plugin - Please don't use ^_^
Plugin URI: https://swissacademy.eu
Description: This is a plugin that describes how to kill wordpress
Author: CtrlAltDelicious
Version: 0.1
Author URI: https://swissacademy.eu
*/

add_shortcode('swiss_banner','randomBanner');
add_action('admin_notices','notificari');
add_filter('widget_text','do_shortcode');
add_filter('widget_title','modificaTitlu');

function randomBanner() {
    $bannere = array(
    'http://placehold.it/350x80/ff0000/ffffff',
    'http://placehold.it/350x80/00ff00/ffffff'
    );
    
    $banner_selectat = $bannere[rand(0,3)];
    
    echo "<img src='$banner_selectat' >";    
}

function notificari() {
    echo '<div class="notice notice-warning is-dismissible">';
    echo '<p><b>La Multi Ani!</b> Sa cresti mare!</p>';
    echo '</div>';
}

function modificaTitlu($titlu) {
    echo $titlu.' :)';
}





