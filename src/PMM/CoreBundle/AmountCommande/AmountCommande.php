<?php

namespace PMM\LaboBundle\SaveComMedoc;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\CoreBundle\Entity\Commande;
use PMM\CoreBundle\Entity\Medicament;
use PMM\CoreBundle\Entity\CommandeMedicament;


class SaveComMedoc{
    
  
    /*public function prePersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        
        if($entity instanceof Commande){
            
            $rSero = new ResultatSerologie();
            
            $rSero->setBulletin($entity);
            if(null !== $entity){
                $entity
            }
            
            $entity->setRSerologie($rSero);
            
            $em->persist($entity);
            $em->persist($rSero);
            $em->flush();
        }
    }*/
    
    
}
