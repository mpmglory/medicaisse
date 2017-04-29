<?php

namespace PMM\LaboBundle\CreationResultatVide;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\LaboBundle\Entity\Bulletin;
use PMM\LaboBundle\Entity\ResultatSerologie;
use PMM\LaboBundle\Entity\Serologie;

class CreationResultatVide{
    
  
    public function postPersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        
        if($entity instanceof Bulletin){
            
            $rSero = new ResultatSerologie();
            
            $rSero->setBulletin($entity);
            if(null !== $entity->getSerologie()->getVih()){
                $rSero->setVih(' ');
            }
            if(null !== $entity->getSerologie()->getAlso()){
                $rSero->setAlso(' ');
            }           
            if(null !== $entity->getSerologie()->getCrp()){
                $rSero->setCrp(' ');
            }
            if(null !== $entity->getSerologie()->getTpha()){
                $rSero->setTpha(' ');
            }
            if(null !== $entity->getSerologie()->getVdrl()){
                $rSero->setVdrl(' ');
            }
            if(null !== $entity->getSerologie()->getAgHbs()){
                $rSero->setAgHbs(' ');
            }
            if(null !== $entity->getSerologie()->getToxoIgg()){
                $rSero->setToxoIgg(' ');
            }
            if(null !== $entity->getSerologie()->getWidalTest()){
                $rSero->setWidalTest(' ');
            }
            if(null !== $entity->getSerologie()->getRubeole()){
                $rSero->setRubeole(' ');
            }
            if(null !== $entity->getSerologie()->getHcv()){
                $rSero->setHcv(' ');
            }
            if(null !== $entity->getSerologie()->getChlamydia()){
                $rSero->setChlamydia(' ');
            }
            if(null !== $entity->getSerologie()->getFr()){
                $rSero->setFr(' ');
            }
            if(null !== $entity->getSerologie()->getSelles()){
                $rSero->setSelles(' ');
            }

            $entity->setRSerologie($rSero);
            
            $em->persist($entity);
            $em->persist($rSero);
            $em->flush();
        }
    }
    
    
}
