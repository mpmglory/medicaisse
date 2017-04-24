<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BulCreationUrineLrcType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ph', ChoiceType::class, array(
                'choices' => array(
                    'Retirer' => null,
                    'URINE' => 'urine',
                    'LRC' => 'lrc',
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
            'data_class' => 'PMM\LaboBundle\Entity\UrineLrc'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_urinelrc';
    }


}
