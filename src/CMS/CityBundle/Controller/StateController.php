<?php

namespace CMS\CityBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use CMS\BaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\CityBundle\Entity\State;
use CMS\CityBundle\Form\StateType;

/**
 * State controller.
 *
 * @Route("/cms/estados")
 */
class StateController extends BaseController
{
        protected $configs = array(
            'prefix_route' => 'cms_estados',
            'icon' => 'fa-tag',
            'singular_name' => 'Estado',
            'plural_name' => 'Estados',
            'entity' => 'CMSCityBundle:State',
            'entity_class' => 'CMS\CityBundle\Entity\State',
            'entity_form' => 'CMS\CityBundle\Form\StateType',
            'title_field' => 'name',
            'list_fields' => array('name' => 'Nome', 'regionName' => 'Região'),
            'show_fields' => array('name' => 'Nome', 'region' => 'Região')
        );

    /**
     * Lists all State entities.
     *
     * @Route("/", name="cms_estados")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {

        return parent::indexAction();


    }
    /**
     * Creates a new State entity.
     *
     * @Route("/", name="cms_estados_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {

    return parent::createAction($request);


    }

    /**
     * Displays a form to create a new State entity.
     *
     * @Route("/new", name="cms_estados_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {

        return parent::newAction();


    }

    /**
     * Finds and displays a State entity.
     *
     * @Route("/show/{id}", name="cms_estados_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {

        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing State entity.
     *
     * @Route("/edit/{id}", name="cms_estados_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {

        return parent::editAction($id);

    }    /**
     * Edits an existing State entity.
     *
     * @Route("/{id}", name="cms_estados_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);
    }
    /**
     * Deletes a State entity.
     *
     * @Route("/delete/{id}", name="cms_estados_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    /**
     * Deletes a State entity.
     *
     * @Route("/deleteAll", name="cms_estados_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {

        return parent::deleteAllAction($request);

    }
}
