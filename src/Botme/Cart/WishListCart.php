<?php

namespace App\Botme\Cart;

class WishListCart extends CartImplementation
{
    private $type = 'wish-list';

    function cartType()
    {
        return $this->type;
    }
}