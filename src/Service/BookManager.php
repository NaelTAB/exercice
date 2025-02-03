<?php
namespace App\Service;

class BookManager
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['books'])) {
            $_SESSION['books'] = [
                [
                    "id" => "1",
                    "title" => "Le Petit Prince",
                    "author" => "Antoine de Saint-Exupéry",
                    "year" => "1943",
                    "description" => "Un livre poétique et philosophique pour enfants et adultes.",
                    "imageUrl" => "https://example.com/cover.jpg"
                ]
            ];
        }
    }

    public function getBooks(): array
    {
        return $_SESSION['books'];
    }

    public function addBook(string $title, string $author, string $year, string $description, string $imageUrl = ""): void
    {
        $newBook = [
            "id" => uniqid(),
            "title" => $title,
            "author" => $author,
            "year" => $year,
            "description" => $description,
            "imageUrl" => $imageUrl
        ];
        $_SESSION['books'][] = $newBook;
    }

    public function editBook(string $id, string $title, string $author, string $year, string $description, string $imageUrl = ""): void
    {
        foreach ($_SESSION['books'] as &$book) {
            if ($book['id'] === $id) {
                $book['title'] = $title;
                $book['author'] = $author;
                $book['year'] = $year;
                $book['description'] = $description;
                $book['imageUrl'] = $imageUrl;
                break;
            }
        }
    }

    public function deleteBook(string $id): void
    {
        $_SESSION['books'] = array_filter($_SESSION['books'], function ($book) use ($id) {
            return $book['id'] !== $id;
        });
    }
}
