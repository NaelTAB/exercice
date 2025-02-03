<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


class Borrowing
{
   
    private int $id;
    
    private Book $book;
   
    private User $user;
  
    private \DateTime $borrowDate;
}
