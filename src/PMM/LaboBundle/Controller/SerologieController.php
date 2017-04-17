<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\Serologie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Serologie controller.
 *
 */
class SerologieController extends Controller
{
    /**
     * Lists all serologie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $serologies = $em->getRepository('PMMLaboBundle:Serologie')->findAll();

        return $this->render('serologie/index.html.twig', array(
            'serologies' => $serologies,
        ));
    }

    /**
     * Creates a new serologie entity.
     *
     */
    public function newAction(Request $request)
    {
        $serologie = new Serologie();
        $form = $this->createForm('PMM\LaboBundle\Form\SerologieType', $serologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($serologie);
            $em->flush();

            return $this->redirectToRoute('serologie_show', array('id' => $serologie->getId()));
        }

        return $this->render('serologie/new.html.twig', array(
            'serologie' => $serologie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a serologie entity.
     *
     */
    public function showAction(Serologie $serologie)
    {
        $deleteForm = $this->createDeleteForm($serologie);

        return $this->render('serologie/show.html.twig', array(
            'serologie' => $serologie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing serologie entity.
     *
     */
    public function editAction(Request $request, Serologie $serologie)
    {
        $deleteForm = $this->createDeleteForm($serologie);
        $editForm = $this->createForm('PMM\LaboBundle\Form\SerologieType', $serologie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('serologie_edit', array('id' => $serologie->getId()));
        }

        return $this->render('serologie/edit.html.twig', array(
            'serologie' => $serologie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a serologie entity.
     *
     */
    public function deleteAction(Request $request, Serologie $serologie)
    {
        $form = $this->createDeleteForm($serologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($serologie);
            $em->flush();
        }

        return $this->redirectToRoute('serologie_index');
    }

    /**
     * Creates a form to delete a serologie entity.
     *
     * @param Serologie $serologie The serologie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Serologie $serologie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('serologie_delete', array('id' => $serologie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
