<?php

namespace CMS\GeneralEntriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MusicGenreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                'text', array(
                    'label' => 'Nome',
            ))
            ->add('description', 'textarea', array( 'label' => 'Descrição', 'attr' => array('rows' => '10'), 'required' => false))
            ->add(
                'source',
                'text',
                array(
                    'label' => 'Fonte',
                    'attr' => array(
                        'input_group' => array(
                            'prepend' => 'http://',
                            'size'    => 'small'
                        )
                    ),
                    'required' => false
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\GeneralEntriesBundle\Entity\MusicGenre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_generalentriesbundle_musicgenre';
    }
}
