<?php

namespace PMM\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use PMM\CoreBundle\Repository\MedicamentRepository;

class Medoc1Type extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      
        //$thechoice = 'medoc';
        
        
        $builder
            ->add('medicament', EntityType::class, array(
                'class' => 'PMMCoreBundle:Medicament',
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                /*'query_builder' => function(MedicamentRepository $repository) use($thechoice) {
                    return $repository->getActes($thechoice);
                }*/
            ))
            ->add('quantity')
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\CoreBundle\Entity\Medoc1'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_corebundle_medoc1';
    }


}
