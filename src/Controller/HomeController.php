<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\CartRepository;
use App\Repository\ItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(ItemRepository $repository,CartRepository $cartRepository)
    {
        $orderCartItems=$cartRepository->findByCartType('order cart');
        $items=$repository->getAll();
        return $this->render('home/index.html.twig', [
            'items' => $items,
            'order_cart_items' => $orderCartItems,
            'order_cart_count'=>count($orderCartItems)
        ]);
    }
}
