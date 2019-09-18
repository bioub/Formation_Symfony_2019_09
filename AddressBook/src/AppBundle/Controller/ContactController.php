<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $data = [
            ["id" => 123, "prenom" => "Jean", "nom" => "Dupont"],
            ["id" => 456, "prenom" => "Eric", "nom" => "Martin"],
        ];

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
        return $this->render('contact/show.html.twig', array(
            // ...
        ));
    }



}
