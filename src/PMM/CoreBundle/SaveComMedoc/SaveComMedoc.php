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
            
            $listeMedocs = $entity->getCommandeMedicaments();

            foreach( $listeMedocs as $lstm ){
                
                if( null !== $lstm ){
                
                    $lstm->setCommande($entity);
                }
            }

            $em->persist($lstm);

            $em->flush();
            
        }
    }*/
    
    
}
