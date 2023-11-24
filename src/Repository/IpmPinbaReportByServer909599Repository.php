<?php

namespace App\Repository;

use App\Entity\IpmPinbaReportByServer909599;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IpmPinbaReportByServer909599>
 *
 * @method IpmPinbaReportByServer909599|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpmPinbaReportByServer909599|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpmPinbaReportByServer909599[]    findAll()
 * @method IpmPinbaReportByServer909599[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpmPinbaReportByServer909599Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpmPinbaReportByServer909599::class);
    }

//    /**
//     * @return IpmPinbaReportByServer909599[] Returns an array of IpmPinbaReportByServer909599 objects
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

//    public function findOneBySomeField($value): ?IpmPinbaReportByServer909599
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
