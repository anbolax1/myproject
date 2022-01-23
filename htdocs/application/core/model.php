<?php
include 'db_connector.php';
class Model
{
    protected $db = null;

    public function __construct()
    {
        $this->db = DBConnector::conn_to_db();
    }

    public function get_data()
    {
    }
}