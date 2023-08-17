<?php

namespace App\Repository\Vehiculo;

use App\Entity\Vehiculo\vehiculo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<vehiculo>
 *
 * @method vehiculo|null find($id, $lockMode = null, $lockVersion = null)
 * @method vehiculo|null findOneBy(array $criteria, array $orderBy = null)
 * @method vehiculo[]    findAll()
 * @method vehiculo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class vehiculoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, vehiculo::class);
    }

//    /**
//     * @return vehiculo[] Returns an array of vehiculo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?vehiculo
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
