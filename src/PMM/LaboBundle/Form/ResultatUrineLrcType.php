<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ResultatUrineLrcType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ph', TextType::class, array('required' => false))
            ->add('proteine', TextType::class, array('required' => false))
            ->add('glucose', TextType::class, array('required' => false))
            ->add('densite', TextType::class, array('required' => false))
            ->add('leucocytes', TextType::class, array('required' => false))
            ->add('nitrites', TextType::class, array('required' => false))
            ->add('acetone', TextType::class, array('required' => false))
            ->add('urobilinogene', TextType::class, array('required' => false))
            ->add('bilirubine', TextType::class, array('required' => false))
            ->add('sang', TextType::class, array('required' => false))
            ->add('hb', TextType::class, array('required' => false))
            ->add('hcg', TextType::class, array('required' => false))
            ->add('selsBilaires', TextType::class, array('required' => false))
            ->add('pigBilaires', TextType::class, array('required' => false))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\ResultatUrineLrc'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_resultaturinelrc';
    }


}
