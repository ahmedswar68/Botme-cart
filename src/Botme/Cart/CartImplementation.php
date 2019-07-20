<?php


namespace App\Botme\Cart;


abstract class CartImplementation implements Cart
{
    function add($product)
    {
        // TODO: Implement add() method.
    }

    function update($productId, $quantity)
    {
        // TODO: Implement update() method.
    }

    function delete($productId)
    {
        // TODO: Implement delete() method.
    }

    function emptyCart()
    {
        // TODO: Implement emptyCart() method.
    }

    abstract function listItems();
}