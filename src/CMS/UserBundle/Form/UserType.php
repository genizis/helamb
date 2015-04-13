<?php

namespace CMS\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', 'text', array( 'label' => 'Nome', 'attr' => array('class' => 'form-control', 'placeholder' => 'Nome')))
            ->add('username', 'text', array( 'label' => 'Username', 'attr' => array('class' => 'form-control', 'placeholder' => 'Username')))
            ->add('password', 'password', array( 'label' => 'Senha', 'attr' => array('class' => 'form-control', 'placeholder' => 'Senha')))
            ->add('salt', 'hidden')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_userbundle_user';
    }
}
