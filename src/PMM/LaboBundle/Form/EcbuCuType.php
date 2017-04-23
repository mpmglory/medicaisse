<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EcbuCuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date')->add('aspect')->add('etatFrais')->add('efCellulesEpitheliales')->add('efLeucocytes')->add('efGermes')->add('efElementsLevuriformes')->add('efParasites')->add('efCristaux')->add('etatColore')->add('ecCellulesEpitheliales')->add('ecPolynucleaires')->add('ecBacillesGramNegatif')->add('ecBacillesGramPositif')->add('ecCocciGramPositif')->add('ecCocciGramNegatif')->add('ecSporesMycosiques')->add('ecFilamentsMyceliens')->add('ecFloreDoderiein')->add('ecCristaux')->add('ecAutres')->add('price');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\EcbuCu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_ecbucu';
    }


}
