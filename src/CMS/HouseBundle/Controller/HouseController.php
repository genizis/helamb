<?php

namespace CMS\HouseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use CMS\BaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\HouseBundle\Entity\House;
use CMS\HouseBundle\Form\HouseType;

/**
 * House controller.
 *
 * @Route("/cms/estabelecimentos")
 */
class HouseController extends BaseController
{
        protected $configs = array(
            'prefix_route' => 'cms_estabelecimentos',
            'icon' => 'fa-tag',
            'singular_name' => 'Estabelecimento',
            'plural_name' => 'Estabelecimentos',
            'entity' => 'CMSHouseBundle:House',
            'entity_class' => 'CMS\HouseBundle\Entity\House',
            'entity_form' => 'CMS\HouseBundle\Form\HouseType',
            'title_field' => 'name',
            'list_fields' => array('name' => 'Nome'),
            'show_fields' => array('name' => 'Nome')
        );

    /**
     * Lists all House entities.
     *
     * @Route("/", name="cms_estabelecimentos")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {

        return parent::indexAction();


    }
    /**
     * Creates a new House entity.
     *
     * @Route("/", name="cms_estabelecimentos_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {

    return parent::createAction($request);


    }

    /**
     * Displays a form to create a new House entity.
     *
     * @Route("/new", name="cms_estabelecimentos_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {

        return parent::newAction();


    }

    /**
     * Finds and displays a House entity.
     *
     * @Route("/show/{id}", name="cms_estabelecimentos_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {

        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing House entity.
     *
     * @Route("/edit/{id}", name="cms_estabelecimentos_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {

        return parent::editAction($id);

    }    /**
     * Edits an existing House entity.
     *
     * @Route("/{id}", name="cms_estabelecimentos_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);
    }
    /**
     * Deletes a House entity.
     *
     * @Route("/delete/{id}", name="cms_estabelecimentos_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    /**
     * Deletes a House entity.
     *
     * @Route("/deleteAll", name="cms_estabelecimentos_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {

        return parent::deleteAllAction($request);

    }
}
