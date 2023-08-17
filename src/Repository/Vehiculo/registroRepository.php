<?php

namespace App\Repository\Vehiculo;

use App\Entity\Vehiculo\registro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<registro>
 *
 * @method registro|null find($id, $lockMode = null, $lockVersion = null)
 * @method registro|null findOneBy(array $criteria, array $orderBy = null)
 * @method registro[]    findAll()
 * @method registro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class registroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, registro::class);
    }

//    /**
//     * @return registro[] Returns an array of registro objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?registro
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
