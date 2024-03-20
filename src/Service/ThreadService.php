<?php
namespace App\Service;

use App\Entity\ArticleLog;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ThreadService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

}