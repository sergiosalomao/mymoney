<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 22:00
 */

class PRESTO_View
{

    protected $name;

    public function __construct($paramsView)
    {
    $this->name = $paramsView['name'];

    }

    public function create(){
        $this->view = $this->name;
    }


}