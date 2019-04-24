<?php


class LancamentosTable extends PRESTO_Tables
{
    protected $_schema = 'public';
    protected $_table = 'lancamentos';


    public function listLancamentos($params = null)
    {
        $sql = "SELECT 
       l.id as id,
	   c.id as conta_id,
       cc.id as centro_custo_id,
       f.id as fluxo_id,
       f.codigo as fluxo_codigo,
	   l.tipo as tipo,
	   l.data_lancamento as data_lancamento,
	   l.descricao as descricao,
	   l.valor as valor,
	   l.saldo as saldo,
	   c.conta as conta,
	   c.agencia as agencia,  
	   b.numero as banco,
	   cc.descricao as centrocusto,
	   f.descricao as fluxo
	   FROM {$this->_table} l
       INNER JOIN contas c ON c.id = l.conta_id
	   INNER JOIN bancos b ON b.id = c.banco_id
	   INNER JOIN fluxos f ON f.id = l.fluxo_id
	   INNER JOIN centrocusto cc ON cc.id = l.centro_custo_id";
        $sql .= isset($params['where']) && !Empty($params['where']) ? " WHERE 1=1 AND {$params['where']}" : "";
        $sql .= isset($params['group']) && !Empty($params['group']) ? " GROUP BY {$params['group']}" : "";
        $sql .= isset($params['order']) && !Empty($params['order']) ? " ORDER BY {$params['order']}" : "";
        $sql .= isset($params['offset']) && !Empty($params['offset']) ? " OFFSET {$params['offset']}" : "";
        $sql .= isset($params['limit']) && !Empty($params['limit']) ? " LIMIT {$params['limit']}" : "";



        $st = $this->_connection->prepare($sql);
        $st->execute();
        return $st->fetchAll();
    }

    public function lancamentoSaldoAnterior($id)
    {
        $id--;
        $sql = "SELECT (select saldo from lancamentos where id = {$id}) as saldoanterior from lancamentos l";
        $st = $this->_connection->prepare($sql);
        $st->execute();
        return $st->fetch();
    }


}