<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\FormuleLeucocytaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Formuleleucocytaire controller.
 *
 */
class FormuleLeucocytaireController extends Controller
{
    /**
     * Lists all formuleLeucocytaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formuleLeucocytaires = $em->getRepository('PMMLaboBundle:FormuleLeucocytaire')->findAll();

        return $this->render('formuleleucocytaire/index.html.twig', array(
            'formuleLeucocytaires' => $formuleLeucocytaires,
        ));
    }

    /**
     * Creates a new formuleLeucocytaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $formuleLeucocytaire = new Formuleleucocytaire();
        $form = $this->createForm('PMM\LaboBundle\Form\FormuleLeucocytaireType', $formuleLeucocytaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formuleLeucocytaire);
            $em->flush();

            return $this->redirectToRoute('formuleleucocytaire_show', array('id' => $formuleLeucocytaire->getId()));
        }

        return $this->render('formuleleucocytaire/new.html.twig', array(
            'formuleLeucocytaire' => $formuleLeucocytaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a formuleLeucocytaire entity.
     *
     */
    public function showAction(FormuleLeucocytaire $formuleLeucocytaire)
    {
        $deleteForm = $this->createDeleteForm($formuleLeucocytaire);

        return $this->render('formuleleucocytaire/show.html.twig', array(
            'formuleLeucocytaire' => $formuleLeucocytaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing formuleLeucocytaire entity.
     *
     */
    public function editAction(Request $request, FormuleLeucocytaire $formuleLeucocytaire)
    {
        $deleteForm = $this->createDeleteForm($formuleLeucocytaire);
        $editForm = $this->createForm('PMM\LaboBundle\Form\FormuleLeucocytaireType', $formuleLeucocytaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formuleleucocytaire_edit', array('id' => $formuleLeucocytaire->getId()));
        }

        return $this->render('formuleleucocytaire/edit.html.twig', array(
            'formuleLeucocytaire' => $formuleLeucocytaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a formuleLeucocytaire entity.
     *
     */
    public function deleteAction(Request $request, FormuleLeucocytaire $formuleLeucocytaire)
    {
        $form = $this->createDeleteForm($formuleLeucocytaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formuleLeucocytaire);
            $em->flush();
        }

        return $this->redirectToRoute('formuleleucocytaire_index');
    }

    /**
     * Creates a form to delete a formuleLeucocytaire entity.
     *
     * @param FormuleLeucocytaire $formuleLeucocytaire The formuleLeucocytaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FormuleLeucocytaire $formuleLeucocytaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formuleleucocytaire_delete', array('id' => $formuleLeucocytaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
