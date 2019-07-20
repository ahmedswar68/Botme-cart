<?php


namespace App\Botme\Cart;


use Doctrine\ORM\EntityManagerInterface;

abstract class CartImplementation //implements Cart
{
    /**
     * @param $product
     * @param EntityManagerInterface $em
     */
    function add($product,EntityManagerInterface $em)
    {

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

    function listItems(EntityManagerInterface $em)
    {
        // TODO: Implement listItems() method.
    }


}