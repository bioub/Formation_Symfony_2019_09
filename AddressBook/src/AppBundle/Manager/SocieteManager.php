<?php


namespace AppBundle\Manager;


use AppBundle\Entity\Societe;
use Doctrine\Common\Persistence\ManagerRegistry;

class SocieteManager
{
    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * SocieteManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAll()
    {
        $repo = $this->doctrine->getRepository(Societe::class);
        return $repo->findBy([], null, 10);
    }

    public function getById($id)
    {
        $repo = $this->doctrine->getRepository(Societe::class);
        return $repo->find($id);
    }

    public function save(Societe $entity)
    {
        $em = $this->doctrine->getManager();
        $em->persist($entity);
        $em->flush();
    }

}