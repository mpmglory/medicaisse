<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BulFillPcvPuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etatCol', TextType::class)
            ->add('leucorrhees', TextType::class)
            ->add('etatFrais', TextType::class)
            ->add('efCellulesEpitheliales', TextType::class)
            ->add('efLeucocytes', TextType::class)
            ->add('efGermes', TextType::class)
            ->add('efElementsLevuriformes', TextType::class)
            ->add('efTrichononasVaginalis', TextType::class)
            ->add('efClueCell', TextType::class)
            ->add('etatColore', TextType::class)
            ->add('ecCellulesEpitheliales', TextType::class)
            ->add('ecPolynucleaires', TextType::class)
            ->add('ecBacillesGramNegatif', TextType::class)
            ->add('ecBacillesGramPositif', TextType::class)
            ->add('ecCocciGramPositif', TextType::class)
            ->add('ecCocciGramNegatif', TextType::class)
            ->add('ecSporesMycosiques', TextType::class)
            ->add('ecFilamentsMyceliens', TextType::class)
            ->add('ecFloreDoderiein', TextType::class)
            ->add('koh', TextType::class)
            ->add('ph', TextType::class);
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
