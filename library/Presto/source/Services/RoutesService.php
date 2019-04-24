<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 26/03/2019
 * Time: 21:28
 */

class RoutesService
{
    public static function create(string $controller, string $method): array
    {
        return [
            'controller' => $controller,
            'method' => $method,
        ];
    }







}