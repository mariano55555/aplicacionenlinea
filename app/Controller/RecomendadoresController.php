<?php
App::uses('AppController', 'Controller');
/**
 * Recomendadores Controller
 *
 * @property Recomendadore $Recomendadore
 */
class RecomendadoresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$recomendadores = $this->Recomendadore->find('all');
		$this->set(compact('recomendadores'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Recomendadore->id = $id;
		$recomendadore = $this->__findRecomendador($this->Recomendadore->id);
		$this->set(compact('recomendadore'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Recomendadore->create();
			if ($this->Recomendadore->save($this->request->data)) {
				$this->Session->setFlash(__('The recomendadore has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recomendadore could not be saved. Please, try again.'));
			}
		}
		$this->__lists();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Recomendadore->id = $id;
		$recomendadore = $this->__findRecomendador($this->Recomendadore->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recomendadore->save($this->request->data)) {
				$this->Session->setFlash(__('The recomendadore has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recomendadore could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $recomendadore;
		}
		$this->__lists();
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Recomendadore->id = $id;
		$recomendadore = $this->__findRecomendador($this->Recomendadore->id);
		if ($this->Recomendadore->delete()) {
			$this->Session->setFlash(__('Recomendadore deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recomendadore was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	private function __lists()
	{
		$cargos = $this->Recomendadore->Cargo->find('list');
		$users = $this->Recomendadore->User->find('list');
		$this->set(compact('cargos', 'users'));
	}

	private function __findRecomendador($id = NULL)
	{
		$recomendador = $this->Recomendadore->find('first', array('conditions'=>array('Recomendadore.id =' => $id)));
		if (empty($recomendador)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $recomendador;
	}


}
