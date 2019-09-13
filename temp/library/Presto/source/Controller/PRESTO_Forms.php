<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 30/03/2019
 * Time: 13:34
 */

class PRESTO_Forms extends PRESTO_Controller implements PRESTO_Forms_Interface
{
    public function __construct()
    {

    }

    public function entitycreate($fieldsTable)
    {
        $entity = new $this->_table();
        foreach ($fieldsTable as $field => $value) {
            $fieldSet = "set{$field}";
            $fieldFinal = str_replace('_', "", $fieldSet);
            $entity->$fieldFinal("'{$value}'");
        }
        return $entity;
    }

    public function populate($fieldsTable)
    {

        foreach ($fieldsTable[0] as $field => $value) {


            $field = new PRESTO_Components_InputText("{$field}");

            $field->setName($value);
            $field->setLabel($value);
            $field->setPlaceHolder("tamo junto");
            $this->fieldxx = $field->addElement($field);

        }

    }
}