<?php

namespace AppBundle\Controller;

use AppBundle\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends Controller
{
    /** @var ContactManager */
    protected $contactManager;

    /**
     * ContactController constructor.
     * @param ContactManager $contactManager
     */
    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    /*
     * $contactManager = new ContactManager();
     * $contacController = new ContactController($contactManager);
     */

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $data = $this->contactManager->getAll();

        return $this->render('contact/index.html.twig', array(
            "contacts" => $data,
        ));
    }

    /**
     * @Route("/add/")
     */
    public function createAction()
    {
        return $this->render('contact/create.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        $data = $this->contactManager->getById($id);

        if (!$data) {
            throw $this->createNotFoundException('Contact not found');
        }

        return $this->render('contact/show.html.twig', array(
            "contact" => $data,
        ));
    }



}
