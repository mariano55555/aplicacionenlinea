<?php
App::uses('AppController', 'Controller');
/**
 * InstitucionesAdicionales Controller
 *
 * @property InstitucionesAdicionale $InstitucionesAdicionale
 */
class InstitucionesAdicionalesController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$institucionesAdicionales = $this->InstitucionesAdicionale->find("all");
		$this->set(compact('institucionesAdicionales'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$institucionesAdicionale = $this->__findInstitucionAdicional($id);
		$this->set(compact('institucionesAdicionale'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->InstitucionesAdicionale->create();
			if ($this->InstitucionesAdicionale->save($this->request->data)) {
				$this->Session->setFlash(__('The instituciones adicionale has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instituciones adicionale could not be saved. Please, try again.'));
			}
		}
		$this->__lists();
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->InstitucionesAdicionale->exists($id)) {
			throw new NotFoundException(__('Invalid instituciones adicionale'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InstitucionesAdicionale->save($this->request->data)) {
				$this->Session->setFlash(__('The instituciones adicionale has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instituciones adicionale could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InstitucionesAdicionale.' . $this->InstitucionesAdicionale->primaryKey => $id));
			$this->request->data = $this->InstitucionesAdicionale->find('first', $options);
		}
		$this->__lists();
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->InstitucionesAdicionale->id = $id;
		if (!$this->InstitucionesAdicionale->exists()) {
			throw new NotFoundException(__('Invalid instituciones adicionale'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InstitucionesAdicionale->delete()) {
			$this->Session->setFlash(__('Instituciones adicionale deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Instituciones adicionale was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	private function __lists()
	{
		$pais = $this->InstitucionesAdicionale->Pai->find('list');
		$this->set(compact('pais'));
	}

	private function __findInstitucionAdicional($id = NULL)
	{
		
		$institucione = $this->InstitucionesAdicionale->find('first', array('conditions'=>array('InstitucionesAdicionale.id =' => $id)));
		if (empty($institucione)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $institucione;
	}
}
