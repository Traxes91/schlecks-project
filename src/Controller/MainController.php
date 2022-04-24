<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route('/', name: 'home.page')]
    public function homepage(): Response
    {
        return $this->render('schlecks/home.html.twig');
    }

    #[Route('/ice', name: 'ice.page')]
    public function addIce(): Response
    {
        $words = ['sky', 'cloud', 'wood', 'rock', 'forest',
            'mountain', 'breeze'];

        return $this->render('schlecks/ice.html.twig', [
            'words' => $words
        ]);
    }

}