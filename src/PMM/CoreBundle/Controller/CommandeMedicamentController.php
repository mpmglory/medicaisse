<?php

namespace PMM\CoreBundle\Controller;

use PMM\CoreBundle\Entity\CommandeMedicament;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commandemedicament controller.
 *
 */
class CommandeMedicamentController extends Controller
{
    /**
     * Lists all commandeMedicament entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandeMedicaments = $em->getRepository('PMMCoreBundle:CommandeMedicament')->findAll();

        return $this->render('commandemedicament/index.html.twig', array(
            'commandeMedicaments' => $commandeMedicaments,
        ));
    }

    /**
     * Creates a new commandeMedicament entity.
     *
     */
    public function newAction(Request $request)
    {
        $commandeMedicament = new Commandemedicament();
        $form = $this->createForm('PMM\CoreBundle\Form\CommandeMedicamentType', $commandeMedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commandeMedicament);
            $em->flush();

            return $this->redirectToRoute('commandemedicament_show', array('id' => $commandeMedicament->getId()));
        }

        return $this->render('commandemedicament/new.html.twig', array(
            'commandeMedicament' => $commandeMedicament,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commandeMedicament entity.
     *
     */
    public function showAction(CommandeMedicament $commandeMedicament)
    {
        $deleteForm = $this->createDeleteForm($commandeMedicament);

        return $this->render('commandemedicament/show.html.twig', array(
            'commandeMedicament' => $commandeMedicament,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commandeMedicament entity.
     *
     */
    public function editAction(Request $request, CommandeMedicament $commandeMedicament)
    {
        $deleteForm = $this->createDeleteForm($commandeMedicament);
        $editForm = $this->createForm('PMM\CoreBundle\Form\CommandeMedicamentType', $commandeMedicament);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commandemedicament_edit', array('id' => $commandeMedicament->getId()));
        }

        return $this->render('commandemedicament/edit.html.twig', array(
            'commandeMedicament' => $commandeMedicament,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commandeMedicament entity.
     *
     */
    public function deleteAction(Request $request, CommandeMedicament $commandeMedicament)
    {
        $form = $this->createDeleteForm($commandeMedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commandeMedicament);
            $em->flush();
        }

        return $this->redirectToRoute('commandemedicament_index');
    }

    /**
     * Creates a form to delete a commandeMedicament entity.
     *
     * @param CommandeMedicament $commandeMedicament The commandeMedicament entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CommandeMedicament $commandeMedicament)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commandemedicament_delete', array('id' => $commandeMedicament->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
