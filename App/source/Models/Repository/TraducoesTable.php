<?php


class TraducoesTable extends PRESTO_Tables
{
    protected $_schema = 'public';
    protected $_table = 'traducoes';

    public function listTraducoesIdioma($params = null){
        $sql = "SELECT 
                i.descricao AS idioma,
                t.id AS id,
                t.chave AS chave,
                t.descricao AS traducao 
                FROM {$this->_table} t 
                INNER JOIN idiomas i ON i.id = t.idioma_id";

        $sql .= isset($params['order']) && !Empty($params['order']) ? " ORDER BY {$params['order']}" : "";
        $sql .= isset($params['offset']) && !Empty($params['offset']) ? " OFFSET {$params['offset']}" : "";
        $sql .= isset($params['limit']) && !Empty($params['limit']) ? " LIMIT {$params['limit']}" : "";
        $sql .= isset($params['where']) && !Empty($params['where']) ? " WHERE 1=1 AND {$params['where']}" : "";

        $st = $this->_connection->prepare($sql);
        $st->execute();
        return $st->fetchAll();
    }

}