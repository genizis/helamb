<?php

namespace CMS\CityBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use CMS\BaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\CityBundle\Entity\City;
use CMS\CityBundle\Form\CityType;

/**
 * City controller.
 *
 * @Route("/cms/cidades")
 */
class CityController extends BaseController
{
        protected $configs = array(
            'prefix_route' => 'cms_cidades',
            'icon' => 'fa-tag',
            'singular_name' => 'Cidade',
            'plural_name' => 'Cidades',
            'entity' => 'CMSCityBundle:City',
            'entity_class' => 'CMS\CityBundle\Entity\City',
            'entity_form' => 'CMS\CityBundle\Form\CityType',
            'title_field' => 'name',
            'list_fields' => array('nameWithState' => 'Nome'),
            'show_fields' => array('name' => 'Nome')
        );

    /**
     * Lists all City entities.
     *
     * @Route("/", name="cms_cidades")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {

        return parent::indexAction();


    }
    /**
     * Creates a new City entity.
     *
     * @Route("/", name="cms_cidades_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {

    return parent::createAction($request);


    }

    /**
     * Displays a form to create a new City entity.
     *
     * @Route("/new", name="cms_cidades_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {

        return parent::newAction();


    }

    /**
     * Finds and displays a City entity.
     *
     * @Route("/show/{id}", name="cms_cidades_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {

        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing City entity.
     *
     * @Route("/edit/{id}", name="cms_cidades_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {

        return parent::editAction($id);

    }    /**
     * Edits an existing City entity.
     *
     * @Route("/{id}", name="cms_cidades_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);
    }
    /**
     * Deletes a City entity.
     *
     * @Route("/delete/{id}", name="cms_cidades_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    /**
     * Deletes a City entity.
     *
     * @Route("/deleteAll", name="cms_cidades_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {

        return parent::deleteAllAction($request);

    }
}
