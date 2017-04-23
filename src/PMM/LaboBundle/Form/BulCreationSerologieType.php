<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BulCreationSerologieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vih', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('also', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('crp', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('tpha', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('vdrl', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('agHbs', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('toxoIgg', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('widalTest', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('rubeole', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('hcv', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('chlamydia', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('fr', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ))
            ->add('selles', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'Ajouter cet examen' => '1',
                ),
                'expanded' => false,
                'multiple' => false,
                'label' => '',
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\Serologie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_serologie';
    }


}
