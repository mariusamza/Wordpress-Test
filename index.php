<?php
/*
Plugin Name: SWA Test Plugin
Plugin URI: https://swissacademy.eu
Description: This is a wordpress implementation of a demo plugin
Author: Marius Amza / Swiss WebAcademy
Version: 0.2
Author URI: https://swissacademy.eu
*/

class SWA_Banner_Widget extends WP_Widget {

    public function __construct() {
        // setarile de baza ale widgetului
        parent::__construct(
            'banner_widget', //ID-ul widget-ului
            'SWA Banner Widget Title', // Titlul widgetului pe care il vede utilizatorul
            array( 'description' => 'Choose the number of banners to display')
        );
    }

    public function widget($args, $instance) {
        // output-ul in front-end al codului ... ce afiseaza pe site
    }

    public function form($instance) {
        // ce vedem noi in back-end si putem edita sa adaugam continut
    }

    public function update($new_instance, $old_instance) {
        //functia asta proceseaza form()-ul si il salveaza in BD
    }
}

function swa_register_widgets() {
    register_widget('SWA_Banner_Widget');
}

add_action('widgets_init','swa_register_widgets');