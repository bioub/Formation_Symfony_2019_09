<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use AppBundle\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
    public function createAction(Request $request)
    {
        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact = $contactForm->getData();
            $this->contactManager->save($contact);

            $this->addFlash('success', 'Le contact a bien été créé');

            // return $this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);
            return $this->redirectToRoute('app_contact_index');
        }


        return $this->render('contact/create.html.twig', array(
            'contactForm' => $contactForm->createView(),
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

    /**
     * @Route("/{id}/update/")
     */
    public function updateAction(Request $request, $id)
    {
        $contact = $this->contactManager->getById($id);
        $contactForm = $this->createForm(ContactType::class);
        $contactForm->setData($contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact = $contactForm->getData();
            $this->contactManager->save($contact);

            $this->addFlash('success', 'Le contact a bien été modifié');

            // return $this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);
            return $this->redirectToRoute('app_contact_index');
        }


        return $this->render('contact/update.html.twig', array(
            'contactForm' => $contactForm->createView(),
        ));
    }

    /**
     * @Route("/{id}/supprimer/", requirements={"id": "[1-9][0-9]*"})
     */
    public function deleteAction(Request $request, $id)
    {
        $data = $this->contactManager->getById($id);

        if (!$data) {
            throw $this->createNotFoundException('Contact not found');
        }

        if ($request->isMethod('POST')) {
            if ($request->get('confirm') === 'oui')  {
                $this->contactManager->remove($data);
                $this->addFlash('success', 'Le contact a bien été supprimé');
            }

            return $this->redirectToRoute('app_contact_index');
        }

        return $this->render('contact/delete.html.twig', array(
            "contact" => $data,
        ));
    }

}
