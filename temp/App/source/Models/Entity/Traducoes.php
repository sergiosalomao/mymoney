<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 19:07
 */

class Traducoes
{
    private $id;
    private $nome;
    private $idioma;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * @param mixed $idioma
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }
}