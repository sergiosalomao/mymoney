<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 21:52
 */

class IndexController extends PRESTO_Controller
{

    public function __construct()
    {
        $this->setLayout("default");
    }

    public function indexAction()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
            $this->formLogin = new Form_Usuarios_Login();
            $this->setController('usuarios');
            $this->render("login");
        } else {
            $this->render("index");
        }

    }

}