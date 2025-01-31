<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LuckyController extends AbstractController
{
    #[Route('/lucky/number', name: 'app_lucky_number')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('home/lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}