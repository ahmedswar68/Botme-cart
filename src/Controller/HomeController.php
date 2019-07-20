<?php

namespace App\Controller;

use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(EntityManagerInterface $em)
    {
        $repo = $em->getRepository(Item::class);
        $items = $repo->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'items' => $items,
        ]);
    }
}
