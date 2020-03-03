<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="app_index")
     */
    public function index()
    {
        $page = new Page();
        $page->setName('Ma Page')
                ->setDescription('Ma descrioption')
                ->setBody('My Body');

        return $this->render('app/index.html.twig', [
            'title' => 'Page Home',
            'page' => $page
        ]);
    }

    /**
     * @Route("/cgv", methods={"GET"}, name="app_cgv")
     */
    public function cgv()
    {
        return $this->render('app/cgv.html.twig', [
            'title' => 'Conditions générales de ventes'
        ]);
    }

    /**
     * @Route("/about_us", methods={"GET"}, name="app_about")
     */
    public function about()
    {
        return $this->render('app/about.html.twig', [
            'title' => 'A propos de nous'
        ]);
    }
}
