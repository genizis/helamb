<?php

namespace CMS\PagesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\BaseBundle\Controller\BaseController;

/**
 * Page controller.
 *
 * @Route("/cms/pages")
 */
class PageController extends BaseController
{
    protected $configs = array(
            'prefix_route' => 'cms_pages',
            'icon' => 'fa-tag',
            'singular_name' => 'Página',
            'plural_name' => 'Páginas',
            'entity' => 'PagesBundle:Page',
            'entity_class' => 'CMS\PagesBundle\Entity\Page',
            'entity_form' => 'CMS\PagesBundle\Form\PageType',
            'title_field' => 'title',
            'list_fields' => array(
						       'title' => 'Título',
						       'created'=> array('type' => 'date', 'label' => 'Data Cadastro', 'class' => 'col-sm-2'),
						       'isActive'=> array('type' => 'boolean', 'label' => 'Ativo', 'class' => 'col-sm-1')
                            ),
            'show_fields' => array(
						        'title' => 'Título',
						        'created'=> array('type' => 'date', 'label' => 'Data Cadastro'),
						        'image' => array('type' => 'image', 'label' => 'Imagem', 'path' => 'uploads/page/thumbnail'),
						        'isActive'=> array('type' => 'boolean', 'label' => 'Ativo')
				            )
        );

	protected $upload_fields = array(
		'image' => array('path' => 'web/uploads/page', 'get'=> 'getImage', 'set'=> 'setImage')
	);
	protected $crop_fields = array(
		'image' => array(
			'thumbnail' => array('width' => 200, 'height' => 200, 'crop' => true),
			'medium' => array('width' => 500, 'height' => 500, 'crop' => true)
		)
	);

    /**
     * Lists all Page entities.
     *
     * @Route("/", name="cms_pages")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {
	    return parent::indexAction();
    }
    /**
     * Creates a new Page entity.
     *
     * @Route("/", name="cms_pages_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {
	    return parent::createAction($request);
    }

    /**
     * Displays a form to create a new Page entity.
     *
     * @Route("/new", name="cms_pages_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {
	    return parent::newAction();
    }

    /**
     * Finds and displays a Page entity.
     *
     * @Route("/show/{id}", name="cms_pages_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {
	    return parent::showAction($id);
    }

    /**
     * Displays a form to edit an existing Page entity.
     *
     * @Route("/edit/{id}", name="cms_pages_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {
	    return parent::editAction($id);
    }

    /**
     * Edits an existing Page entity.
     *
     * @Route("/{id}", name="cms_pages_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
	    return parent::updateAction($request, $id);
    }
    /**
     * Deletes a Page entity.
     *
     * @Route("/delete/{id}", name="cms_pages_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
	    return parent::deleteAction($request, $id);
    }
    /**
     * Deletes a Page entity.
     *
     * @Route("/deleteAll", name="cms_pages_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {
	    return parent::deleteAllAction($request);
    }
}
