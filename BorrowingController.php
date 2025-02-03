<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Borrowing;
use Doctrine\ORM\EntityManagerInterface;

class BorrowingController extends AbstractController
{
    public function list(EntityManagerInterface $entityManager): Response
    {
        $borrowings = $entityManager->getRepository(Borrowing::class)->findAll();
        return $this->render('borrowing/index.html.twig', ['borrowings' => $borrowings]);
    }
}
