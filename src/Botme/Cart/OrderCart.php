<?php

namespace App\Botme\Cart;

use App\Entity\Cart as CartModel;
use Doctrine\ORM\EntityManagerInterface;

class OrderCart implements Cart
{
    const ORDER_CART = 'order cart';
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    function add($product)
    {
        $cartItem = $this->getCartItem($product);
        if (is_null($cartItem)) {
            $cart = new CartModel();
            $cart->setItem($product);
            $cart->setQuantity(1);
            $cart->setType(self::ORDER_CART);
            $this->em->persist($cart);
            $this->em->flush();
        } else {
            $cartItem->setQuantity($cartItem->getQuantity() + 1);
            $this->em->flush();
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

    function listItems()
    {
        $repo = $this->em->getRepository(CartModel::class);
        return $repo->findBy(['type' => self::ORDER_CART]);
    }

    function getCartItem($product)
    {
        $repo = $this->em->getRepository(CartModel::class);
        return $repo->findOneBy(['item' => $product, 'type' => self::ORDER_CART]);
    }
}