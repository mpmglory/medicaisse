<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ResultatBiochimieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uree', TextType::class, array('required' => false))
            ->add('creatinine', TextType::class, array('required' => false))
            ->add('sgot', TextType::class, array('required' => false))
            ->add('sgpt', TextType::class, array('required' => false))
            ->add('sggt', TextType::class, array('required' => false))
            ->add('acideUrique', TextType::class, array('required' => false))
            ->add('cholesterol', TextType::class, array('required' => false))
            ->add('glycemie', TextType::class, array('required' => false))
            ->add('bilirubine', TextType::class, array('required' => false))
            ->add('magnesemie', TextType::class, array('required' => false))
            ->add('potassium', TextType::class, array('required' => false))
            ->add('triglyceride', TextType::class, array('required' => false))
            ->add('amylase', TextType::class, array('required' => false))
            ->add('pal', TextType::class, array('required' => false))
            ->add('calcemie', TextType::class, array('required' => false))
            ->add('ck', TextType::class, array('required' => false))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\ResultatBiochimie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_resultatbiochimie';
    }


}
