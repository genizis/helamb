<?php

namespace CMS\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CMS\UserBundle\Entity\User;
use CMS\UserBundle\Form\UserType;
use CMS\BaseBundle\Controller\BaseController;

/**
 * User controller.
 *
 * @Route("/cms/users")
 */
class UserController extends BaseController
{
	protected $configs = array(
		'prefix_route' => 'cms_users',
		'icon' => 'fa-users',
		'singular_name' => 'Usuário',
		'plural_name' => 'Usuários',
		'entity' => 'UserBundle:User',
		'entity_class' => 'CMS\UserBundle\Entity\User',
		'entity_form' => 'CMS\UserBundle\Form\UserType',
		'title_field' => 'nome',
		'list_fields' => array('nome' => 'Nome', 'username' => 'Username'),
		'show_fields' => array('nome' => 'Nome', 'username' => 'Username')
	);

    /**
     * Lists all User entities.
     *
     * @Route("/", name="cms_users")
     * @Method("GET")
     * @Template("::cms/crud/index.html.twig")
     */
    public function indexAction()
    {
	    return parent::indexAction();
    }
    /**
     * Creates a new User entity.
     *
     * @Route("/", name="cms_users_create")
     * @Method("POST")
     * @Template("::cms/crud/new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new $this->configs['entity_class'];
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setPassword($this->encondePassword($entity,$form->getData()->getPassword()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl($this->configs['prefix_route'] . '_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'configs' => $this->configs
        );
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm($entity)
    {
        $form = $this->createForm(new $this->configs['entity_form'], $entity, array(
            'action' => $this->generateUrl($this->configs['prefix_route'] . '_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Salvar', 'attr' => array('class' => 'btn btn-success')));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="cms_users_new")
     * @Method("GET")
     * @Template("::cms/crud/new.html.twig")
     */
    public function newAction()
    {
	    return parent::newAction();
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/show/{id}", name="cms_users_show")
     * @Method("GET")
     * @Template("::cms/crud/show.html.twig")
     */
    public function showAction($id)
    {
	    return parent::showAction($id);
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/edit/{id}", name="cms_users_edit")
     * @Method("GET")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function editAction($id)
    {
	    return parent::editAction($id);
    }

    /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity)
    {
        $form = $this->createForm(new $this->configs['entity_form'], $entity, array(
            'action' => $this->generateUrl($this->configs['prefix_route'] . '_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Salvar', 'attr' => array('class' => 'btn btn-success')));

        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     * @Route("/{id}", name="cms_users_update")
     * @Method("PUT")
     * @Template("::cms/crud/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository($this->configs['entity'])->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if($editForm->getData()->getPassword() != ''){
                $entity->setPassword($this->encondePassword($entity,$editForm->getData()->getPassword()));
            }else{
                $entity->setPassword($entity->getPassword());
            }
            
            $em->flush();

            return $this->redirect($this->generateUrl($this->configs['prefix_route'] . '_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'configs' => $this->configs
        );
    }
    /**
     * Deletes a User entity.
     *
     * @Route("/delete/{id}", name="cms_users_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
	    return parent::deleteAction($request, $id);
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/deleteAll", name="cms_users_delete_all")
     * @Method("POST")
     */
    public function deleteAllAction(Request $request)
    {
	    return parent::deleteAllAction($request);
    }

    private function encondePassword($user, $plainPassword){
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}
