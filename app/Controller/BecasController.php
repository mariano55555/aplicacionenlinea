<?php
App::uses('AppController', 'Controller');
/**
 * Becas Controller
 *
 * @property Beca $Beca
 */
class BecasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$becas = $this->Beca->find("all");
		$this->set(compact('becas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Beca->id = $id;
		$beca = $this->__findBeca($this->Beca->id);
		$this->set(compact('beca'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Beca->create();
			if ($this->Beca->save($this->request->data)) {
				$this->Session->setFlash(__('The beca has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The beca could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		$this->Beca->id = $id;
		$beca = $this->__findBeca($this->Beca->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Beca->save($this->request->data)) {
				$this->Session->setFlash(__('The beca has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The beca could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $beca;
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
		$this->Beca->id = $id;
		$beca = $this->__findBeca($this->Beca->id);
		if ($this->Beca->delete()) {
			$this->Session->setFlash(__('Beca deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Beca was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function __lists()
	{
		$users = $this->Beca->User->find('list');
		$this->set(compact('users'));
	}

	private function __findBeca($id = NULL)
	{
		$becas = $this->Beca->find('first', array('conditions'=>array('Beca.id =' => $id)));
		if (empty($becas)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $becas;
	}
}
