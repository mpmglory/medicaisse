<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ResultatPcvPuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etatCol', TextType::class, array('required' => false))
            ->add('leucorrhees', TextType::class, array('required' => false))
            ->add('etatFrais', TextType::class, array('required' => false))
            ->add('efCellulesEpitheliales', TextType::class, array('required' => false))
            ->add('efLeucocytes', TextType::class, array('required' => false))
            ->add('efGermes', TextType::class, array('required' => false))
            ->add('efElementsLevuriformes', TextType::class, array('required' => false))
            ->add('efTrichononasVaginalis', TextType::class, array('required' => false))
            ->add('efClueCell', TextType::class, array('required' => false))
            ->add('etatColore', TextType::class, array('required' => false))
            ->add('ecCellulesEpitheliales', TextType::class, array('required' => false))
            ->add('ecPolynucleaires', TextType::class, array('required' => false))
            ->add('ecBacillesGramNegatif', TextType::class, array('required' => false))
            ->add('ecBacillesGramPositif', TextType::class, array('required' => false))
            ->add('ecCocciGramPositif', TextType::class, array('required' => false))
            ->add('ecCocciGramNegatif', TextType::class, array('required' => false))
            ->add('ecSporesMycosiques', TextType::class, array('required' => false))
            ->add('ecFilamentsMyceliens', TextType::class, array('required' => false))
            ->add('ecFloreDoderiein', TextType::class, array('required' => false))
            ->add('koh', TextType::class, array('required' => false))
            ->add('ph', TextType::class, array('required' => false))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\ResultatPcvPu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_resultatpcvpu';
    }


}
