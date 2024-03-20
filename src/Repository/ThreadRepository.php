<?php

namespace App\Repository;

use App\Entity\Thread;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Thread>
 *
 * @method Thread|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thread|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thread[]    findAll()
 * @method Thread[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThreadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thread::class);
    }

    public function findBySelection($valueArr)
    {
        $queryBuilder =   $this->createQueryBuilder('t');

        if(!empty($valueArr['category'])){
            $queryBuilder->andWhere('t.category = :category')
                ->setParameter('category', $valueArr['category']);
        }
        if(!empty($valueArr['user'])){
            $queryBuilder->andWhere('t.user = :user')
                ->setParameter('user', $valueArr['user']);
        }

        $thread = $queryBuilder-> orderBy('t.id', 'DESC')
                ->getQuery()
                ->getResult();

        return $thread;
    }

//    /**
//     * @return Thread[] Returns an array of Thread objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Thread
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
