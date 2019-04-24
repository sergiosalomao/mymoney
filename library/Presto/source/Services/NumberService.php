<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 13/04/2019
 * Time: 12:34
 */

class NumberService
{
    const REAL = "R";
    const MOEDA_REAL = "R$";
    const DOLLAR = "$";
    const PONTO = ".";
    const VIRGULA = ",";

    public static function toMoney($value, $decimal = null, $moneyType = null, $showMoneyType = false)
    {
        if ($decimal == null) $decimal = 2;
        if ($moneyType == null) $moneyType = self::MOEDA_REAL;
        if ($showMoneyType == false) $moneyType = '';
        return $moneyType . number_format($value, $decimal, '.', ',');
    }

    public static function toNumber($valor)
    {
        $result = str_replace(self::PONTO, "", $valor);
        $result = str_replace(self::VIRGULA, "", $result);
        return number_format($result, 2,',','.');
    }
    public static function toFloatTeste($valor)
    {
       $result = str_replace(self::REAL, "", $valor);
       $result2 = str_replace(self::DOLLAR, "", $result);
        $result3 = str_replace(self::VIRGULA, ".", $result2);
        $result3 = str_replace(" ", "", $result3);

        return   number_format($result3,2);
    }



}