<?php

namespace PMM\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class CommandeType extends AbstractType
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
            ->add('commande_medicaments', CollectionType::class, array(
                'entry_type' => CommandeMedicamentType::class,
                'allow_add' => true,
                'allow_delete' => true
            ))
            ->add('medoc1', Medoc1Type::class)
            ->add('medoc2', Medoc2Type::class)
            ->add('medoc3', Medoc3Type::class)
            ->add('submit', SubmitType::class, array('label' => 'Enregistrer'));
            
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function(FormEvent $event){
                
                $commande = $event->getData();
            
                if(null === $commande){
                    return;
                }
            
                if(null !== $commande->getPatient()){
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
            'data_class' => 'PMM\CoreBundle\Entity\Commande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_corebundle_commande';
    }


}
