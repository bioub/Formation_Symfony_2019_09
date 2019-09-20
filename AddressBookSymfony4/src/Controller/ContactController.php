<?php

namespace App\Controller;

use App\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends AbstractController
{
    /** @var ContactManager */
    protected $contactManager;

    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    /**
     * @Route("/")
     */
    public function index()
    {
        $contacts = $this->contactManager->getAll();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
