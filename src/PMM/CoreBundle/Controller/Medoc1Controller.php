<?php

namespace PMM\CoreBundle\Controller;

use PMM\CoreBundle\Entity\Medoc1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Medoc1 controller.
 *
 */
class Medoc1Controller extends Controller
{
    /**
     * Lists all medoc1 entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medoc1s = $em->getRepository('PMMCoreBundle:Medoc1')->findAll();

        return $this->render('medoc1/index.html.twig', array(
            'medoc1s' => $medoc1s,
        ));
    }

    /**
     * Creates a new medoc1 entity.
     *
     */
    public function newAction(Request $request)
    {
        $medoc1 = new Medoc1();
        $form = $this->createForm('PMM\CoreBundle\Form\Medoc1Type', $medoc1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medoc1);
            $em->flush();

            return $this->redirectToRoute('medoc1_show', array('id' => $medoc1->getId()));
        }

        return $this->render('medoc1/new.html.twig', array(
            'medoc1' => $medoc1,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medoc1 entity.
     *
     */
    public function showAction(Medoc1 $medoc1)
    {
        $deleteForm = $this->createDeleteForm($medoc1);

        return $this->render('medoc1/show.html.twig', array(
            'medoc1' => $medoc1,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medoc1 entity.
     *
     */
    public function editAction(Request $request, Medoc1 $medoc1)
    {
        $deleteForm = $this->createDeleteForm($medoc1);
        $editForm = $this->createForm('PMM\CoreBundle\Form\Medoc1Type', $medoc1);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            

            return $this->redirectToRoute('medoc1_edit', array('id' => $medoc1->getId()));
        }

        return $this->render('medoc1/edit.html.twig', array(
            'medoc1' => $medoc1,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medoc1 entity.
     *
     */
    public function deleteAction(Request $request, Medoc1 $medoc1)
    {
        $form = $this->createDeleteForm($medoc1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medoc1);
            $em->flush();
        }

        return $this->redirectToRoute('medoc1_index');
    }

    /**
     * Creates a form to delete a medoc1 entity.
     *
     * @param Medoc1 $medoc1 The medoc1 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Medoc1 $medoc1)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medoc1_delete', array('id' => $medoc1->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
