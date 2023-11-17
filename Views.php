<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access

class Views {

    public Model $model;


    public function __construct($model) {
        $this->model = $model;
    }


}






?>