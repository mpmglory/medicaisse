<?php

namespace PMM\CoreBundle\AmountMedoc123;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;
use PMM\CoreBundle\Entity\Medoc1;
use PMM\CoreBundle\Entity\Medoc2;
use PMM\CoreBundle\Entity\Medoc3;
use PMM\CoreBundle\Repository\CommandeRepository;


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
            $medoc4 = $entity->getMedoc4();
            $medoc5 = $entity->getMedoc5();
            $medoc6 = $entity->getMedoc6();
            $medoc7 = $entity->getMedoc7();
            $medoc8 = $entity->getMedoc8();
            $medoc9 = $entity->getMedoc9();
            $medoc10 = $entity->getMedoc10();
            $medoc11 = $entity->getMedoc11();
            $medoc12 = $entity->getMedoc12();
            $medoc13 = $entity->getMedoc13();
            $medoc14 = $entity->getMedoc14();
            $medoc15 = $entity->getMedoc15();
            
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
            
            $pu4 = floatval( $medoc4->getMedicament()->getPrice() );
            $qte4 = floatval( $medoc4->getQuantity() );
            $pt4 = floatval( $pu4 * $qte4 );
            $medoc4->setPrice($pt4);
            
            $pu5 = floatval( $medoc5->getMedicament()->getPrice() );
            $qte5 = floatval( $medoc5->getQuantity() );
            $pt5 = floatval( $pu5 * $qte5 );
            $medoc5->setPrice($pt5);
            
            $pu6 = floatval( $medoc6->getMedicament()->getPrice() );
            $qte6 = floatval( $medoc6->getQuantity() );
            $pt6 = floatval( $pu6 * $qte6 );
            $medoc6->setPrice($pt6);
            
            $pu7 = floatval( $medoc7->getMedicament()->getPrice() );
            $qte7 = floatval( $medoc7->getQuantity() );
            $pt7 = floatval( $pu7 * $qte7 );
            $medoc7->setPrice($pt7);
            
            $pu8 = floatval( $medoc8->getMedicament()->getPrice() );
            $qte8 = floatval( $medoc8->getQuantity() );
            $pt8 = floatval( $pu8 * $qte8 );
            $medoc8->setPrice($pt8);
            
            $pu9 = floatval( $medoc9->getMedicament()->getPrice() );
            $qte9 = floatval( $medoc9->getQuantity() );
            $pt9 = floatval( $pu9 * $qte9 );
            $medoc9->setPrice($pt9);
            
            $pu10 = floatval( $medoc10->getMedicament()->getPrice() );
            $qte10 = floatval( $medoc10->getQuantity() );
            $pt10 = floatval( $pu10 * $qte10 );
            $medoc10->setPrice($pt10);
            
            $pu11 = floatval( $medoc11->getMedicament()->getPrice() );
            $qte11 = floatval( $medoc11->getQuantity() );
            $pt11 = floatval( $pu11 * $qte11 );
            $medoc11->setPrice($pt11);
            
            $pu12 = floatval( $medoc12->getMedicament()->getPrice() );
            $qte12 = floatval( $medoc12->getQuantity() );
            $pt12 = floatval( $pu12 * $qte12 );
            $medoc12->setPrice($pt12);
            
            $pu13 = floatval( $medoc13->getMedicament()->getPrice() );
            $qte13 = floatval( $medoc13->getQuantity() );
            $pt13 = floatval( $pu13 * $qte13 );
            $medoc13->setPrice($pt13);
            
            $pu14 = floatval( $medoc14->getMedicament()->getPrice() );
            $qte14 = floatval( $medoc14->getQuantity() );
            $pt14 = floatval( $pu14 * $qte14 );
            $medoc14->setPrice($pt14);
            
            $pu15 = floatval( $medoc15->getMedicament()->getPrice() );
            $qte15 = floatval( $medoc15->getQuantity() );
            $pt15 = floatval( $pu15 * $qte15 );
            $medoc15->setPrice($pt15);
            
            $em->persist($medoc1);
            $em->persist($medoc2);
            $em->persist($medoc3);
            $em->persist($medoc4);
            $em->persist($medoc5);
            $em->persist($medoc6);
            $em->persist($medoc7);
            $em->persist($medoc8);
            $em->persist($medoc9);
            $em->persist($medoc10);
            $em->persist($medoc11);
            $em->persist($medoc12);
            $em->persist($medoc13);
            $em->persist($medoc14);
            $em->persist($medoc15);

            $em->flush();
            
        }
    }
    
    public function postUpdate(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        
        if($entity instanceof Medoc1){
            
            $pu1 = floatval( $entity->getMedicament()->getPrice() );
            $qte1 = floatval( $entity->getQuantity() );
            $pt1 = floatval( $pu1 * $qte1 );
            
            $entity->setPrice($pt1);
            $em->persist($entity);
            
            /*$com = $em->getRepository('PMMCoreBundle:Commande')->findByMedoc1( $entity );
            
            if( null !== $com){
                
                $p1 = floatval( $com->getMedoc1()->getPrice() );
                $p2 = floatval( $com->getMedoc2()->getPrice() );
                $p3 = floatval( $com->getMedoc3()->getPrice() );

                $amt = $p1+$p2+$p3;
                $amt = floatval( $amt );

                $com->setAmount($amt);
                $em->persist($com);
            }*/

            $em->flush();
             
        }
    }
 
}
