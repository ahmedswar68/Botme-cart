<?php

namespace App\Botme\Cart;

class OrderCart extends CartImplementation
{
    private $type = 'order cart';

    function cartType()
    {
        return $this->type;
    }

}