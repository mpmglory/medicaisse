<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ResultatFormuleLeucocytaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('neutrophiles', TextType::class, array('required' => false))
            ->add('eosinophiles', TextType::class, array('required' => false))
            ->add('basophiles', TextType::class, array('required' => false))
            ->add('lymphocytes', TextType::class, array('required' => false))
            ->add('monocytes', TextType::class, array('required' => false))
            ->add('vS1', TextType::class, array('required' => false))
            ->add('vS2', TextType::class, array('required' => false))
            ->add('gpeSanguin', TextType::class, array('required' => false))
            ->add('goutteEpaisse', TextType::class, array('required' => false))
            ->add('testEmmel', TextType::class, array('required' => false))
            ->add('rmfSnif', TextType::class, array('required' => false))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\ResultatFormuleLeucocytaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_resultatformuleleucocytaire';
    }


}
