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

class BulletinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('patient', EntityType::class, array(
                'class' => 'PMMCoreBundle:Patient',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('pcvPu', BulCreationPcvPuType::class)
            ->add('hematologie', BulCreationHematologieType::class)
            ->add('serologie', BulCreationSerologieType::class)
            ->add('formuleLeucocytaire', BulCreationFormuleLeucocytaireType::class)
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
        
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function(FormEvent $event){
                
                $bul = $event->getData();
            
                if(null === $bul){
                    return;
                }
            
                if(null !== $bul->getPatient()){
                    $event->getForm()->remove('patient');
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
