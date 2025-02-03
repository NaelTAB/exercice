<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\BookService;
use App\Form\BookType;

class BookController extends AbstractController
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    #[Route('/books', name: 'book_list')]
    public function list(): Response
    {
        $books = $this->bookService->getAllBooks();
        return $this->render('book/index.html.twig', ['books' => $books]);
    }

    #[Route('/book/new', name: 'book_new')]
    public function new(Request $request): Response
    {
        $form = $this->createForm(BookType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->bookService->addBook($form->getData());
            return $this->redirectToRoute('book_list');
        }
        
        return $this->render('book/new.html.twig', ['form' => $form->createView()]);
    }
}