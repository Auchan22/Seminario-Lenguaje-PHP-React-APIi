<?php

require_once("db/conexionDB.php");
abstract class BaseRepository{
    protected $link_conn;
    public function __construct()
    {
        global $conn;
        $this->link_conn = $conn;
    }
}