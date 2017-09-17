<?php

namespace PMM\CoreBundle\Controller;

use PMM\CoreBundle\Entity\Medoc3;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Medoc3 controller.
 *
 */
class Medoc3Controller extends Controller
{
    /**
     * Lists all medoc3 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medoc3s = $em->getRepository('PMMCoreBundle:Medoc3')->findAll();

        return $this->render('medoc3/index.html.twig', array(
            'medoc3s' => $medoc3s,
        ));
    }

    /**
     * Creates a new medoc3 entity.
     *
     */
    public function newAction(Request $request)
    {
        $medoc3 = new Medoc3();
        $form = $this->createForm('PMM\CoreBundle\Form\Medoc3Type', $medoc3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medoc3);
            $em->flush();

            return $this->redirectToRoute('medoc3_show', array('id' => $medoc3->getId()));
        }

        return $this->render('medoc3/new.html.twig', array(
            'medoc3' => $medoc3,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medoc3 entity.
     *
     */
    public function showAction(Medoc3 $medoc3)
    {
        $deleteForm = $this->createDeleteForm($medoc3);

        return $this->render('medoc3/show.html.twig', array(
            'medoc3' => $medoc3,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medoc3 entity.
     *
     */
    public function editAction(Request $request, Medoc3 $medoc3)
    {
        $deleteForm = $this->createDeleteForm($medoc3);
        $editForm = $this->createForm('PMM\CoreBundle\Form\Medoc3Type', $medoc3);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medoc3_edit', array('id' => $medoc3->getId()));
        }

        return $this->render('medoc3/edit.html.twig', array(
            'medoc3' => $medoc3,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medoc3 entity.
     *
     */
    public function deleteAction(Request $request, Medoc3 $medoc3)
    {
        $form = $this->createDeleteForm($medoc3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medoc3);
            $em->flush();
        }

        return $this->redirectToRoute('medoc3_index');
    }

    /**
     * Creates a form to delete a medoc3 entity.
     *
     * @param Medoc3 $medoc3 The medoc3 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Medoc3 $medoc3)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medoc3_delete', array('id' => $medoc3->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
