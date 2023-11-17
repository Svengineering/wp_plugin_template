<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access

class Views {

    public Model $model;


    public function __construct($model) {
        $this->model = $model;
    }


/*     public function admin_page() {
        ?>

        <div class="wrap">
            <h1>xxxxx - Einstellungen</h1>

            <form action="options.php" method="post">
                <p class="submit">
                    <?php
                    settings_fields('option-group');

                    do_settings_sections('page-slug');

                    submit_button("Speichern", 'secondary'); 
                    ?>
                </p>
            </form>
        </div><!-- wrap -->
    <?php 
    } */


/*     public function settings_field_xxxx() {
        $val = get_option('option_name');
    
        ?>
        <div>
            <input type='email' id='option_name' name='option_name' value='<?php echo esc_attr($val); ?>'/>
        </div>
    
        <?php
    } */


}






?>