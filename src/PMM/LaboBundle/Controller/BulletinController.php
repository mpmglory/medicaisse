<?php

namespace PMM\LaboBundle\Controller;

use PMM\LaboBundle\Entity\Bulletin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bulletin controller.
 *
 */
class BulletinController extends Controller
{
    /**
     * Lists all bulletin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bulletins = $em->getRepository('PMMLaboBundle:Bulletin')->findAll();

        return $this->render('bulletin/index.html.twig', array(
            'bulletins' => $bulletins,
        ));
    }

    /**
     * Creates a new bulletin entity.
     *
     */
    public function newAction(Request $request)
    {
        $bulletin = new Bulletin();
        $form = $this->createForm('PMM\LaboBundle\Form\BulletinType', $bulletin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bulletin);
            $em->flush();

            return $this->redirectToRoute('bulletin_show', array('id' => $bulletin->getId()));
        }

        return $this->render('bulletin/new.html.twig', array(
            'bulletin' => $bulletin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bulletin entity.
     *
     */
    public function showAction(Bulletin $bulletin)
    {
        $deleteForm = $this->createDeleteForm($bulletin);
        
        return $this->render('bulletin/show.html.twig', array(
            'bulletin' => $bulletin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bulletin entity.
     *
     */
    public function editAction(Request $request, Bulletin $bulletin)
    {
        $deleteForm = $this->createDeleteForm($bulletin);
        $editForm = $this->createForm('PMM\LaboBundle\Form\BulletinType', $bulletin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bulletin_edit', array('id' => $bulletin->getId()));
        }

        return $this->render('bulletin/edit.html.twig', array(
            'bulletin' => $bulletin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bulletin entity.
     *
     */
    public function deleteAction(Request $request, Bulletin $bulletin)
    {
        $form = $this->createDeleteForm($bulletin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bulletin);
            $em->flush();
        }

        return $this->redirectToRoute('bulletin_index');
    }

    /**
     * Creates a form to delete a bulletin entity.
     *
     * @param Bulletin $bulletin The bulletin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bulletin $bulletin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bulletin_delete', array('id' => $bulletin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function fillAction(Request $request, $id){
        
        $em = $this->getDoctrine()->getManager();
        
        $bul = $em->getRepository('PMMLaboBundle:Bulletin')->find($id);
        
        if(null === $bul){
            throw new NotFoundException("Le bulletin numéro " .$id. " n'existe pas.");
        }
        
    	$form = $this->createForm('PMM\LaboBundle\Form\BulFillType', $bul);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            
			$em->flush();
			$request->getSession()->getFlashBag()
					->add('notice', 'Remplissage reussi.');
		
			return $this->redirectToRoute('bulletin_show', array('id' => $id));
		}
        
        return $this->render('bulletin/fill.html.twig', array(
            'bul' => $bul,
            'form' => $form->createView(),
        ));
    }
    
    public function custumNewAction($id, Request $request){
            
    	$bulletin = new Bulletin();
        
        $em = $this->getDoctrine()->getManager();
        
        $patient = $em
    				->getRepository('PMMCoreBundle:Patient')
    				->find($id);
        
        $bulletin->setPatient($patient);
            
    	$form = $this->createForm('PMM\LaboBundle\Form\BulletinType', $bulletin);
			
		if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
        
			$em->persist($bulletin);
			$em->flush();
            
			$request->getSession()->getFlashBag()
					->add('notice', 'Bulletin enregistré avec succès.');
		
			return $this->redirectToRoute('bulletin_index');
		}
        
        return $this->render('bulletin/new.html.twig', array(
            'bulletin' => $bulletin,
            'form' => $form->createView(),
        ));
    }
    
    public function printAction(Bulletin $bulletin){
        
        return $this->render('bulletin/print.html.twig', array(
            'bulletin' => $bulletin,
        ));
    }
    
}
