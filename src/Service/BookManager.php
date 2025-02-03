<?php
// src/Service/BookManager.php
namespace App\Service;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

class BookManager
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getBooks(): array
    {
        return $this->entityManager->getRepository(Book::class)->findAll();
    }

    public function addBook(string $title, string $author, int $year, string $description, ?string $imageUrl = null): void
    {
        $book = new Book();
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setYear($year);
        $book->setDescription($description);
        $book->setImageUrl($imageUrl);

        $this->entityManager->persist($book);
        $this->entityManager->flush();
    }

    public function editBook(int $id, string $title, string $author, int $year, string $description, ?string $imageUrl = null): void
    {
        $book = $this->entityManager->getRepository(Book::class)->find($id);

        if ($book) {
            $book->setTitle($title);
            $book->setAuthor($author);
            $book->setYear($year);
            $book->setDescription($description);
            $book->setImageUrl($imageUrl);

            $this->entityManager->flush();
        }
    }

    public function deleteBook(int $id): void
    {
        $book = $this->entityManager->getRepository(Book::class)->find($id);

        if ($book) {
            $this->entityManager->remove($book);
            $this->entityManager->flush();
        }
    }
}
?>