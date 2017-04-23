<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\EcbuCu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ecbucu controller.
 *
 */
class EcbuCuController extends Controller
{
    /**
     * Lists all ecbuCu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecbuCus = $em->getRepository('PMMLaboBundle:EcbuCu')->findAll();

        return $this->render('ecbucu/index.html.twig', array(
            'ecbuCus' => $ecbuCus,
        ));
    }

    /**
     * Creates a new ecbuCu entity.
     *
     */
    public function newAction(Request $request)
    {
        $ecbuCu = new Ecbucu();
        $form = $this->createForm('PMM\LaboBundle\Form\EcbuCuType', $ecbuCu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecbuCu);
            $em->flush();

            return $this->redirectToRoute('ecbucu_show', array('id' => $ecbuCu->getId()));
        }

        return $this->render('ecbucu/new.html.twig', array(
            'ecbuCu' => $ecbuCu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecbuCu entity.
     *
     */
    public function showAction(EcbuCu $ecbuCu)
    {
        $deleteForm = $this->createDeleteForm($ecbuCu);

        return $this->render('ecbucu/show.html.twig', array(
            'ecbuCu' => $ecbuCu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecbuCu entity.
     *
     */
    public function editAction(Request $request, EcbuCu $ecbuCu)
    {
        $deleteForm = $this->createDeleteForm($ecbuCu);
        $editForm = $this->createForm('PMM\LaboBundle\Form\EcbuCuType', $ecbuCu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecbucu_edit', array('id' => $ecbuCu->getId()));
        }

        return $this->render('ecbucu/edit.html.twig', array(
            'ecbuCu' => $ecbuCu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecbuCu entity.
     *
     */
    public function deleteAction(Request $request, EcbuCu $ecbuCu)
    {
        $form = $this->createDeleteForm($ecbuCu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecbuCu);
            $em->flush();
        }

        return $this->redirectToRoute('ecbucu_index');
    }

    /**
     * Creates a form to delete a ecbuCu entity.
     *
     * @param EcbuCu $ecbuCu The ecbuCu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EcbuCu $ecbuCu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecbucu_delete', array('id' => $ecbuCu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
