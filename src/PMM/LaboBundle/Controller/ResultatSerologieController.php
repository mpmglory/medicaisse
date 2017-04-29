<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\ResultatSerologie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Resultatserologie controller.
 *
 */
class ResultatSerologieController extends Controller
{
    /**
     * Lists all resultatSerologie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resultatSerologies = $em->getRepository('PMMLaboBundle:ResultatSerologie')->findAll();

        return $this->render('resultatserologie/index.html.twig', array(
            'resultatSerologies' => $resultatSerologies,
        ));
    }

    /**
     * Creates a new resultatSerologie entity.
     *
     */
    public function newAction(Request $request)
    {
        $resultatSerologie = new Resultatserologie();
        $form = $this->createForm('PMM\LaboBundle\Form\ResultatSerologieType', $resultatSerologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resultatSerologie);
            $em->flush();

            return $this->redirectToRoute('resultatserologie_show', array('id' => $resultatSerologie->getId()));
        }

        return $this->render('resultatserologie/new.html.twig', array(
            'resultatSerologie' => $resultatSerologie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resultatSerologie entity.
     *
     */
    public function showAction(ResultatSerologie $resultatSerologie)
    {
        $deleteForm = $this->createDeleteForm($resultatSerologie);

        return $this->render('resultatserologie/show.html.twig', array(
            'resultatSerologie' => $resultatSerologie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resultatSerologie entity.
     *
     */
    public function editAction(Request $request, ResultatSerologie $resultatSerologie)
    {
        $deleteForm = $this->createDeleteForm($resultatSerologie);
        $editForm = $this->createForm('PMM\LaboBundle\Form\ResultatSerologieType', $resultatSerologie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultatserologie_edit', array('id' => $resultatSerologie->getId()));
        }

        return $this->render('resultatserologie/edit.html.twig', array(
            'resultatSerologie' => $resultatSerologie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resultatSerologie entity.
     *
     */
    public function deleteAction(Request $request, ResultatSerologie $resultatSerologie)
    {
        $form = $this->createDeleteForm($resultatSerologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resultatSerologie);
            $em->flush();
        }

        return $this->redirectToRoute('resultatserologie_index');
    }

    /**
     * Creates a form to delete a resultatSerologie entity.
     *
     * @param ResultatSerologie $resultatSerologie The resultatSerologie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ResultatSerologie $resultatSerologie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resultatserologie_delete', array('id' => $resultatSerologie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
