<?php

namespace App\Repository;

use App\Entity\AbsenceEnseignant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AbsenceEnseignant|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbsenceEnseignant|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbsenceEnseignant[]    findAll()
 * @method AbsenceEnseignant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbsenceEnseignantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbsenceEnseignant::class);
    }

    // /**
    //  * @return AbsenceEnseignant[] Returns an array of AbsenceEnseignant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AbsenceEnseignant
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
