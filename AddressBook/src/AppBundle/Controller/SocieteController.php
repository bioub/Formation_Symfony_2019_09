<?php

namespace AppBundle\Controller;

use AppBundle\Manager\SocieteManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/societes")
 */
class SocieteController extends Controller
{
    /** @var SocieteManager */
    protected $societeManager;

    public function __construct(SocieteManager $societeManager)
    {
        $this->societeManager = $societeManager;
    }

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $societes = $this->societeManager->getAll();

        return $this->render('societe/index.html.twig', array(
            'societes' => $societes,
        ));
    }

    /**
     * @Route("/{id}/", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        $societe = $this->societeManager->getById($id);

        if (!$societe) {
            throw $this->createNotFoundException('Societe not found');
        }

        return $this->render('societe/show.html.twig', array(
            'societe' => $societe
        ));
    }



}
