<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


class Book
{
    
    private int $id;
   
    private string $title;
   
    private string $author;
   
    private bool $available;
}