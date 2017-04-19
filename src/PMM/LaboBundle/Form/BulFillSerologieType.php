<?php

namespace PMM\LaboBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BulFillSerologieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vih', TextType::class)
            ->add('also', TextType::class)
            ->add('crp', TextType::class)
            ->add('tpha', TextType::class)
            ->add('vdrl', TextType::class)
            ->add('agHbs', TextType::class)
            ->add('toxoIgg', TextType::class)
            ->add('widalTest', TextType::class)
            ->add('rubeole', TextType::class)
            ->add('hcv', TextType::class)
            ->add('chlamydia', TextType::class)
            ->add('fr', TextType::class)
            ->add('selles', TextType::class);
        
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
            'data_class' => 'PMM\LaboBundle\Entity\Serologie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pmm_labobundle_serologie';
    }


}
