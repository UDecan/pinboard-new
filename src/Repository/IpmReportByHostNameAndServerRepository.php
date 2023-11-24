<?php

namespace App\Repository;

use App\Entity\IpmReportByHostNameAndServer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IpmReportByHostNameAndServer>
 *
 * @method IpmReportByHostNameAndServer|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpmReportByHostNameAndServer|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpmReportByHostNameAndServer[]    findAll()
 * @method IpmReportByHostNameAndServer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpmReportByHostNameAndServerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpmReportByHostNameAndServer::class);
    }

//    /**
//     * @return IpmReportByHostNameAndServer[] Returns an array of IpmReportByHostNameAndServer objects
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

//    public function findOneBySomeField($value): ?IpmReportByHostNameAndServer
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
