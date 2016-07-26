<?php
/**
 * Abstract class which has helper functions to get data from the database
 */
abstract class Prog_Custom_Data
{
    /**
     * The current table name
     *
     * @var boolean
     */
    private $tableName = false;

    /**
     * Constructor for the database class to inject the table name
     *
     * @param String $tableName - The current table name
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }
}