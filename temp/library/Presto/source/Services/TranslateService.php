<?php


class TranslateService
{
    private $language_id = 2;


    public function __construct()
    {

    }

    public function getLanguage()
    {
        return $this->language_id;
    }

    public function setLanguage($language_id)
    {
        $this->language_id = $language_id;
    }


    public function getTranslateKey($text)
    {
        #se a sessao nao existir faz o select
        if (!isset($_SESSION["translate_cache"]) || Empty($_SESSION["translate_cache"])) {
            $traducoesTable = new TraducoesTable();
            $translate = $traducoesTable->getAll();


            $_SESSION["translate_cache"] = $translate;
        }

        foreach ($_SESSION["translate_cache"] as $key => $val) {
            if ($val['chave'] === $text) {
                return $val['descricao'];
            }
        }
        return $text;
    }
}