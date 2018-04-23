<?php
namespace App\Repository;
use App\Entity\DropshippingPedidos;
use App\Infraestructure\Repository\DropshippingPedidos as IDropshippingPedidos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DropshippingPedidos|null find($id, $lockMode = null, $lockVersion = null)
 * @method DropshippingPedidos|null findOneBy(array $criteria, array $orderBy = null)
 * @method DropshippingPedidos[]    findAll()
 * @method DropshippingPedidos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DropshippingPedidosRepository extends ServiceEntityRepository implements IDropshippingPedidos
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DropshippingPedidos::class);
    }
    public function persistAndFlush(DropshippingPedidos $dropshippingPedidos)
    {
        $this->getEntityManager()->persist($dropshippingPedidos);
        $this->getEntityManager()->flush();
    }


    public function selectAllOrders()
    {
            return $this->getEntityManager()->getRepository('App:DropshippingPedidos')->findAll();
    }


    public function getPaidOrders()
    {
        return $this->getEntityManager()->getRepository('App:DropshippingPedidos')->findBy(['estado'=>'PAGADO']);
    }

    public function findByIdPedidoAndIdArticulo(int $idPedido, int $idArticle)
    {
        return $this->getEntityManager()->getRepository('App:DropshippingPedidos')->findOneBy(['pedido'=>$idPedido,'id_articulo'=>$idArticle]);
    }


    public function getOrderByPedido(int $idPedido)
    {
        return $this->getEntityManager()->getRepository('App:DropshippingPedidos')->findOneBy(['pedido'=>$idPedido]);
    }
}
