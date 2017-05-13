<?php

/**
 * Class DB_Connect
 */
class DB_Connect
{
    /**
     * constructor
     */
    function __construct()
    {
        $this->connect();
    }

    /**
     * destructor
     */
    function __destruct()
    {
        $this->close();
    }

    /**
     * Connecting to database
     * @return resource
     */
    public function connect()
    {
        require_once __DIR__ . '/Config.php';
        // Connecting to mysql database
        $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());
        // selecting target database
        mysql_select_db(DB_DATABASE, $con);
        // set all row's names to UTF-8 format
        mysql_query("SET NAMES 'utf8'", $con);
        // Selecting database
        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
        // returning connection cursor
        return $con;
    }

    /**
     * Closing database connection
     */
    public function close()
    {
        mysql_close();
    }
}