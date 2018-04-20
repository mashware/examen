<?php
namespace App\Infrastructure\Repository\DropShipping;


use App\Domain\Model\DropShipping\Dropshipping;
use App\Domain\Model\DropShipping\DropShippingRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DropShiping|null find($id, $lockMode = null, $lockVersion = null)
 * @method DropShiping|null findOneBy(array $criteria, array $orderBy = null)
 * @method DropShiping[]    findAll()
 * @method DropShiping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DropshippingDoctrineRepository extends EntityRepository implements DropShippingRepository
{

    public function getAll()
    {
        return $this->createQueryBuilder('pa')
            ->select('p')
            ->from('App\Domain\Model\DropShipping\Dropshipping', 'p')
            ->getQuery()
            ->execute();
    }

    public function resetOneById()
    {
        return $this->createQueryBuilder('pa')
            ->select('p')
            ->from('App\Domain\Model\DropShipping\Dropshipping', 'p')
            ->where()
            ->getQuery()
            ->execute();
    }

}
