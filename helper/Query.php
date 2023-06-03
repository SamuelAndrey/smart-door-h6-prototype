<?php

class query
{

    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public static function querySelect()
    {
    }
}
