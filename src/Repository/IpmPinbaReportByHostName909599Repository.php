<?php

namespace App\Repository;

use App\Entity\IpmPinbaReportByHostName909599;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IpmPinbaReportByHostName909599>
 *
 * @method IpmPinbaReportByHostName909599|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpmPinbaReportByHostName909599|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpmPinbaReportByHostName909599[]    findAll()
 * @method IpmPinbaReportByHostName909599[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpmPinbaReportByHostName909599Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpmPinbaReportByHostName909599::class);
    }

//    /**
//     * @return IpmPinbaReportByHostName909599[] Returns an array of IpmPinbaReportByHostName909599 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IpmPinbaReportByHostName909599
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
