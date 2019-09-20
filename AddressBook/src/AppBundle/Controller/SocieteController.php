<?php

namespace AppBundle\Controller;

use AppBundle\Form\SocieteType;
use AppBundle\Manager\SocieteManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/add/")
     */
    public function createAction(Request $request)
    {
        $societeForm = $this->createForm(SocieteType::class);
        $societeForm->handleRequest($request);

        if ($societeForm->isSubmitted() && $societeForm->isValid()) {
            $contact = $societeForm->getData();
            $this->societeManager->save($contact);

            $this->addFlash('success', 'La société a bien été créée');

            // return $this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);
            return $this->redirectToRoute('app_societe_index');
        }


        return $this->render('societe/create.html.twig', array(
            'societeForm' => $societeForm->createView(),
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
