<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findMostSoldProducts()
    {
        return $this->createQueryBuilder('p')
            ->select('p.name as productName, SUM(o.amount) as soldAmount, SUM(o.amount * p.price) as soldSum')
            ->leftJoin('App\Entity\Order', 'o', 'WITH', 'o.product_id = p.id')
            ->groupBy('p.id')
            ->orderBy('soldAmount', 'DESC')
            ->getQuery()
            ->getResult();
    }
    public function getSalesDataForProduct($productId)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.name', 'SUM(o.amount) as totalAmount', 'COUNT(o) as totalQuantity')
            ->leftJoin('App\Entity\Order', 'o', 'WITH', 'o.product_id = p.id')
            ->where('p.id = :productId')
            ->setParameter('productId', $productId)
            ->groupBy('p.id');

        return $qb->getQuery()->getOneOrNullResult();
    }
}
