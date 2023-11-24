<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access

class Views {

    protected Model $model;


    public function __construct(Model $model) {
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

    public function error_message_wrong_php_version(): void {  
        ?>
            <div class="notice notice-error is-dismissible">
            <p><?php
                $str = 'Das Plugin <strong>' . xxxxx_NAME . '</strong> kann nicht gestartet werden, da die vorhandene PHP-Version ' . PHP_VERSION . ' nicht ausreicht.<br />';
                $str .= "Das Plugin benötigt mindestens die PHP-Version " . PluginInit::PHP_MIN_VERSION . '<br />';
                $str .= "Bitte deaktiviere das Plugin <strong>" . xxxxx_NAME . "</strong>, um diese Fehlermeldung abzuschalten!";
                echo $str;
            ?></p>
            </div>
        <?php
    }


}






?>
