<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BulCreationFormuleLeucocytaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('neutrophiles', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            /*->add('eosinophiles', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('basophiles', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('lymphocytes', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('monocytes', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('vS1', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('vS2', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('monocytes', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('goutteEpaisse', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('testEmmel', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('rmfSnif', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => ' ',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))*/
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\FormuleLeucocytaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_formuleleucocytaire';
    }


}
