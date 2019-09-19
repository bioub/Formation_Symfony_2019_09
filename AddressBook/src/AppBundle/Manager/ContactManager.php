<?php


namespace AppBundle\Manager;

use AppBundle\Entity\Contact;
use Doctrine\Common\Persistence\ManagerRegistry;

class ContactManager
{
    /** @var ManagerRegistry */
    protected $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAll() {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->findAll();
    }

    public function getById($id) {
        $repo = $this->doctrine->getRepository(Contact::class);
        return $repo->find($id);
    }
}