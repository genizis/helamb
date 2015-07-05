<?php

namespace CMS\CityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state', null, array( 'label' => 'Estado', 'attr' => array('class' => 'form-control', 'placeholder' => 'state')))
            ->add('name', 'text', array( 'label' => 'Nome', 'attr' => array('class' => 'form-control', 'placeholder' => 'nome')))
            ->add('latitude', 'text', array( 'label' => 'Latitude', 'attr' => array('class' => 'form-control', 'placeholder' => 'latitude'), 'required' => false))
            ->add('longitude', 'text', array( 'label' => 'Longitude', 'attr' => array('class' => 'form-control', 'placeholder' => 'longitude'), 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\CityBundle\Entity\City'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_citybundle_city';
    }
}
