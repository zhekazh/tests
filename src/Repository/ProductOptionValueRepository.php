<?php

namespace App\Repository;

use App\Entity\ProductOptionValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductOptionValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductOptionValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductOptionValue[]    findAll()
 * @method ProductOptionValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductOptionValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductOptionValue::class);
    }
}
