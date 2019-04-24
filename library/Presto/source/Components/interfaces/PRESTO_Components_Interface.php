<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 23/03/2019
 * Time: 14:08
 */

interface PRESTO_Components_Interface
{
    public function __construct($name);
    public function getId();
    public function setId($id);

    public function getName();
    public function setName($name);

    public function getStyles();
    public function setStyles($styles);

    public function getClass();
    public function setClass($Class);

    public function getTitle();
    public function setTitle($title);

    public function addElement($obj);

}