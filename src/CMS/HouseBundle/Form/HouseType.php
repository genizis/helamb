<?php

namespace CMS\HouseBundle\Form;

use CMS\BaseBundle\Form\GalleryType;
use CMS\HouseBundle\Form\House\AddressType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HouseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add(
                'addresses',
                'collection',
                array(
                    'type' => new AddressType(),
                    'label' => 'Endereços',
                    'allow_add'          => true,
                    'allow_delete'       => true,
                )
            )*/
            /*->add(
                'banners',
                new GalleryType(),
                array(
                    'data_class' => null,
                    'attr' => array(
                        'destiny_path' => 'uploads/house/banners/'
                    )
                )
            )*/
            ->add(
                'isActive',
                'checkbox',
                array('label' => 'Ativar estabelecimento',
                    'attr' => array()
                ))
            ->add(
                'name',
                'text',
                array('label' => 'Nome',
                      'attr' => array()
            ))
            ->add(
                'email',
                'email',
                array('label' => 'E-mail',
                    'attr' => array()
                ))
            ->add(
                'description',
                'textarea',
                array('label' => 'Sobre a casa',
                      'attr' => array('rows' => 10)
            ))
            ->add(
                'musicGenres',
                null,
                array('label' => 'Estilos musicais apresentados',
                    'attr' => array(),
                    'multiple' => true,
                    'expanded' => true
                ))
            ->add(
                'houseMap',
                'file',
                array('label' => 'Mapa da casa',
                    'attr' => array(),
                    'data_class' => null,
                    'required' => false
                ))
            ->add(
                'paymentMethod',
                'textarea',
                array('label' => 'Descrição das formas de pagamento',
                      'attr' => array('rows' => 5)
            ))
            ->add(
                'physicalSpace',
                'textarea',
                array('label' => 'Descrição do espaço físico',
                      'attr' => array('rows' => 5)
            ))
            ->add(
                'parkingPrice',
                'money',
                array('label' => 'Valor estacionamento',
                      'attr' => array(),
                      'currency' => 'BRL'
            ))
            ->add(
                'additionalServices',
                'textarea',
                array('label' => 'Serciços adicionais',
                      'attr' => array('rows' => 5)
            ))
            ->add(
                'workingHours',
                'textarea',
                array('label' => 'Horários de atendimento',
                      'attr' => array('rows' => 5)
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\HouseBundle\Entity\House'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_housebundle_house';
    }
}
