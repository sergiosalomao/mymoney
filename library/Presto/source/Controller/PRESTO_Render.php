<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 27/03/2019
 * Time: 19:41
 */

class PRESTO_Render
{

        protected $view;
        protected $pathView;

        public function __construct($view)
        {

            echo $this->pathView = 'App/Source/View/'. $this->controller;
          $this->view = $view;
          $this->view();

        }

        public function view(){

        }

}