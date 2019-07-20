<?php

namespace App\Botme\Cart;

use App\Entity\Cart as CartModel;
use Doctrine\ORM\EntityManagerInterface;

class OrderCart implements Cart
{
    const ORDER_CART = 'order cart';

    function add($product, EntityManagerInterface $em)
    {
        $cartItem = $this->getCartItem($product, $em);
        if (is_null($cartItem)) {
            $cart = new CartModel();
            $cart->setItemId($product->getId());
            $cart->setQuantity(1);
            $cart->setType(self::ORDER_CART);
            $em->persist($cart);
            $em->flush();
        } else {
            $cartItem->setQuantity($cartItem->getQuantity() + 1);
            $em->flush();
        }
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
        $repo = $em->getRepository(CartModel::class);
        return $repo->findBy(['type' => self::ORDER_CART]);
    }

    private function getCartItem($product, EntityManagerInterface $em)
    {
        $repo = $em->getRepository(CartModel::class);
        return $repo->findOneBy(['item_id' => $product->getId(), 'type' => self::ORDER_CART]);
    }
}