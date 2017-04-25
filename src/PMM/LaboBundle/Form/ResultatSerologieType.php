<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ResultatSerologieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vih', TextType::class, array('required' => false))
            ->add('also', TextType::class, array('required' => false))
            ->add('crp', TextType::class, array('required' => false))
            ->add('tpha', TextType::class, array('required' => false))
            ->add('vdrl', TextType::class, array('required' => false))
            ->add('agHbs', TextType::class, array('required' => false))
            ->add('toxoIgg', TextType::class, array('required' => false))
            ->add('widalTest', TextType::class, array('required' => false))
            ->add('rubeole', TextType::class, array('required' => false))
            ->add('hcv', TextType::class, array('required' => false))
            ->add('chlamydia', TextType::class, array('required' => false))
            ->add('fr', TextType::class, array('required' => false))
            ->add('selles', TextType::class, array('required' => false))
            ;
        
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function(FormEvent $event){
                
                $serol = $event->getData();
            
                if(null === $serol){
                    return;
                }
            
                if(null === $serol->getVih()){
                    $event->getForm()->remove('vih');
                }
                if(null === $serol->getAlso()){
                    $event->getForm()->remove('also');
                }
                if(null === $serol->getCrp()){
                        $event->getForm()->remove('crp');
                    }
                if(null === $serol->getTpha()){
                        $event->getForm()->remove('tpha');
                    }
                if(null === $serol->getVdrl()){
                        $event->getForm()->remove('vdrl');
                    }
                if(null === $serol->getAgHbs()){
                        $event->getForm()->remove('agHbs');
                    }
                if(null === $serol->getToxoIgg()){
                        $event->getForm()->remove('toxoIgg');
                    }
                if(null === $serol->getWidalTest()){
                        $event->getForm()->remove('widalTest');
                    }
                if(null === $serol->getRubeole()){
                        $event->getForm()->remove('rubeole');
                    }
                if(null === $serol->getHcv()){
                        $event->getForm()->remove('hcv');
                    }
                if(null === $serol->getChlamydia()){
                        $event->getForm()->remove('chlamydia');
                    }
                if(null === $serol->getFr()){
                        $event->getForm()->remove('fr');
                    }
                if(null === $serol->getSelles()){
                        $event->getForm()->remove('selles');
                    }
            
            }
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PMM\LaboBundle\Entity\ResultatSerologie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_resultatserologie';
    }


}
