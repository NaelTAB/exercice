<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BorrowingController extends AbstractController
{
    
    public function list(): Response
    {
        return $this->render('borrowing/index.html.twig');
    }
}
