<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/societes")
 */
class SocieteController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('societe/index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        return $this->render('societe/show.html.twig', array(
            // ...
        ));
    }



}
