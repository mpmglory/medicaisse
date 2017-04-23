<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\Hematologie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Hematologie controller.
 *
 */
class HematologieController extends Controller
{
    /**
     * Lists all hematologie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hematologies = $em->getRepository('PMMLaboBundle:Hematologie')->findAll();

        return $this->render('hematologie/index.html.twig', array(
            'hematologies' => $hematologies,
        ));
    }

    /**
     * Creates a new hematologie entity.
     *
     */
    public function newAction(Request $request)
    {
        $hematologie = new Hematologie();
        $form = $this->createForm('PMM\LaboBundle\Form\HematologieType', $hematologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hematologie);
            $em->flush();

            return $this->redirectToRoute('hematologie_show', array('id' => $hematologie->getId()));
        }

        return $this->render('hematologie/new.html.twig', array(
            'hematologie' => $hematologie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hematologie entity.
     *
     */
    public function showAction(Hematologie $hematologie)
    {
        $deleteForm = $this->createDeleteForm($hematologie);

        return $this->render('hematologie/show.html.twig', array(
            'hematologie' => $hematologie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hematologie entity.
     *
     */
    public function editAction(Request $request, Hematologie $hematologie)
    {
        $deleteForm = $this->createDeleteForm($hematologie);
        $editForm = $this->createForm('PMM\LaboBundle\Form\HematologieType', $hematologie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hematologie_edit', array('id' => $hematologie->getId()));
        }

        return $this->render('hematologie/edit.html.twig', array(
            'hematologie' => $hematologie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hematologie entity.
     *
     */
    public function deleteAction(Request $request, Hematologie $hematologie)
    {
        $form = $this->createDeleteForm($hematologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hematologie);
            $em->flush();
        }

        return $this->redirectToRoute('hematologie_index');
    }

    /**
     * Creates a form to delete a hematologie entity.
     *
     * @param Hematologie $hematologie The hematologie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hematologie $hematologie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hematologie_delete', array('id' => $hematologie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
