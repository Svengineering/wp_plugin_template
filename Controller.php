<?php

namespace AmeliaEvtList;
defined( 'ABSPATH' ) || exit; //no direct access



class Controller {

    public Views $views;

    public Model $model;


    public function __construct($views, $model) {
        $this->views = $views;
        $this->model = $model;
    }


}







?>