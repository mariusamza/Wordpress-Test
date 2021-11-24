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

        echo $args['before_widget'];

        if(!empty( $instance['numar'])) {
            
            $source1 = 'http://lorempixel.com/728/90/cats/';
            $source2 = 'https://lorempixel.com/728/90/sports/';
            $source3 = 'https://lorempixel.com/728/90/transport/';
            $array_bannere = array($source1, $source2, $source3);
            
            $i = 0;
            while($i < $instance['numar']) {
                echo '<img src='.$array_bannere[$i].'/>';
                $i++;
            }
            

        } else {
            //echo '<h2>Widget Title Not Set</h2>';
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        // ce vedem noi in back-end si putem edita sa adaugam continut

        $numar = !empty( $instance['numar']) ? $instance['numar'] : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('numar') ?>">Numar: </label>
            <input id="<?php echo $this->get_field_id('numar') ?>" value="<?php echo $numar ?>" name="<?php echo $this->get_field_name('numar') ?>" class="widefat" type="number" />
        </p>
        <?php
        
    }

    public function update($new_instance, $old_instance) {
        //functia asta proceseaza form()-ul si il salveaza in BD

        $instance = array();
        $instance['numar'] = (!empty($new_instance['numar'])) ? $new_instance['numar'] : '';

        return $instance;
    }
}


class SWA_Widget extends WP_Widget {

    public function __construct() {
        // setarile de baza ale widget-ului
        parent::__construct(
            'swa_widget', // ID-ul widget-ului
            'SWA Widget Title', // Titlu  widget-ului pe care il vede utilizatorul
            array( 'description' => 'SWA Killer Widget - we crash them so you don\'t need to crash them.' )
        );
    }

    public function widget( $args, $instance ) {
        // output-ul in front-end al codului ... ce afiseaza pe site

       echo $args['before_widget'];

       if( !empty( $instance['titlu'] )  ) {
           echo $args['before_title'].apply_filters( 'widget_title', $instance['titlu'] ).$args['after_title'];
       } else {
            echo '<h2>Widget Title Not Set</h2>';
       }

       echo $args['after_widget'];
    }

    public function form( $instance ) {
        // ce vedem noi in back-end si putem edita sa adaugam continut
        $titlu = !empty( $instance['titlu'] ) ? $instance['titlu'] : 'Nu ai introdus un titlu!';
        ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'titlu' ) ?>">Titlu: </label>
        <input id="<?php echo $this->get_field_id( 'titlu' ) ?>" value="<?php echo esc_attr($titlu) ?>" name="<?php echo $this->get_field_name( 'titlu' ) ?>" class="widefat" type="text">
    </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        // functia asta proceseaza form() -ul si il salveaza in BD

            $instance = array();
            $instance['titlu'] = (!empty($new_instance['titlu']))? strip_tags( $new_instance['titlu'] ): '';

            return $instance;
    }

}

function swa_register_widgets() {
    register_widget('SWA_Widget');
    register_widget('SWA_Banner_Widget');
}
add_action('widgets_init','swa_register_widgets');