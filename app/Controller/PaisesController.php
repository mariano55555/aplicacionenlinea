<?php
App::uses('AppController', 'Controller');
/**
 * Paises Controller
 *
 * @property Paise $Paise
 */
class PaisesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$paises = $this->Paise->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $paises;
	    }else{
	      	$this->set(compact('paises'));
		}
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Paise->id = $id;
		$paise = $this->__findPais($this->Paise->id);
		$this->set(compact('paise'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('ajax')) {
			$this->layout ="ajax1";
		}
		if ($this->request->is('post')) {
			$this->Paise->create();
			if ($this->Paise->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/paises', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The paise has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The paise could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if ($this->request->is('ajax')) {
			$this->layout ="ajax1";
		}
		$this->Paise->id = $id;
		$paise = $this->__findPais($this->Paise->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Paise->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/paises', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The paise has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The paise could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $paise;
		}
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
		$this->Paise->id = $id;
		$paise = $this->__findPais($this->Paise->id);
		if ($this->Paise->delete()) {
			$this->Session->setFlash(__('Paise deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Paise was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Paise->id = $id;
		$this->__findPais($this->Paise->id);
		$data = array('activo' => 0);
		if ($this->Paise->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/paises', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
	//	$this->Session->setFlash(__('Cargo was not deleted'));
	//	$this->redirect(array('action' => 'index'));
	}

	private function __findPais($id = NULL)
	{
		$pais = $this->Paise->find('first', array('conditions'=>array('Paise.id =' => $id)));
		if (empty($pais)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $pais;
	}

}
