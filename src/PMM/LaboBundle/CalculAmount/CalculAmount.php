<?php

namespace PMM\LaboBundle\CalculAmount;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\LaboBundle\Entity\Bulletin;
use PMM\LaboBundle\Entity\FormuleLeucocytaire;
use PMM\LaboBundle\Entity\Hematologie;
use PMM\LaboBundle\Entity\Serologie;
use PMM\LaboBundle\Entity\PcvPu;

class CalculAmount{
    
    public function prePersist(LifecycleEventArgs $args){
        
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        $idPrice = 1;
        $amt = 0;        
                
/*        if($entity instanceof FormuleLeucocytaire){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:FormuleLeucocytaire')->find($idPrice);
            
            if(null === $entityPrice){ 
                return;
            }
            
        }*/
        
/*        if($entity instanceof Hematologie){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:Hematologie')->find($idPrice);
            
            if(null === $entityPrice){ 
                return;
            }
        }*/
        
        if($entity instanceof PcvPu){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:PcvPu')->find($idPrice);
            
            if(null === $entityPrice){ 
                return;
            }
            
            $amt = floatval($entityPrice->getPrice());
            
            $entity->setPrice($amt);            
        }
        
        if($entity instanceof Serologie){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:Serologie')->find($idPrice);
            
            if(null === $entityPrice){ 
                return;
            }
            
            if(null !== $entity->getVih()){
                
                $amt = $amt + floatval($entityPrice->getVih());
            }
            
            if(null !== $entity->getAlso()){
                
                $amt = $amt + floatval($entityPrice->getAlso());
            }
            
            if(null !== $entity->getCrp()){
                
                $amt = $amt + floatval($entityPrice->getCrp());
            }
            
            if(null !== $entity->getTpha()){
                
                $amt = $amt + floatval($entityPrice->getTpha());
            }
            
            if(null !== $entity->getVdrl()){
                
                $amt = $amt + floatval($entityPrice->getVdrl());
            }
            
            if(null !== $entity->getAgHbs()){
                
                $amt = $amt + floatval($entityPrice->getAgHbs());
            }
            
            if(null !== $entity->getToxoIgg()){
                
                $amt = $amt + floatval($entityPrice->getToxoIgg());
            }
            
            if(null !== $entity->getWidalTest()){
                
                $amt = $amt + floatval($entityPrice->getWidalTest());
            }
            
            if(null !== $entity->getRubeole()){
                
                $amt = $amt + floatval($entityPrice->getRubeole());
            }
            
            if(null !== $entity->getHcv()){
                
                $amt = $amt + floatval($entityPrice->getHcv());
            }
            
            if(null !== $entity->getChlamydia()){
                
                $amt = $amt + floatval($entityPrice->getChlamydia());
            }
            
            if(null !== $entity->getFr()){
                
                $amt = $amt + floatval($entityPrice->getFr());
            }
            
            if(null !== $entity->getSelles()){
                
                $amt = $amt + floatval($entityPrice->getSelles());
            }
            
            $entity->setPrice($amt); 
        }

    }
    
    public function postPersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        $idPrice = 1;
        $amt = 0;
        
        if($entity instanceof Bulletin){
/*
            if(null !== $entity->getFormuleLeucocytaire()){
                
                $entityPrice = $em->getRepository('PMMLaboBundle:FormuleLeucocytaire')->find($idPrice);

                $amt = $amt + floatval($entityPrice->getPrice());
            }

            if(null !== $entity->getHematologie()){
                
                $entityPrice = $em->getRepository('PMMLaboBundle:Hematologie')->find($idPrice);

                $amt = $amt + floatval($entityPrice->getPrice());
            }*/

            if(null !== $entity->getPcvPu()){
                
                $entityPrice = $em->getRepository('PMMLaboBundle:PcvPu')->find($idPrice);

                $amt = $amt + floatval($entityPrice->getPrice());
            }

            if(null !== $entity->getSerologie()){
                
                $entityPrice = $em->getRepository('PMMLaboBundle:Serologie')->find($idPrice);

                $amt = $amt + floatval($entityPrice->getPrice());
            }

            $entity->setAmount($amt);
            
        }
    }
    
}