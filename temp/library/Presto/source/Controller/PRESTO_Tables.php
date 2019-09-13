<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 30/03/2019
 * Time: 01:23
 */

class PRESTO_Tables implements PRESTO_Tables_Interface
{
    protected $_connection;
    protected $_table;
    protected $_schema;

    public function __construct()
    {
        $con = new PRESTO_Database();
        $this->_connection = $con->getConnection();
    }

    public function getAll($params = null)
    {
        $sql = "SELECT * FROM {$this->_schema}.{$this->_table} ";
        $sql .= isset($params['group']) && !Empty($params['group']) ? " GROUP BY {$params['group']}" : "";
        $sql .= isset($params['order']) && !Empty($params['order']) ? " ORDER BY {$params['order']}" : "";
        $sql .= isset($params['offset']) && !Empty($params['offset']) ? " OFFSET {$params['offset']}" : "";
        $sql .= isset($params['limit']) && !Empty($params['limit']) ? " LIMIT {$params['limit']}" : "";
          $sql .= isset($params['where']) && !Empty($params['where']) ? " WHERE 1=1 AND {$params['where']}" : "";

        $st = $this->_connection->prepare($sql);
        $st->execute();
        return $st->fetchAll();
    }


    public function save($fieldsTable)
    {

        if (isset($fieldsTable['id']))
        $id = $fieldsTable['id'];
       if ($id != '' ) {
           $fields = null;
                $values = null;
                foreach ( $fieldsTable as $field => $value) {
                    $value = (is_numeric($value) || $value == 'default' ? (double)$value : "'{$value}'");
                    if (is_string($field)){

                        $fields .= "{$field} = {$value},";
                    }

                }
                  $fields = substr_replace($fields, '', -1);
                  $sql = "UPDATE {$this->_schema}.{$this->_table} SET {$fields} WHERE id= {$id}";
            }


        if ($id == 'default' || $id == NULL) {
         $fields = null;
            $values = null;
            foreach ($fieldsTable as $field => $value) {
                $fields .= "{$field},";
              if ($field == 'id' && $value == "") $value = 'default';

              if (is_numeric($value)){ (double)$value;}
                 $values .= ( $value == 'default' ? "{$value}," : "'{$value}',");
            }
            $fields = substr_replace($fields, '', -1);
            $values = substr_replace($values, '', -1);
             $sql = "INSERT INTO {$this->_schema}.{$this->_table} ({$fields}) VALUES ({$values})";
        }

        $st = $this->_connection->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->_schema}.{$this->_table} WHERE id = {$id}";
        $st = $this->_connection->prepare($sql);
        $st->execute();
    }

    public function getTotalRecords()
    {
        $st = $this->_connection->prepare("SELECT count(*) FROM {$this->_table}");
        $st->execute();
        return $st->fetch();
    }


}