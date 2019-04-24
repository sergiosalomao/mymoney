<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 25/03/2019
 * Time: 19:07
 */

class Lancamentos
{
    private $id;
    private $tipo;
    private $data_lancamento;
    private $descricao;
    private $conta_id;
    private $fluxo_id;
    private $valor;
    private $saldo;

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

    /**
     * @return mixed
     */
    public function getDataLancamento()
    {
        return $this->data_lancamento;
    }

    /**
     * @param mixed $data_lancamento
     */
    public function setDataLancamento($data_lancamento)
    {
        $this->data_lancamento = $data_lancamento;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getContaId()
    {
        return $this->conta_id;
    }

    /**
     * @param mixed $conta_id
     */
    public function setContaId($conta_id)
    {
        $this->conta_id = $conta_id;
    }

    /**
     * @return mixed
     */
    public function getFluxoId()
    {
        return $this->fluxo_id;
    }

    /**
     * @param mixed $fluxo_id
     */
    public function setFluxoId($fluxo_id)
    {
        $this->fluxo_id = $fluxo_id;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * @param mixed $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

}