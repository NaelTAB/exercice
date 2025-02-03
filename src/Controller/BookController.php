<?php

// src/Controller/BookController.php
namespace App\Controller;

use App\Service\BookManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController

{
    private BookManager $bookManager;
    public function __construct(BookManager $bookManager)
    {
        
        $this->bookManager = $bookManager;
    }

    #[Route('/book', name: 'book_index')]
    public function list(): Response
    {
        $books = $this->bookManager->getBooks();
        return $this->render('book/list.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/books/add", name="book_add", methods={"POST"})
     */
    public function add(Request $request): Response
    {
        $title = $request->request->get('title');
        $author = $request->request->get('author');
        $year = $request->request->get('year');
        $description = $request->request->get('description');
        $imageUrl = $request->request->get('imageUrl');

        $this->bookManager->addBook($title, $author, $year, $description, $imageUrl);

        return $this->redirectToRoute('book_list');
    }

    /**
     * @Route("/books/edit/{id}", name="book_edit", methods={"POST"})
     */
    public function edit(Request $request, int $id): Response
    {
        $title = $request->request->get('title');
        $author = $request->request->get('author');
        $year = $request->request->get('year');
        $description = $request->request->get('description');
        $imageUrl = $request->request->get('imageUrl');

        $this->bookManager->editBook($id, $title, $author, $year, $description, $imageUrl);

        return $this->redirectToRoute('book_list');
    }

    /**
     * @Route("/books/delete/{id}", name="book_delete", methods={"POST"})
     */
    public function delete(int $id): Response
    {
        $this->bookManager->deleteBook($id);
        return $this->redirectToRoute('book_list');
    }
}
?>