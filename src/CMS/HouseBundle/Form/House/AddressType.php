<?php

namespace CMS\HouseBundle\Form\House;

use CMS\HouseBundle\Form\House\Address\PhoneType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'phones',
                'collection',
                array(
                    'type' => new PhoneType(),
                    'label' => 'Telefones',
                    'allow_add'          => true,
                    'allow_delete'       => true,
                )
            )
            ->add(
                'street',
                'text',
                array('label' => 'Rua',
                      'attr' => array()
            ))
            ->add(
                'district',
                'text',
                array('label' => 'Bairro',
                      'attr' => array()
            ))
            ->add(
                'postcode',
                'text',
                array('label' => 'CEP',
                      'attr' => array()
            ))
            ->add(
                'city',
                null,
                array('label' => 'Cidade',
                      'attr' => array()
            ))
            ->add(
                'complement',
                'text',
                array('label' => 'Complemento',
                      'attr' => array()
            ))
            ->add(
                'title',
                'text',
                array('label' => 'Nome',
                      'attr' => array()
            ))
            ->add(
                'isMainAddress',
                'radio',
                array('label' => 'Usar como endereço principal',
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
            'data_class' => 'CMS\HouseBundle\Entity\House\Address',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_housebundle_house_address';
    }
}
