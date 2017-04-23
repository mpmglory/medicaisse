<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BulFillFormuleLeucocytaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('neutrophiles', TextType::class)
            ->add('eosinophiles', TextType::class)
            ->add('basophiles', TextType::class)
            ->add('lymphocytes', TextType::class)
            ->add('monocytes', TextType::class)
            ->add('vS1', TextType::class)
            ->add('vS2', TextType::class)
            ->add('gpeSanguin', TextType::class)
            ->add('goutteEpaisse', TextType::class)
            ->add('testEmmel', TextType::class)
            ->add('rmfSnif', TextType::class)
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
