<?php

namespace App\Controller;

use App\Botme\Cart\Cart;
use App\Botme\Cart\CartImplementation;
use App\Botme\Cart\OrderCart;
use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $cart;

    public function __construct()
    {
//        die('fffff');
//        $this->cart = $cart;
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    /**
     * @param Item $id
     * @param EntityManagerInterface $em
     * @Route("/add-to-order-cart/{id}", name="add-to-order-cart")
     */
    public function addToOrderCart(Item $item, EntityManagerInterface $em)
    {
        $orderCart = new OrderCart();
        $orderCart->add($item,$em);
        return $this->redirectToRoute('home');
    }

    /**
     * @param Item $id
     * @param EntityManagerInterface $em
     * @Route("/add-to-wishlist-cart/{id}", name="add-to-wishlist-cart")
     */
    public function addToWishList(Item $item, EntityManagerInterface $em)
    {
    }
}
