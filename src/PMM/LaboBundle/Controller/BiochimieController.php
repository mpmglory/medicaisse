<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\Biochimie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Biochimie controller.
 *
 */
class BiochimieController extends Controller
{
    /**
     * Lists all biochimie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $biochimies = $em->getRepository('PMMLaboBundle:Biochimie')->findAll();

        return $this->render('biochimie/index.html.twig', array(
            'biochimies' => $biochimies,
        ));
    }

    /**
     * Creates a new biochimie entity.
     *
     */
    public function newAction(Request $request)
    {
        $biochimie = new Biochimie();
        $form = $this->createForm('PMM\LaboBundle\Form\BiochimieType', $biochimie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($biochimie);
            $em->flush();

            return $this->redirectToRoute('biochimie_show', array('id' => $biochimie->getId()));
        }

        return $this->render('biochimie/new.html.twig', array(
            'biochimie' => $biochimie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a biochimie entity.
     *
     */
    public function showAction(Biochimie $biochimie)
    {
        $deleteForm = $this->createDeleteForm($biochimie);

        return $this->render('biochimie/show.html.twig', array(
            'biochimie' => $biochimie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing biochimie entity.
     *
     */
    public function editAction(Request $request, Biochimie $biochimie)
    {
        $deleteForm = $this->createDeleteForm($biochimie);
        $editForm = $this->createForm('PMM\LaboBundle\Form\BiochimieType', $biochimie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('biochimie_edit', array('id' => $biochimie->getId()));
        }

        return $this->render('biochimie/edit.html.twig', array(
            'biochimie' => $biochimie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a biochimie entity.
     *
     */
    public function deleteAction(Request $request, Biochimie $biochimie)
    {
        $form = $this->createDeleteForm($biochimie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($biochimie);
            $em->flush();
        }

        return $this->redirectToRoute('biochimie_index');
    }

    /**
     * Creates a form to delete a biochimie entity.
     *
     * @param Biochimie $biochimie The biochimie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Biochimie $biochimie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('biochimie_delete', array('id' => $biochimie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
