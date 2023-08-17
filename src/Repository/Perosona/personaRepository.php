<?php

namespace App\Repository\Perosona;

use App\Entity\Perosona\persona;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<persona>
 *
 * @method persona|null find($id, $lockMode = null, $lockVersion = null)
 * @method persona|null findOneBy(array $criteria, array $orderBy = null)
 * @method persona[]    findAll()
 * @method persona[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class personaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, persona::class);
    }

//    /**
//     * @return persona[] Returns an array of persona objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?persona
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
