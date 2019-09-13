<?php


class SecurityService
{

    public static function createhashSha1($password)
    {
        return trim(password_hash($password, CRYPT_SHA512));
    }

    public static function compareSha1Password($password,$CRYPT_SHA512)
    {
        $passCheck = (password_verify(trim($password), trim($CRYPT_SHA512)));
        return $passCheck;
    }


    public static function createhashArgon2($password)
    {
        return trim(password_hash($password, PASSWORD_DEFAULT));
    }

    public static function compareArgonPassword($password, $PASSWORD_ARGON2I)
    {
        $passCheck = (password_verify(trim($password), trim($PASSWORD_ARGON2I)));
        return $passCheck;
    }
}