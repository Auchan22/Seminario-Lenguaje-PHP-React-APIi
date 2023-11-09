<?php

namespace App\Validator;
use App\Repository\ItemsRepository;

trait PedidosValidator
{

    public function validateMesa(int $mesa): bool
    {
        return $mesa > 0;
    }

    public function validateItem(int $id_item): bool
    {
        $ir = new ItemsRepository();
        $res = $ir->getItemById($id_item);

        return count($res) > 0;
    }
}