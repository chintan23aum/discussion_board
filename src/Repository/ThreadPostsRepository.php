<?php

namespace App\Repository;

use App\Entity\ThreadPosts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ThreadPosts>
 *
 * @method ThreadPosts|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThreadPosts|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThreadPosts[]    findAll()
 * @method ThreadPosts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThreadPostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThreadPosts::class);
    }

//    /**
//     * @return ThreadPosts[] Returns an array of ThreadPosts objects
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

//    public function findOneBySomeField($value): ?ThreadPosts
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
