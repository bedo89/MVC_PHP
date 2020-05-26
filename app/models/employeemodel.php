<?php

namespace PHPMVC\Models;

class EmployeeModel extends AbstractModel
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $salary;
    public $tax;
    public $gender;
    public $type;
    public $os;
    public $notes;


    protected static $tableName = "employees";
    protected static $tableSchema = array(
        'name'      => self::DATA_TYPE_STR,
        'age'       => self::DATA_TYPE_INT,
        'address'   => self::DATA_TYPE_STR,
        'tax'       => self::DATA_TYPE_DECIMAL,
        'salary'    => self::DATA_TYPE_DECIMAL,
        'gender'    => self::DATA_TYPE_INT,
        'type'      => self::DATA_TYPE_INT,
        'os'        => self::DATA_TYPE_STR,
        'notes'     => self::DATA_TYPE_STR
    );

    protected static $primaryKey = "id";

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function getTableName()
    {
        return self::$tableName;
    }
}
