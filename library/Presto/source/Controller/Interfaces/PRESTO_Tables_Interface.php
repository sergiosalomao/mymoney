<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 30/03/2019
 * Time: 09:08
 */

interface PRESTO_Tables_Interface
{
    public function getAll($params);
    public function save($fieldsTable);
    public function delete($id);
    public function getTotalRecords();

}