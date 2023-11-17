<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access

class Model {

    protected $db = null;

    protected $prefix;

    public function __construct() {
        global $wpdb;

        $this->db = $wpdb;
        $this->prefix = $wpdb->prefix;
    }



}



?>