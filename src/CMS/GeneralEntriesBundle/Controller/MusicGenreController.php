<?php

namespace CMS\GeneralEntriesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use CMS\BaseBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\GeneralEntriesBundle\Entity\MusicGenre;
use CMS\GeneralEntriesBundle\Form\MusicGenreType;

/**
 * MusicGenre controller.
 *
 * @Route("/cms/cadastros/estilo_musical")
 */
class MusicGenreController extends BaseController
{
        protected $configs = array(
            'prefix_route' => 'cms_cadastros_estilo_musical',
            'icon' => 'fa-music',
            'singular_name' => 'Estilo Musical',
            'plural_name' => 'Estilos Musicais',
            'entity' => 'CMSGeneralEntriesBundle:MusicGenre',
            'entity_class' => 'CMS\GeneralEntriesBundle\Entity\MusicGenre',
            'entity_form' => 'CMS\GeneralEntriesBundle\Form\MusicGenreType',
            'title_field' => 'name',
            'list_fields' => array('name' => 'Nome'),
            'show_fields' => array('name' => 'Nome', 'description' => 'Descrição', 'source' => 'Fonte')
        );

    /**
     * Lists all MusicGenre entities.
     *
     * @Route("/", name="cms_cadastros_estilo_musical")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {

        return parent::indexAction();


    }
    /**
     * Creates a new MusicGenre entity.
     *
     * @Route("/", name="cms_cadastros_estilo_musical_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {

    return parent::createAction($request);


    }

    /**
     * Displays a form to create a new MusicGenre entity.
     *
     * @Route("/new", name="cms_cadastros_estilo_musical_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {

        return parent::newAction();


    }

    /**
     * Finds and displays a MusicGenre entity.
     *
     * @Route("/show/{id}", name="cms_cadastros_estilo_musical_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {

        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing MusicGenre entity.
     *
     * @Route("/edit/{id}", name="cms_cadastros_estilo_musical_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {

        return parent::editAction($id);

    }    /**
     * Edits an existing MusicGenre entity.
     *
     * @Route("/{id}", name="cms_cadastros_estilo_musical_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);
    }
    /**
     * Deletes a MusicGenre entity.
     *
     * @Route("/delete/{id}", name="cms_cadastros_estilo_musical_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
    /**
     * Deletes a MusicGenre entity.
     *
     * @Route("/deleteAll", name="cms_cadastros_estilo_musical_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {

        return parent::deleteAllAction($request);

    }
}
