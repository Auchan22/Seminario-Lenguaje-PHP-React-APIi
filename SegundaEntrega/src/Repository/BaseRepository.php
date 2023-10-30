<?php
namespace App\Repository;
abstract class BaseRepository{
    protected $link_conn;
    public function __construct()
    {
        global $conn;
        $this->link_conn = $conn;
    }
}