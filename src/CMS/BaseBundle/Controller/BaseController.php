<?php

namespace CMS\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class BaseController extends Controller
{
	protected $configs = array();
	protected $upload_fields = array();
	protected $crop_fields = array();

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

            $flash = $this->get('braincrafted_bootstrap.flash');
            $flash->success($this->configs['singular_name'] . ' adicionado com sucesso');

            if(isset($_POST[$form->getName()]['actions']['submit_add_new'])){
                return $this->redirect($this->generateUrl($this->configs['prefix_route'] . '_new'));
            }
            else {
                return $this->redirect($this->generateUrl($this->configs['prefix_route'] . '_show', array('id' => $entity->getId())));
            }

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

            $title = ucwords($this->configs['title_field']);
            $title = 'get' . $title;

            $flash = $this->get('braincrafted_bootstrap.flash');
			$flash->success($this->configs['singular_name'] . ' "' . $entity->$title() . '" alterado com sucesso');

            if(isset($_POST[$editForm->getName()]['actions']['submit_go_back'])){
                return $this->redirect($this->generateUrl($this->configs['prefix_route']));
            }
            else {
                return $this->redirect($this->generateUrl($this->configs['prefix_route'] . '_edit', array('id' => $id)));
            }
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

        $title = ucwords($this->configs['title_field']);
        $title = 'get' . $title;

        $flash = $this->get('braincrafted_bootstrap.flash');
        $flash->success($this->configs['singular_name'] . ' "' . $entity->$title() . '" removido com sucesso');

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

        $flash = $this->get('braincrafted_bootstrap.flash');
        $flash->success($this->configs['plural_name'] . ' removidos com sucesso');

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

        $form->add('actions', 'form_actions');
        $form->get('actions')->add('submit', 'submit', array('label' => 'Salvar', 'attr' => array('class' => 'btn btn-success')));
        $form->get('actions')->add('submit_add_new', 'submit', array('label' => 'Salvar e adicionar novo', 'attr' => array('class' => 'btn btn-info', 'value' => '1')));

		return $form;
	}

	private function createEditForm($entity)
	{
		$form = $this->createForm($this->getNewEntityForm(), $entity, array(
			'action' => $this->generateUrl($this->configs['prefix_route'] . '_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

        $form->add('actions', 'form_actions');
        $form->get('actions')->add('submit', 'submit', array('label' => 'Salvar', 'attr' => array('class' => 'btn btn-success')));
        $form->get('actions')->add('submit_go_back', 'submit', array('label' => 'Salvar e voltar', 'attr' => array('class' => 'btn btn-info', 'value' => '1')));

		return $form;
	}

}
