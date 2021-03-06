<?php

namespace PMM\LaboBundle\CalculAmount;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PMM\LaboBundle\Entity\Bulletin;
use PMM\LaboBundle\Entity\FormuleLeucocytaire;
use PMM\LaboBundle\Entity\Hematologie;
use PMM\LaboBundle\Entity\Serologie;
use PMM\LaboBundle\Entity\PcvPu;
use PMM\LaboBundle\Entity\Biochimie;
use PMM\LaboBundle\Entity\UrineLrc;
use PMM\LaboBundle\Entity\EcbuCu;
use PMM\LaboBundle\Entity\Caisse1;
use PMM\LaboBundle\Entity\Caisse2;


class CalculAmount{
    
    public function prePersist(LifecycleEventArgs $args){
        
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        $idPrice = 1;
        $amt = 0;        
        
        if($entity instanceof PcvPu){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:PcvPu')->find($idPrice);
            
            if( (null === $entityPrice) || (null === $entity->getEtatCol()) || (0 === $entity->getEtatCol()) ){ 
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
        
        if($entity instanceof FormuleLeucocytaire){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:FormuleLeucocytaire')->find($idPrice);
            
            if( (null === $entityPrice) || (null === $entity->getNeutrophiles()) ||
               (0 === $entity->getNeutrophiles()) || (false === $entity->getNeutrophiles()) ){
                return;
            }
            
            /*
            if(null !== $entity->getGpeSanguin()){
                
                $amt = $amt + floatval($entityPrice->getGpeSanguin());
            }
            
            if(null !== $entity->getGoutteEpaisse()){
                
                $amt = $amt + floatval($entityPrice->getGoutteEpaisse());
            }
            
            if(null !== $entity->getTestEmmel()){
                
                $amt = $amt + floatval($entityPrice->getTestEmmel());
            }
            
            if(null !== $entity->getRmfSnif()){
                
                $amt = $amt + floatval($entityPrice->getRmfSnif());
            }*/
            $amt = floatval($entityPrice->getPrice());
            
            $entity->setPrice($amt); 
        }
        
        if($entity instanceof Hematologie){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:Hematologie')->find($idPrice);
            
            if( (null === $entityPrice) || (null === $entity->getGlobulesBlancs()) ||
               (0 === $entity->getGlobulesBlancs()) || (false === $entity->getGlobulesBlancs()) ){
                return;
            }
            
            $amt = floatval($entityPrice->getPrice());
            
            $entity->setPrice($amt); 
        }
        
        if($entity instanceof Biochimie){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:Biochimie')->find($idPrice);
            
            if( (null === $entityPrice) || (null === $entity->getUree()) ||
               (0 === $entity->getUree()) || (false === $entity->getUree()) ){
                return;
            }
            
            $amt = floatval($entityPrice->getPrice());
            
            $entity->setPrice($amt); 
        }
        
        if($entity instanceof UrineLrc){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:UrineLrc')->find($idPrice);
            
            if( (null === $entityPrice) || (null === $entity->getPh()) ||
               (0 === $entity->getPh()) || (false === $entity->getPh()) ){
                return;
            }
            
            $amt = floatval($entityPrice->getPrice());
            
            $entity->setPrice($amt); 
        }
        
        if($entity instanceof EcbuCu){
            
            $entityPrice = $em->getRepository('PMMLaboBundle:EcbuCu')->find($idPrice);
            
            if( (null === $entityPrice) || (null === $entity->getAspect()) ||
               (0 === $entity->getAspect()) || (false === $entity->getAspect()) ){
                return;
            }
            
            $amt = floatval($entityPrice->getPrice());
            
            $entity->setPrice($amt); 
        }
        
    }
    
    public function postPersist(LifecycleEventArgs $args){
            
        $entity = $args->getObject();
        $em = $args->getObjectManager();
        $idPrice = 1;
        $amt = 0;
        $prix = 0;
        
        if($entity instanceof Bulletin){
            
            $thisPcvPu = $entity->getPcvPu();
            $thisSero = $entity->getSerologie();
            $thisFormLeu = $entity->getFormuleLeucocytaire();
            $thisHema = $entity->getHematologie();
            $thisEcbuCu = $entity->getEcbuCu();
            $thisBiochimie = $entity->getBiochimie();
            $thisUrineLrc = $entity->getUrineLrc();

            if( (null !== $thisPcvPu) && (null !== $thisPcvPu->getEtatCol()) ){
                
                $prix = floatval($thisPcvPu->getPrice());

                $amt = $amt + floatval($prix);
            }

            if(null !== $thisSero){
                
                $prix = floatval($thisSero->getPrice());

                $amt = $amt + floatval($prix);
            }
            
            if( (null !== $thisFormLeu) && (null !== $thisFormLeu->getNeutrophiles()) ){
                
                $prix = floatval($thisFormLeu->getPrice());

                $amt = $amt + floatval($prix);
            }
            
            if( (null !== $thisHema) && (null !== $thisHema->getGlobulesBlancs()) ){
                
                $prix = floatval($thisHema->getPrice());

                $amt = $amt + floatval($prix);
            }
            
            if( (null !== $thisEcbuCu) && (null !== $thisEcbuCu->getAspect()) ){
                
                $prix = floatval($thisEcbuCu->getPrice());

                $amt = $amt + floatval($prix);
            }
            
            if( (null !== $thisBiochimie) && (null !== $thisBiochimie->getUree()) ){
                
                $prix = floatval($thisBiochimie->getPrice());

                $amt = $amt + floatval($prix);
            }
            
            if( (null !== $thisUrineLrc) && (null !== $thisUrineLrc->getPh()) ){
                
                $prix = floatval($thisUrineLrc->getPrice());

                $amt = $amt + floatval($prix);
            }

            $entity->setAmount($amt);
            $em->persist($entity);
                        
            $caisse1 = new Caisse1();
            $caisse1->setBulletin($entity);
            $caisse1->setValue( ($amt)*0.75 );
            $em->persist($caisse1);
                    
            $caisse2 = new Caisse2();
            $caisse2->setBulletin($entity);
            $caisse2->setValue( ($amt)*0.25 );
            $em->persist($caisse2);
            
            $entity->setCaisse1($caisse1);
            $entity->setCaisse2($caisse2);
            
            $em->flush();
            
        }
    }
    
    
}
