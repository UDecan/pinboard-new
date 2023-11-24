<?php

namespace App\Repository;

use App\Entity\IpmPinbaReportByHostNameAndServer909599;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IpmPinbaReportByHostNameAndServer909599>
 *
 * @method IpmPinbaReportByHostNameAndServer909599|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpmPinbaReportByHostNameAndServer909599|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpmPinbaReportByHostNameAndServer909599[]    findAll()
 * @method IpmPinbaReportByHostNameAndServer909599[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpmPinbaReportByHostNameAndServer909599Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpmPinbaReportByHostNameAndServer909599::class);
    }

//    /**
//     * @return IpmPinbaReportByHostNameAndServer909599[] Returns an array of IpmPinbaReportByHostNameAndServer909599 objects
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

//    public function findOneBySomeField($value): ?IpmPinbaReportByHostNameAndServer909599
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
