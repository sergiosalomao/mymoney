<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 19:07
 */

class Contas
{
   private $id;
   private $banco_id;
   private $agencia;
    private $conta;
    private $tipo;

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
    public function getBancoId()
    {
        return $this->banco_id;
    }

    /**
     * @param mixed $banco_id
     */
    public function setBancoId($banco_id)
    {
        $this->banco_id = $banco_id;
    }

    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }

    /**
     * @return mixed
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param mixed $conta
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }


}