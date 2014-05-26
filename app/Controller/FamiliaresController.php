<?php
App::uses('AppController', 'Controller');
/**
 * Familiares Controller
 *
 * @property Familiare $Familiare
 */
class FamiliaresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$familiares = $this->Familiare->find("all");
		$this->set(compact('familiares'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Familiare->id = $id;
		$familiare = $this->__findFamiliar($this->Familiare->id);
		$this->set(compact('familiare'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Familiare->create();
			if ($this->Familiare->save($this->request->data)) {
				$this->Session->setFlash(__('The familiare has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The familiare could not be saved. Please, try again.'));
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
		$this->Familiare->id = $id;
		$familiare = $this->__findFamiliar($this->Familiare->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Familiare->save($this->request->data)) {
				$this->Session->setFlash(__('The familiare has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The familiare could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $familiare;
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
		$this->Familiare->id = $id;
		$familiare = $this->__findFamiliar($this->Familiare->id);
		if ($this->Familiare->delete()) {
			$this->Session->setFlash(__('Familiare deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Familiare was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	private function __lists()
	{
		$tipofamiliars = $this->Familiare->Tipofamiliar->find('list');
		$users = $this->Familiare->User->find('list');
		$this->set(compact('tipofamiliars', 'users'));
	}

	private  function __findFamiliar($id = NULL)
	{
		$familiar = $this->Familiare->find('first', array('conditions'=>array('Familiare.id =' => $id)));
		if (empty($familiar)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $familiar;
	}
}
