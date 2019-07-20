<?php

namespace App\Botme\Cart;


use Doctrine\ORM\EntityManagerInterface;

interface Cart
{
    function add($product,EntityManagerInterface $em);

    function update($productId, $quantity);

    function delete($productId);

    function emptyCart();

    function listItems(EntityManagerInterface $em);
}