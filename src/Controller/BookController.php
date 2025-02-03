<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookController extends AbstractController{
   #[Route('/book', name: 'book_single')]
public function single(): Response
{
    return new Response('Page d\'un seul livre');
}

    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
}
