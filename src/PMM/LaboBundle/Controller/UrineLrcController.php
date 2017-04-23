<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\UrineLrc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Urinelrc controller.
 *
 */
class UrineLrcController extends Controller
{
    /**
     * Lists all urineLrc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $urineLrcs = $em->getRepository('PMMLaboBundle:UrineLrc')->findAll();

        return $this->render('urinelrc/index.html.twig', array(
            'urineLrcs' => $urineLrcs,
        ));
    }

    /**
     * Creates a new urineLrc entity.
     *
     */
    public function newAction(Request $request)
    {
        $urineLrc = new Urinelrc();
        $form = $this->createForm('PMM\LaboBundle\Form\UrineLrcType', $urineLrc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($urineLrc);
            $em->flush();

            return $this->redirectToRoute('urinelrc_show', array('id' => $urineLrc->getId()));
        }

        return $this->render('urinelrc/new.html.twig', array(
            'urineLrc' => $urineLrc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a urineLrc entity.
     *
     */
    public function showAction(UrineLrc $urineLrc)
    {
        $deleteForm = $this->createDeleteForm($urineLrc);

        return $this->render('urinelrc/show.html.twig', array(
            'urineLrc' => $urineLrc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing urineLrc entity.
     *
     */
    public function editAction(Request $request, UrineLrc $urineLrc)
    {
        $deleteForm = $this->createDeleteForm($urineLrc);
        $editForm = $this->createForm('PMM\LaboBundle\Form\UrineLrcType', $urineLrc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('urinelrc_edit', array('id' => $urineLrc->getId()));
        }

        return $this->render('urinelrc/edit.html.twig', array(
            'urineLrc' => $urineLrc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a urineLrc entity.
     *
     */
    public function deleteAction(Request $request, UrineLrc $urineLrc)
    {
        $form = $this->createDeleteForm($urineLrc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($urineLrc);
            $em->flush();
        }

        return $this->redirectToRoute('urinelrc_index');
    }

    /**
     * Creates a form to delete a urineLrc entity.
     *
     * @param UrineLrc $urineLrc The urineLrc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UrineLrc $urineLrc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('urinelrc_delete', array('id' => $urineLrc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
