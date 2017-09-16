<?php

namespace PMM\CoreBundle\SaveComMedoc;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;
use PMM\CoreBundle\Entity\CommandeMedicament;


class SaveComMedoc{
    
  
    /*public function postPersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        
        if($entity instanceof Commande){
            
            $com_medocs = $em->getRepository('PMMCoreBundle:Commande')->find($entity->getId());
            
            foreach($com_medocs as $lignecom){
                
                $lignecom->setCommande($entity);
                $em->persist($lignecom);
                $em->flush();
            }
            
            

        }
    }*/
    
    
}
