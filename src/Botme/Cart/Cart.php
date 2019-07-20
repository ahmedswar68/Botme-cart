<?php

namespace App\Botme\Cart;


interface Cart
{
    function add($product);

    function update($productId, $quantity);

    function delete($productId);

    function emptyCart();

    function listItems();
}