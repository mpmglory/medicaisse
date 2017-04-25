<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BulFillType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rPcvPu', ResultatPcvPuType::class)
            ->add('rEcbuCu', ResultatEcbuCuType::class)
            ->add('rBiochimie', ResultatBiochimieType::class)
            ->add('rUrineLrc', ResultatUrineLrcType::class)
            ->add('rSerologie', ResultatSerologieType::class)
            ->add('rFormuleLeucocytaire', ResultatFormuleLeucocytaireType::class)
            ->add('rHematologie', ResultatHematologieType::class)
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer les résultats'));
        
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function(FormEvent $event){
                
                $bul = $event->getData();
            
                if(null === $bul){
                    return;
                }
            
                if(null === $bul->getPcvPu()->getEtatCol()){
                    $event->getForm()->remove('rPcvPu');
                }
            
                if(null === $bul->getEcbuCu()->getAspect()){
                    $event->getForm()->remove('rEcbuCu');
                }
            
                if(null === $bul->getBiochimie()->getUree()){
                    $event->getForm()->remove('rBiochimie');
                }
            
                if(null === $bul->getUrineLrc()->getPh()){
                    $event->getForm()->remove('rUrineLrc');
                }
            
                if(null === $bul->getFormuleLeucocytaire()->getNeutrophiles()){
                    $event->getForm()->remove('rFormuleLeucocytaire');
                }
                
                if(null === $bul->getHematologie()->getGlobulesBlancs()){
                    $event->getForm()->remove('rHematologie');
                }
            
                if(0 == $bul->getSerologie()->getPrice()){
                    $event->getForm()->remove('rSerologie');
                }
            
                if( (0 == $bul->getSerologie()->getPrice()) && 
                   (null === $bul->getHematologie()->getGlobulesBlancs()) && 
                   (null === $bul->getFormuleLeucocytaire()->getNeutrophiles()) &&
                   (null === $bul->getPcvPu()->getEtatCol()) && 
                   (null === $bul->getEcbuCu()->getAspect()) &&
                   (null === $bul->getBiochimie()->getUree()) &&
                   (null === $bul->getUrineLrc()->getPh()) ){
                    
                    $event->getForm()->remove('submit');
                }    
            
            }
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\Bulletin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_bulletin';
    }


}
