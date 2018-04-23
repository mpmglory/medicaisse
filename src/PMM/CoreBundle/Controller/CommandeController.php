<?php

namespace PMM\CoreBundle\Controller;

use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;
use PMM\CoreBundle\Entity\Medoc1;
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

        $commandes = $em->getRepository('PMMCoreBundle:Commande')->myFindAll();

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
    //************************************
    public function printAction(Commande $commande){
        
        return $this->render('commande/print.html.twig', array(
            'commande' => $commande,
        ));
    }
    
    //**********************************
    public function etatAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $d1 = 20;
        $m1 = 9;
        $y1 = 2017;
        
        $d2 = 21;
        $m2 = 9;
        $y2 = 2017;
        
        /*$date1 = new DateTime();
        $date1->setDate(2017, 9, 18);
        
        $date2 = new DateTime();
        $date2->setDate(2017, 9, 20);*/
        
        $dd1 = "{$y1}-{$m1}-{$d1}";
        $dd2 = "{$y2}-{$m2}-{$d2}";
        
        $date1 = new \Datetime($dd1);
        $date2 = new \Datetime($dd2);

        $commandes = $em->getRepository('PMMCoreBundle:Commande')
                        ->getCommandesBetween($date1, $date2)
                        //->getCommandesBetween($date1, $date2)
                        ;

        return $this->render('commande/etat.html.twig', array(
            'commandes' => $commandes,
            'date1' => $date1,
            'date2' => $date2,
        ));
    }
    
        //**********************************
    public function etat2Action($d1, $m1, $y1, $d2, $m2, $y2)
    {
        $em = $this->getDoctrine()->getManager();
        
        $dd1 = "{$y1}-{$m1}-{$d1}";
        $dd2 = "{$y2}-{$m2}-{$d2}";
        
        $date1 = new \Datetime($dd1);
        $date2 = new \Datetime($dd2);
        
        $interval = new \DateInterval('P10D');
 
        $dte1 = new \Datetime();
        
        $dte2 = clone $dte1;
        $dte2->sub($interval);
        
        $dte3 = clone $dte2;
        $dte3->sub($interval);
        
        $dte4 = clone $dte3;
        $dte4->sub($interval);
        
        $dte4 = clone $dte3;
        $dte4->sub($interval);
        
        $lesdates[] = $dte1;
        $lesdates[] = $dte2;
        $lesdates[] = $dte3;
        $lesdates[] = $dte4;
        

        $commandes = $em->getRepository('PMMCoreBundle:Commande')
                        ->getCommandesBetween($date1, $date2)
                        ;

        return $this->render('commande/etat.html.twig', array(
            'commandes' => $commandes,
            'date1' => $date1,
            'date2' => $date2,
            'lesdates' => $lesdates,
            'dte1' => $dte1,
            'dte2' => $dte2,
        ));
    }
    
            //**********************************
    public function etatglobalAction()
    {
        $em = $this->getDoctrine()->getManager();

        $interval = new \DateInterval('P10D');
        
        $dd1 = "2017-9-15";

        $startdate = new \Datetime($dd1);
        
        $today = new \Datetime();
        
        $lesdates[0] = clone $startdate;
         
        $i=0;
        
        //for($i=0; $i<37; $i++){
        while($lesdates[$i] <= $today){
            
            $date = clone $lesdates[$i];
            $date->add($interval);

            $lesdates[$i+1] = $date;
            
            $lesdates2[$i] = clone $lesdates[$i+1];
            //$lesdates2[$i]->sub( new \DateInterval('P1D') );
            
            $lescommandes[$i] = $em->getRepository('PMMCoreBundle:Commande')
                        ->getCommandesBetween($lesdates[$i], $lesdates2[$i])
                        ;
            $i++;
        }
        
        //if( $lesdates[$i] )
        
        
        return $this->render('commande/etatglobal.html.twig', array(
            'lescommandes' => $lescommandes,
            'lesdates' => $lesdates,
            'lesdates2' => $lesdates2,
            'today' => $today
        ));
    }
    
}
