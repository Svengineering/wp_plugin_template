<?php

namespace VCPlugin;
use wpdb;
defined( 'ABSPATH' ) || exit; //no direct access

class Model {

    protected ?wpdb $db = null;

    protected string $prefix;

    public function __construct() {
        global $wpdb;

        $this->db = $wpdb;
        $this->prefix = $wpdb->prefix;
    }



}



?>