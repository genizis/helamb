<?php

namespace CMS\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array( 'label' => 'title', 'attr' => array('class' => 'form-control', 'placeholder' => 'title')))
            ->add('description', 'textarea', array( 'label' => 'description', 'required' => false, 'attr' => array('class' => 'form-control summernote', 'placeholder' => 'description')))
            ->add('image', 'file', array( 'label' => 'image', 'required' => false, 'data_class' => null))
            ->add('isActive', 'checkbox', array( 'label' => 'isActive'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\PagesBundle\Entity\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_pagesbundle_page';
    }
}
