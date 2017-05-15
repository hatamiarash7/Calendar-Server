<?php

/**
 * Class DB_Functions
 */
class DB_Functions
{
    private $db;

    // constructor
    function __construct()
    {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct()
    {
    }

    public function GetEvents()
    {
        $response = array();
        $result = mysql_query("SELECT * FROM cl_events") or die(mysql_error());
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result)) {
                $event = array();
                $event["unique_id"] = $row["unique_id"];
                $event["year"] = $row["year"];
                $event["month"] = $row["month"];
                $event["day"] = $row["day"];
                $event["title"] = $row["title"];
                $event["holiday"] = $row["holiday"];
                array_push($response, $event);
            }
            return $response;
        } else
            return false;
    }
}