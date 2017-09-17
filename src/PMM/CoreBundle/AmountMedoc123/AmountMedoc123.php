<?php

namespace PMM\CoreBundle\AmountMedoc123;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;
use PMM\CoreBundle\Entity\Medoc1;
use PMM\CoreBundle\Entity\Medoc2;
use PMM\CoreBundle\Entity\Medoc3;


class AmountMedoc123{
    
  
    public function prePersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        $amt = 0;
        $prix = 0;
        
        if($entity instanceof Commande){
            
            $medoc1 = $entity->getMedoc1();
            $medoc2 = $entity->getMedoc2();
            $medoc3 = $entity->getMedoc3();
            
            $pu1 = floatval( $medoc1->getMedicament()->getPrice() );
            $qte1 = floatval( $medoc1->getQuantity() );
            $pt1 = floatval( $pu1 * $qte1 );
            $medoc1->setPrice($pt1);
            
            $pu2 = floatval( $medoc2->getMedicament()->getPrice() );
            $qte2 = floatval( $medoc2->getQuantity() );
            $pt2 = floatval( $pu2 * $qte2 );
            $medoc2->setPrice($pt2);
            
            $pu3 = floatval( $medoc3->getMedicament()->getPrice() );
            $qte3 = floatval( $medoc3->getQuantity() );
            $pt3 = floatval( $pu3 * $qte3 );
            $medoc3->setPrice($pt3);
            
            $em->persist($medoc1);
            $em->persist($medoc2);
            $em->persist($medoc3);

            $em->flush();
            
        }
    }
 
}
