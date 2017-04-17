<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\PcvPu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pcvpu controller.
 *
 */
class PcvPuController extends Controller
{
    /**
     * Lists all pcvPu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pcvPus = $em->getRepository('PMMLaboBundle:PcvPu')->findAll();

        return $this->render('pcvpu/index.html.twig', array(
            'pcvPus' => $pcvPus,
        ));
    }

    /**
     * Creates a new pcvPu entity.
     *
     */
    public function newAction(Request $request)
    {
        $pcvPu = new Pcvpu();
        $form = $this->createForm('PMM\LaboBundle\Form\PcvPuType', $pcvPu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pcvPu);
            $em->flush();

            return $this->redirectToRoute('pcvpu_show', array('id' => $pcvPu->getId()));
        }

        return $this->render('pcvpu/new.html.twig', array(
            'pcvPu' => $pcvPu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pcvPu entity.
     *
     */
    public function showAction(PcvPu $pcvPu)
    {
        $deleteForm = $this->createDeleteForm($pcvPu);

        return $this->render('pcvpu/show.html.twig', array(
            'pcvPu' => $pcvPu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pcvPu entity.
     *
     */
    public function editAction(Request $request, PcvPu $pcvPu)
    {
        $deleteForm = $this->createDeleteForm($pcvPu);
        $editForm = $this->createForm('PMM\LaboBundle\Form\PcvPuType', $pcvPu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pcvpu_edit', array('id' => $pcvPu->getId()));
        }

        return $this->render('pcvpu/edit.html.twig', array(
            'pcvPu' => $pcvPu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pcvPu entity.
     *
     */
    public function deleteAction(Request $request, PcvPu $pcvPu)
    {
        $form = $this->createDeleteForm($pcvPu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pcvPu);
            $em->flush();
        }

        return $this->redirectToRoute('pcvpu_index');
    }

    /**
     * Creates a form to delete a pcvPu entity.
     *
     * @param PcvPu $pcvPu The pcvPu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PcvPu $pcvPu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pcvpu_delete', array('id' => $pcvPu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
