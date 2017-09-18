<?php

namespace PMM\CoreBundle\AmountCommande;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;


class AmountCommande{
    
  
    public function postPersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();

        
        if($entity instanceof Commande){
            
            $p1 = floatval( $entity->getMedoc1()->getPrice() );
            $p2 = floatval( $entity->getMedoc2()->getPrice() );
            $p3 = floatval( $entity->getMedoc3()->getPrice() );
            $p4 = floatval( $entity->getMedoc4()->getPrice() );
            $p5 = floatval( $entity->getMedoc5()->getPrice() );
            $p6 = floatval( $entity->getMedoc6()->getPrice() );
            $p7 = floatval( $entity->getMedoc7()->getPrice() );
            $p8 = floatval( $entity->getMedoc8()->getPrice() );
            $p9 = floatval( $entity->getMedoc9()->getPrice() );
            $p10 = floatval( $entity->getMedoc10()->getPrice() );
            $p11 = floatval( $entity->getMedoc11()->getPrice() );
            $p12 = floatval( $entity->getMedoc12()->getPrice() );
            $p13 = floatval( $entity->getMedoc13()->getPrice() );
            $p14 = floatval( $entity->getMedoc14()->getPrice() );
            $p15 = floatval( $entity->getMedoc15()->getPrice() );
            
            $amt = $p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9+$p10+$p11+$p12+$p13+$p14+$p15;
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
