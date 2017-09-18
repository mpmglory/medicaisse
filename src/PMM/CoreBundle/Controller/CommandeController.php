<?php

namespace PMM\CoreBundle\Controller;

use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commande controller.
 *
 */
class CommandeController extends Controller
{
    /**
     * Lists all commande entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('PMMCoreBundle:Commande')->findAll();

        return $this->render('commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Creates a new commande entity.
     *
     */
    public function newAction(Request $request)
    {
        $commande = new Commande();
        $form = $this->createForm('PMM\CoreBundle\Form\CommandeType', $commande);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            
            $em->flush();


            return $this->redirectToRoute('commande_show', array('id' => $commande->getId()));
        }

        return $this->render('commande/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Creates a new customized commande entity.
     *
     */
    public function custumNewAction($id, Request $request){
        
        $commande = new Commande();
        
        $em = $this->getDoctrine()->getManager();
        
        $patient = $em
    				->getRepository('PMMCoreBundle:Patient')
    				->find($id);
        
        $commande->setPatient($patient);
        
        
        $form = $this->createForm('PMM\CoreBundle\Form\CommandeType', $commande);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            
            $em->flush();


            return $this->redirectToRoute('commande_show', array('id' => $commande->getId()));
        }

        return $this->render('commande/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commande entity.
     *
     */
    public function showAction(Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);

        return $this->render('commande/show.html.twig', array(
            'commande' => $commande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commande entity.
     *
     */
    public function editAction(Request $request, Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);
        $editForm = $this->createForm('PMM\CoreBundle\Form\CommandeType', $commande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            //$repo = $this->getDoctrine()->getManager()->getRepository('PMMCoreBundle:Comande');
            
            //$this->container->get('pmm_core.amount_commande')->myUpdatePrice( $commande );

            return $this->redirectToRoute('commande_edit', array('id' => $commande->getId()));
        }

        return $this->render('commande/edit.html.twig', array(
            'commande' => $commande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commande entity.
     *
     */
    public function deleteAction(Request $request, Commande $commande)
    {
        $form = $this->createDeleteForm($commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commande);
            $em->flush();
        }

        return $this->redirectToRoute('commande_index');
    }

    /**
     * Creates a form to delete a commande entity.
     *
     * @param Commande $commande The commande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commande $commande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('id' => $commande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function fillAction(Request $request, Commande $commande){
        
        $em = $this->getDoctrine()->getManager();
        
    	$form = $this->createForm('PMM\CoreBundle\Form\CommandeFillType', $commande);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
			$em->flush();
			$request->getSession()->getFlashBag()
					->add('notice', 'Remplissage reussi.');
		
			return $this->redirectToRoute('commande_show', array('id' => $commande->getId()));
		}
        
        return $this->render('commande/fill.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }
    
    public function printAction(Commande $commande){
        
        return $this->render('commande/print.html.twig', array(
            'commande' => $commande,
        ));
    }
    
}
