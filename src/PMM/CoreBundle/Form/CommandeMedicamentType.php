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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class CommandeMedicamentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite')
            ->add('date')
            ->add('commande', EntityType::class, array(
                'class' => 'PMMCoreBundle:Commande',
                'choice_label' => 'id',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('medicament', EntityType::class, array(
                'class' => 'PMMCoreBundle:Medicament',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\CoreBundle\Entity\CommandeMedicament'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_corebundle_commandemedicament';
    }


}
