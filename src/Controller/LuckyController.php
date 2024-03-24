<?php

namespace App\Controller;

use Random\RandomException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{
    /**
     * @throws RandomException
     */
    #[Route('/lucky/number', name: 'app_lucky', methods: ['GET'])]
    public function number(): Response
    {
        $randomInt = random_int(1, 10);
        return $this->render('lucky/index.html.twig', [
            'controller_name' => 'Lol'
        ]);
    }
}
