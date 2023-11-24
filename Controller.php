<?php

namespace VCPlugin;
defined( 'ABSPATH' ) || exit; //no direct access



class Controller {

    public Views $views;

    public Model $model;


    public function __construct(Views $views, Model $model) {
        $this->views = $views;
        $this->model = $model;
    }


}







?>
