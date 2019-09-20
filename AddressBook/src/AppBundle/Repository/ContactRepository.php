<?php


namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ContactRepository extends EntityRepository
{
//    public function findWithSociete($id)
//    {
//        return $this->createQueryBuilder('c')
//                    ->select('c, s')
//                    ->leftJoin('c.societe', 's')
//                    ->where('c.id = :contactId')
//                    ->setParameter('contactId', $id)
//                    ->getQuery()
//                    ->getOneOrNullResult();
//    }
    public function findWithSociete($id)
    {
        $dql = "SELECT c, s FROM AppBundle\Entity\Contact c LEFT JOIN c.societe s WHERE c.id = :contactId";

        return $this->_em->createQuery($dql)
            ->setParameter('contactId', $id)
            ->getOneOrNullResult();
    }
}