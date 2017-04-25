<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ResultatEcbuCuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('aspect', TextType::class, array('required' => false))
            ->add('etatFrais', TextType::class, array('required' => false))
            ->add('efCellulesEpitheliales', TextType::class, array('required' => false))
            ->add('efLeucocytes', TextType::class, array('required' => false))
            ->add('efGermes', TextType::class, array('required' => false))
            ->add('efElementsLevuriformes', TextType::class, array('required' => false))
            ->add('efParasites', TextType::class, array('required' => false))
            ->add('efCristaux', TextType::class, array('required' => false))
            ->add('etatColore', TextType::class, array('required' => false))
            ->add('ecCellulesEpitheliales', TextType::class, array('required' => false))
            ->add('ecPolynucleaires', TextType::class, array('required' => false))
            ->add('ecBacillesGramNegatif', TextType::class, array('required' => false))
            ->add('ecBacillesGramPositif', TextType::class, array('required' => false))
            ->add('ecCocciGramPositif', TextType::class, array('required' => false))
            ->add('ecCocciGramNegatif', TextType::class, array('required' => false))
            ->add('ecSporesMycosiques', TextType::class, array('required' => false))
            ->add('ecFilamentsMyceliens', TextType::class, array('required' => false))
            ->add('ecCristaux', TextType::class, array('required' => false))
            ->add('ecAutres', TextType::class, array('required' => false))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\ResultatEcbuCu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_resultatecbucu';
    }


}
