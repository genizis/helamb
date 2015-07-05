<?php

namespace CMS\HouseBundle\Controller\House;

use Symfony\Component\HttpFoundation\Request;
use CMS\BaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\HouseBundle\Entity\House\Review;
use CMS\HouseBundle\Form\House\ReviewType;

/**
 * House\Review controller.
 *
 * @Route("/cms/estabelecimentos/avaliacoes")
 */
class ReviewController extends BaseController
{
        protected $configs = array(
            'prefix_route' => 'cms_estabelecimentos_avaliacoes',
            'icon' => 'fa-star',
            'singular_name' => 'Avaliação',
            'plural_name' => 'Avaliações de Estabelecimentos',
            'entity' => 'CMSHouseBundle:House\Review',
            'entity_class' => 'CMS\HouseBundle\Entity\House\Review',
            'entity_form' => 'CMS\HouseBundle\Form\House\ReviewType',
            'title_field' => 'house',
            'list_fields' => array( 'personName' => 'Nome', 'house' => 'Estabelecimento', 'score' => 'Nota'),
            'show_fields' => array()
        );

    /**
     * Lists all House\Review entities.
     *
     * @Route("/", name="cms_estabelecimentos_avaliacoes")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {

        return parent::indexAction();


    }
    /**
     * Creates a new House\Review entity.
     *
     * @Route("/", name="cms_estabelecimentos_avaliacoes_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {

    return parent::createAction($request);


    }

    /**
     * Displays a form to create a new House\Review entity.
     *
     * @Route("/new", name="cms_estabelecimentos_avaliacoes_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {

        return parent::newAction();


    }

    /**
     * Finds and displays a House\Review entity.
     *
     * @Route("/show/{id}", name="cms_estabelecimentos_avaliacoes_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {

        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing House\Review entity.
     *
     * @Route("/edit/{id}", name="cms_estabelecimentos_avaliacoes_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {

        return parent::editAction($id);

    }    /**
     * Edits an existing House\Review entity.
     *
     * @Route("/{id}", name="cms_estabelecimentos_avaliacoes_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);
    }
    /**
     * Deletes a House\Review entity.
     *
     * @Route("/delete/{id}", name="cms_estabelecimentos_avaliacoes_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    /**
     * Deletes a House\Review entity.
     *
     * @Route("/deleteAll", name="cms_estabelecimentos_avaliacoes_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {

        return parent::deleteAllAction($request);

    }
}
