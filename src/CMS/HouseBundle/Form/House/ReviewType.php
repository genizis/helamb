<?php

namespace CMS\HouseBundle\Form\House;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReviewType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'isApproved',
                'choice',
                array('label' => 'Situação',
                    'attr' => array(),
                    'choices' => array('Pendente', 'Aprovado')
                ))
            ->add(
                'house',
                null,
                array('label' => 'Estabelecimento',
                    'attr' => array()
                ))
            ->add(
                'personName',
                'text',
                array('label' => 'Nome',
                      'attr' => array()
            ))
            ->add(
                'personEmail',
                'email',
                array('label' => 'Email',
                      'attr' => array()
            ))
            ->add(
                'score',
                'choice',
                array('label' => 'Avaliação',
                      'attr' => array('inline' => true),
                      'label_attr' => array('style' => 'margin-right: 5px;'),
                      'choices' => [1, 2, 3, 4, 5],
                      'expanded' => true
            ))
            ->add(
                'comment',
                'textarea',
                array('label' => 'Comentários',
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
            'data_class' => 'CMS\HouseBundle\Entity\House\Review'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_housebundle_house_review';
    }
}
