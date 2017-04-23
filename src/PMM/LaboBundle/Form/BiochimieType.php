<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BiochimieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date')->add('uree')->add('creatinine')->add('sgot')->add('sgpt')->add('sggt')->add('acideUrique')->add('cholesterol')->add('glycemie')->add('bilirubine')->add('magnesemie')->add('potassium')->add('triglyceride')->add('amylase')->add('pal')->add('calcemie')->add('ck')->add('price');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\Biochimie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_biochimie';
    }


}
