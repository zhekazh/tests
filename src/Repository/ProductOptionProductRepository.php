<?php

namespace App\Repository;

use App\Entity\ProductOptionProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductOptionProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductOptionProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductOptionProduct[]    findAll()
 * @method ProductOptionProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductOptionProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductOptionProduct::class);
    }
}
