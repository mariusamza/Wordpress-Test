<?php
/* 
Plugin Name: Mini Widget - Please don't use ^_^
Plugin URI: https://swissacademy.eu
Description: This is a widget plugin that describes how to kill wordpress
Author: CtrlAltDelicious
Version: 0.1
Author URI: https://swissacademy.eu
*/

add_shortcode('random_joke','randomJoke');

function randomJoke() {
    echo '- De ce a murit melcul?';
    echo '- S-a uitat in priza.';
}

add_shortcode('test2_banner','randomTestBanner');


