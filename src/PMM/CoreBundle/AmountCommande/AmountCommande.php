<?php

namespace PMM\CoreBundle\AmountCommande;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;


class AmountCommande{
    
  
    public function postPersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        $amt = 0;
        $prix = 0;
        
        if($entity instanceof Commande){
            
            $p1 = floatval( $entity->getMedoc1()->getPrice() );
            $p2 = floatval( $entity->getMedoc2()->getPrice() );
            $p3 = floatval( $entity->getMedoc3()->getPrice() );
            
            $amt = $p1+$p2+$p3;
            $amt = floatval( $amt );

            $entity->setAmount($amt);
            $em->persist($entity);

            $em->flush();
            
        }
    }
    
    /*public function myUpdatePrice(Commande $entity){
            
        //$entity = $args->getObject();
        //$em = $args->getObjectManager();
        
        //if($entity instanceof Commande){
            
            $p1 = floatval( $entity->getMedoc1()->getPrice() );
            $p2 = floatval( $entity->getMedoc2()->getPrice() );
            $p3 = floatval( $entity->getMedoc3()->getPrice() );
            
            $amt = $p1+$p2+$p3;
            $amt = floatval( $amt );

            $entity->setAmount($amt);
            $em->persist($entity);

            $em->flush();
        //}
    }*/
    
    
    /*public function postUpdate(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        $amt = 0;
        $prix = 0;
        
        if($entity instanceof (Medoc1 || Medoc1 || Medoc1) ){

            
            $p1 = floatval( $entity->getMedoc1()->getPrice() );
            $p2 = floatval( $entity->getMedoc2()->getPrice() );
            $p3 = floatval( $entity->getMedoc3()->getPrice() );
            
            $amt = $p1+$p2+$p3;
            $amt = floatval( $amt );

            $entity->setAmount($amt);
            $em->persist($entity);

            $em->flush();
            
        }
    }*/
    
}
