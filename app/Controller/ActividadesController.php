<?php
App::uses('AppController', 'Controller');
/**
 * Actividades Controller
 *
 * @property Actividade $Actividade
 */
class ActividadesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$actividades = $this->Actividade->find("all", array('conditions' => array('activo' => 1)));
		$this->set(compact('actividades'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Actividade->id = $id;
		$actividade = $this->__findActividade($this->Actividade->id);
		$this->set(compact('actividade'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Actividade->create();
			if ($this->Actividade->save($this->request->data)) {
				$this->Session->setFlash(__('The actividade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actividade could not be saved. Please, try again.'));
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
		$this->Actividade->id = $id;
		$actividade           = $this->__findActividade($this->Actividade->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Actividade->save($this->request->data)) {
				$this->Session->setFlash(__('The actividade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actividade could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $actividade;
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
	public function delete($id = null) {
		$this->Actividade->id = $id;
		$actividade           = $this->__findActividade($this->Actividade->id);
		if ($this->Actividade->delete()) {
			$this->Session->setFlash(__('Actividade deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Actividade was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	private function __lists()
	{
		$users = $this->Actividade->User->find('list');
		$this->set(compact('users'));
	}

	private function __findActividade($id = NULL)
	{
		$actividad = $this->Actividade->find('first', array('conditions'=>array('Actividade.id =' => $id)));
		if (empty($actividad)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $actividad;
	}
}

