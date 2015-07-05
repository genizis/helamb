<?php

namespace CMS\CityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('attr' => array('class' => 'form-control', 'placeholder' => 'Nome'), 'label' => 'Nome'))
            ->add('acronym', 'text', array('attr' => array('class' => 'form-control', 'placeholder' => 'UF', 'maxlength' => 2), 'label' => 'Sigla'))
            ->add('region', null, array('label' => 'Região', 'attr' => array('class' => 'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\CityBundle\Entity\State'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_citybundle_state';
    }
}
