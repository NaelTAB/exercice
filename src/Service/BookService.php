<?php
namespace App\Service;

class BookService
{
    private string $filePath = __DIR__ . '/../../data/books.json';

    public function getAllBooks(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = file_get_contents($this->filePath);
        return json_decode($data, true)['books'] ?? [];
    }

    public function addBook(array $bookData): void
    {
        $books = $this->getAllBooks();
        $bookData['id'] = count($books) + 1;
        $books[] = $bookData;
        file_put_contents($this->filePath, json_encode(['books' => $books], JSON_PRETTY_PRINT));
    }
}
