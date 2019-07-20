<?php

namespace App\Controller;

use App\Entity\Item;
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
    public function index(RegistryInterface $ri)
    {
        $items=new ItemRepository($ri);
        $items=$items->getAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'items' => $items,
        ]);
    }
}
