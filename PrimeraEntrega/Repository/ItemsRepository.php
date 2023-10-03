<?php

require("BaseRepository.php");
class ItemsRepository extends BaseRepository {
    public function getItems(){
        $query = "SELECT * FROM items ";
        $result = mysqli_query($this->link_conn, $query);

        var_dump($result);

        return mysqli_fetch_array($result) ?? []; // fetchea el resultado y lo pone en un array 
    }

}