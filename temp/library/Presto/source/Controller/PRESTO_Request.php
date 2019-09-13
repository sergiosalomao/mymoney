<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 27/03/2019
 * Time: 19:36
 */

class PRESTO_Request
{
    protected $_request;

    public function __construct($request)
    {
        $URL = array();
        $urlRequest = explode("/public", $request);


        if ($urlRequest[1] == Null) $urlRequest[0] = '/';

        $urlRequest = explode("?",$urlRequest[1]);

        $URL['get']['request'] = $urlRequest[0];

        $urlRequest = explode("?", $request);

        if (isset($urlRequest[1])) {
            $paramsPart = explode("&", $urlRequest[1]);
            foreach ($paramsPart as $key => $param) {
                $part = explode("=", $param);
                $URL['get']['params'][$part[0]] = $part[1];
            }
        }

        $URL['post'] = $_POST;
        $this->_request = $URL;
    }

    public function getRequest()
    {
        return $this->_request;
    }
}