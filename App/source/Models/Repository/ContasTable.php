<?php


class ContasTable extends PRESTO_Tables
{
    protected $_schema = 'public';
    protected $_table = 'contas';


    public function listContasBancos($params = null){
        $sql = "SELECT b.descricao as bancoNome,
                       c.id as id,
                       c.agencia as agencia,
                       c.conta as conta,
                       c.tipo as tipo
                FROM {$this->_table} c ";
        $sql.= "INNER JOIN bancos b ON b.id = c.banco_id";

        $sql .= isset($params['order']) && !Empty($params['order']) ? " ORDER BY {$params['order']}" : "";
        $sql .= isset($params['offset']) && !Empty($params['offset']) ? " OFFSET {$params['offset']}" : "";
        $sql .= isset($params['limit']) && !Empty($params['limit']) ? " LIMIT {$params['limit']}" : "";
         $sql .= isset($params['where']) && !Empty($params['where']) ? " WHERE 1=1 AND {$params['where']}" : "";

        $st = $this->_connection->prepare($sql);
        $st->execute();
        return $st->fetchAll();
    }


}