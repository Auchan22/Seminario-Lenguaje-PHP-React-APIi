<?php
    include("Repository/ItemsRepository.php");

    $ir = new ItemsRepository();
    $res = $ir->getItemImageById($_GET["id_item"]);

    header("Content-type: jpg");

    echo $res["foto"];

    ?>