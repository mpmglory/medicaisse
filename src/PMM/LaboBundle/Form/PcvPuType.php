<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PcvPuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price')->add('etatCol')->add('leucorrhees')->add('etatFrais')->add('efCellulesEpitheliales')->add('efLeucocytes')->add('efGermes')->add('efElementsLevuriformes')->add('efTrichononasVaginalis')->add('efClueCell')->add('etatColore')->add('ecCellulesEpitheliales')->add('ecPolynucleaires')->add('ecBacillesGramNegatif')->add('ecBacillesGramPositif')->add('ecCocciGramPositif')->add('ecCocciGramNegatif')->add('ecSporesMycosiques')->add('ecFilamentsMyceliens')->add('ecFloreDoderiein')->add('koh')->add('ph');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\PcvPu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_pcvpu';
    }


}
