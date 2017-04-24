<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UrineLrcType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date')->add('ph')->add('proteine')->add('glucose')->add('densite')->add('leucocytes')->add('nitrites')->add('acetone')->add('urobilinogene')->add('bilirubine')->add('sang')->add('hb')->add('hcg')->add('selsBilaires')->add('pigBilaires')->add('price');
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
