<?php

namespace CMS\NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use CMS\BaseBundle\Form\GalleryType;

class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array( 'label' => 'title', 'attr' => array('class' => 'form-control', 'placeholder' => 'title')))
	        ->add('description', 'textarea', array( 'label' => 'description', 'required' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'description')))
	        ->add('resumo', 'textarea', array( 'label' => 'Resumo', 'required' => false, 'attr' => array('class' => 'form-control', 'placeholder' => 'Resumo')))
	        ->add('publishAt', 'date', array( 'label' => 'publishAt', 'required' => false, 'widget' => 'single_text','format' => 'dd-MM-yyyy',))
            ->add('isActive', 'checkbox', array( 'label' => 'isActive'))
            ->add('image', new GalleryType(), array( 'label' => 'image', 'required' => false, 'data_class' => null, 'attr' => array('destiny_path' => 'uploads/gallery/')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMS\NewsBundle\Entity\News'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cms_newsbundle_news';
    }
}
