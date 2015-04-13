<?php

namespace CMS\NewsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use CMS\BaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\NewsBundle\Entity\News;
use CMS\NewsBundle\Form\NewsType;

/**
 * News controller.
 *
 * @Route("/cms/news")
 */
class NewsController extends BaseController
{
	protected $configs = array(
            'prefix_route' => 'cms_news',
            'icon' => 'fa-tag',
            'singular_name' => 'News',
            'plural_name' => 'News',
            'entity' => 'NewsBundle:News',
            'entity_class' => 'CMS\NewsBundle\Entity\News',
            'entity_form' => 'CMS\NewsBundle\Form\NewsType',
            'title_field' => 'title',
            'list_fields' => array(
	            'title' => 'Título',
	            'createdAt'=> array('type' => 'date', 'label' => 'Data Cadastro', 'class' => 'col-sm-2'),
	            'isActive'=> array('type' => 'boolean', 'label' => 'Ativo', 'class' => 'col-sm-1')
            ),
            'show_fields' => array(
	            'title' => 'Título',
	            'createdAt' => array('type' => 'date', 'label' => 'Data Cadastro'),
	            'image' => array('type' => 'image', 'label' => 'Imagem', 'path' => 'uploads/news/thumbnail'),
	            'isActive'=> array('type' => 'boolean', 'label' => 'Ativo')
            )
        );

	protected $upload_fields = array(
		'image' => array('path' => 'web/uploads/news', 'get'=> 'getImage', 'set'=> 'setImage')
	);
	protected $crop_fields = array(
		'image' => array(
			'thumbnail' => array('width' => 200, 'height' => 200, 'crop' => true),
			'medium' => array('width' => 500, 'height' => 500, 'crop' => true)
		)
	);

    /**
     * Lists all News entities.
     *
     * @Route("/", name="cms_news")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {
        return parent::indexAction();
    }
    /**
     * Creates a new News entity.
     *
     * @Route("/", name="cms_news_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {

    return parent::createAction($request);


    }

    /**
     * Displays a form to create a new News entity.
     *
     * @Route("/new", name="cms_news_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {

        return parent::newAction();


    }

    /**
     * Finds and displays a News entity.
     *
     * @Route("/show/{id}", name="cms_news_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {

        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing News entity.
     *
     * @Route("/edit/{id}", name="cms_news_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {

        return parent::editAction($id);

    }    /**
     * Edits an existing News entity.
     *
     * @Route("/{id}", name="cms_news_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);
    }
    /**
     * Deletes a News entity.
     *
     * @Route("/delete/{id}", name="cms_news_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    /**
     * Deletes a News entity.
     *
     * @Route("/deleteAll", name="cms_news_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {

        return parent::deleteAllAction($request);

    }
}
