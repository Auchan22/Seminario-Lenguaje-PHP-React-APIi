<?php
namespace App\Validator;
trait ItemsValidator {
    public function validateNombre(string $nombre): bool
    {
        //Con preg_match testeo un string para ver si cumple con cierto patron
        return preg_match('/[^0-9]/', $nombre) != 0 && strlen($nombre) > 0;
    }

    public function validateTipo(string $tipo): bool{
        return !preg_match('/[^0-9]/', $tipo) && strlen($tipo) > 0 && $tipo == "COMIDA" || $tipo == "BEBIDA";
    }

    public function validatePrecio(int $precio): bool{
        return $precio > 0;
    }

    public function validateImagen(string $imagen): bool{
        return strlen($imagen) > 0;
    }
}