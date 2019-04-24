<?php
if (!isset($_SESSION)) {
    session_start();
}


class PRESTO_Session
{

    private $auth;
    private $user;

    public function __construct()
    {

    }

    public static function getSession()
    {
      $sessionAuth = new PRESTO_Session();
      self::auth();
      return $sessionAuth;

    }



    public static function loggedOn()
    {

        $_SESSION['logged'] = true;
    }

    public static function loggedOff()
    {
        $_SESSION['logged'] = false;
    }

}