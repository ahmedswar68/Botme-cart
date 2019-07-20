<?php

namespace App\Controller;

use App\Botme\Cart\Cart;
use App\Botme\Cart\CartImplementation;
use App\Botme\Cart\OrderCart;
use App\Botme\Cart\WishListCart;
use App\Entity\Item;
use App\Repository\CartRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     * @param CartRepository $cartRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CartRepository $cartRepository)
    {
        $orderCartItems = $cartRepository->findByCartType('order cart');
        return $this->render('cart/index.html.twig', [
            'order_cart_items' => $orderCartItems,
            'order_cart_count' => count($orderCartItems)
        ]);
    }

    /**
     * @param Item $id
     * @param EntityManagerInterface $em
     * @Route("/add-to-order-cart/{id}", name="add-to-order-cart")
     */
    public function addToOrderCart(Item $item, EntityManagerInterface $em)
    {
        $orderCart = new OrderCart($em);
        $orderCart->add($item);
        $this->addFlash('success', 'Your Product has been added to the Order Cart successfully ');
        return $this->redirectToRoute('home');
    }

    /**
     * @param Item $id
     * @param EntityManagerInterface $em
     * @Route("/add-to-wishlist-cart/{id}", name="add-to-wishlist-cart")
     */
    public function addToWishList(Item $item, EntityManagerInterface $em)
    {
        $wishCart = new WishListCart($em);
        $wishCart->add($item);
        $this->addFlash('success', 'Your Product has been added to the wish-list successfully ');
        return $this->redirectToRoute('home');
    }
}
