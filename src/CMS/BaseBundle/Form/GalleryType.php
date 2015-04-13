<?php

namespace CMS\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class GalleryType extends CollectionType
{
	public function getName()
	{
		return 'gallery';
	}
}