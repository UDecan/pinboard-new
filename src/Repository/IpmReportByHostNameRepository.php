<?php

namespace App\Repository;

use App\Entity\IpmReportByHostName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IpmReportByHostName>
 *
 * @method IpmReportByHostName|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpmReportByHostName|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpmReportByHostName[]    findAll()
 * @method IpmReportByHostName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpmReportByHostNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpmReportByHostName::class);
    }

//    /**
//     * @return IpmReportByHostName[] Returns an array of IpmReportByHostName objects
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

//    public function findOneBySomeField($value): ?IpmReportByHostName
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
