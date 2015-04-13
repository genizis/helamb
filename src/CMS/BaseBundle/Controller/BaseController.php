<?php

namespace CMS\BaseBundle\Controller;

use Doctrine\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

abstract class BaseController extends Controller
{
	protected $configs = array();
	protected $upload_fields = null;
	protected $crop_fields = null;

	protected function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository($this->configs['entity'])->findAll();

		return array(
			'entities' => $entities,
			'configs' => $this->configs
		);
	}

	protected function createAction(Request $request)
	{
		$entity = $this->getNewEntity();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();

			foreach ( $this->upload_fields as $key => $value ) {
				$file = $form[$key]->getData();
				if ($file)
				{
					$picture = $this->get("tools")->uploadFile($file, $value['path']);
					if(isset($this->crop_fields[$key])){
						foreach($this->crop_fields[$key] as $k => $v){
							$params['src'] = $value['path'];
							$params['dist'] = $value['path'] . '/' . $k;
							$params['width'] = $v['width'];
							$params['height'] = $v['height'];

							$this->get("tools")->resizeImage($picture, $params, $v['crop']);
						}
					}
					call_user_func_array(array($entity, $value['set']), array($picture));
				}
			}

			$em->persist($entity);
			$em->flush();

			$this->get('session')->getFlashBag()->add('title', $this->configs['singular_name']);
			$this->get('session')->getFlashBag()->add('message', 'Novo registro adicionado com sucesso');

			return $this->redirect($this->generateUrl($this->configs['prefix_route'] . '_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form'   => $form->createView(),
			'configs' => $this->configs
		);
	}

	protected function newAction()
	{
		$entity = $this->getNewEntity();
		$form   = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form'   => $form->createView(),
			'configs' => $this->configs
		);
	}

	protected function showAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository($this->configs['entity'])->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Page entity.');
		}

		return array(
			'entity'      => $entity,
			'configs' => $this->configs
		);
	}

	protected function editAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository($this->configs['entity'])->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Page entity.');
		}

		$editForm = $this->createEditForm($entity);

		return array(
			'entity'      => $entity,
			'edit_form'   => $editForm->createView(),
			'configs' => $this->configs
		);
	}

	protected function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository($this->configs['entity'])->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Page entity.');
		}

		foreach ( $this->upload_fields as $key => $value ) {
			$files[$key] = call_user_func(array($entity, $value['get']));
		}

		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {

			foreach ( $this->upload_fields as $key => $value ) {
				$file = $editForm[$key]->getData();
				if ($file)
				{
					$picture = $this->get("tools")->uploadFile($file, $value['path']);

					if(file_exists($value['path'] . '/' . $files[$key])){
						@unlink($value['path'] . '/' . $files[$key]);
					}

					if(isset($this->crop_fields[$key])){
						foreach($this->crop_fields[$key] as $k => $v){
							$params['src'] = $value['path'];
							$params['dist'] = $value['path'] . '/' . $k;
							$params['width'] = $v['width'];
							$params['height'] = $v['height'];

							$this->get("tools")->resizeImage($picture, $params, $v['crop']);

							if(file_exists($value['path'] . '/' . $k . '/' . $files[$key])){
								@unlink($value['path'] . '/' . $k . '/' . $files[$key]);
							}
						}
					}
					call_user_func_array(array($entity, $value['set']), array($picture));
				}else{
					call_user_func_array(array($entity, $value['set']), array($files[$key])) ;
				}
			}

			$em->flush();

			$this->get('session')->getFlashBag()->add('title', $this->configs['singular_name']);
			$this->get('session')->getFlashBag()->add('message', 'Registro editado com sucesso');

			return $this->redirect($this->generateUrl($this->configs['prefix_route'] . '_edit', array('id' => $id)));
		}

		return array(
			'entity'      => $entity,
			'edit_form'   => $editForm->createView(),
			'configs' => $this->configs
		);
	}

	protected function deleteAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository($this->configs['entity'])->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Page entity.');
		}

		foreach ( $this->upload_fields as $key => $value ) {
			$file = call_user_func(array($entity, $value['get']));

			if(file_exists($value['path'] . '/' . $file)){
				@unlink($value['path'] . '/' . $file);
			}

			foreach($this->crop_fields[$key] as $k => $v){
				if(file_exists($value['path'] . '/' . $k . '/' . $file)){
					@unlink($value['path'] . '/' . $k . '/' . $file);
				}
			}
		}

		$em->remove($entity);
		$em->flush();

		$this->get('session')->getFlashBag()->add('title', $this->configs['singular_name']);
		$this->get('session')->getFlashBag()->add('message', 'Registro removido com sucesso');

		return $this->redirect($this->generateUrl($this->configs['prefix_route']));
	}

	protected function deleteAllAction(Request $request)
	{
		$records = $request->request->get('records');

		foreach ($records as $record) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository($this->configs['entity'])->find($record);

			foreach ( $this->upload_fields as $key => $value ) {
				$file = call_user_func(array($entity, $value['get']));

				if(file_exists($value['path'] . '/' . $file)){
					@unlink($value['path'] . '/' . $file);
				}

				foreach($this->crop_fields[$key] as $k => $v){
					if(file_exists($value['path'] . '/' . $k . '/' . $file)){
						@unlink($value['path'] . '/' . $k . '/' . $file);
					}
				}
			}

			$em->remove($entity);
			$em->flush();

		}

		$this->get('session')->getFlashBag()->add('title', $this->configs['singular_name']);
		$this->get('session')->getFlashBag()->add('message', 'Todos os registros foram removido com sucesso');

		return $this->redirect($this->generateUrl($this->configs['prefix_route']));
	}

	public function getNewEntity(){
		return new $this->configs['entity_class'];
	}

	public function getNewEntityForm(){
		return new $this->configs['entity_form'];
	}


	private function createCreateForm($entity)
	{
		$form = $this->createForm($this->getNewEntityForm(), $entity, array(
			'action' => $this->generateUrl($this->configs['prefix_route'] . '_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Salvar', 'attr' => array('class' => 'btn btn-success')));

		return $form;
	}

	private function createEditForm($entity)
	{
		$form = $this->createForm($this->getNewEntityForm(), $entity, array(
			'action' => $this->generateUrl($this->configs['prefix_route'] . '_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Salvar', 'attr' => array('class' => 'btn btn-success')));

		return $form;
	}

}
