<?php

namespace PMM\CoreBundle\Controller;

use PMM\CoreBundle\Entity\Medoc2;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Medoc2 controller.
 *
 */
class Medoc2Controller extends Controller
{
    /**
     * Lists all medoc2 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medoc2s = $em->getRepository('PMMCoreBundle:Medoc2')->findAll();

        return $this->render('medoc2/index.html.twig', array(
            'medoc2s' => $medoc2s,
        ));
    }

    /**
     * Creates a new medoc2 entity.
     *
     */
    public function newAction(Request $request)
    {
        $medoc2 = new Medoc2();
        $form = $this->createForm('PMM\CoreBundle\Form\Medoc2Type', $medoc2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medoc2);
            $em->flush();

            return $this->redirectToRoute('medoc2_show', array('id' => $medoc2->getId()));
        }

        return $this->render('medoc2/new.html.twig', array(
            'medoc2' => $medoc2,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medoc2 entity.
     *
     */
    public function showAction(Medoc2 $medoc2)
    {
        $deleteForm = $this->createDeleteForm($medoc2);

        return $this->render('medoc2/show.html.twig', array(
            'medoc2' => $medoc2,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medoc2 entity.
     *
     */
    public function editAction(Request $request, Medoc2 $medoc2)
    {
        $deleteForm = $this->createDeleteForm($medoc2);
        $editForm = $this->createForm('PMM\CoreBundle\Form\Medoc2Type', $medoc2);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medoc2_edit', array('id' => $medoc2->getId()));
        }

        return $this->render('medoc2/edit.html.twig', array(
            'medoc2' => $medoc2,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medoc2 entity.
     *
     */
    public function deleteAction(Request $request, Medoc2 $medoc2)
    {
        $form = $this->createDeleteForm($medoc2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medoc2);
            $em->flush();
        }

        return $this->redirectToRoute('medoc2_index');
    }

    /**
     * Creates a form to delete a medoc2 entity.
     *
     * @param Medoc2 $medoc2 The medoc2 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Medoc2 $medoc2)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medoc2_delete', array('id' => $medoc2->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
