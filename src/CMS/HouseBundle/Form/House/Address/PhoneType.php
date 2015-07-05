<?php

namespace CMS\HouseBundle\Form\House\Address;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhoneType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'ddi',
                'text',
                array('label' => 'DDI',
                      'attr' => array()
            ))
            ->add(
                'ddd',
                'text',
                array('label' => 'DDD',
                      'attr' => array()
            ))
            ->add(
                'number',
                'text',
                array('label' => 'Número',
                      'attr' => array()
            ))
            ->add(
                'branchLine',
                'text',
                array('label' => 'Ramal',
                      'attr' => array()
            ))
            ->add(
                'isMainPhone',
                'radio',
                array('label' => 'Usar como contato principal',
                    'attr' => array()
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\HouseBundle\Entity\House\Address\Phone'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_housebundle_house_address_phone';
    }
}
