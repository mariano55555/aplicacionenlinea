<?php
App::uses('AppController', 'Controller');
/**
 * Superates Controller
 *
 * @property Superate $Superate
 */
class SuperatesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$superates = $this->Superate->find('all');
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $superates;
	    }else{
	      	$this->set(compact('superates'));
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
		$this->Superate->id = $id;
		$superate = $this->__findSuperate($this->Superate->id);
		$this->set(compact('superate'));
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
			$this->Superate->create();
			if ($this->Superate->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/superate', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The superate has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The superate could not be saved. Please, try again.'));
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
		$this->Superate->id = $id;
		$superate = $this->__findSuperate($this->Superate->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Superate->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/superate', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The superate has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The superate could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $superate;
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
		$this->Superate->id = $id;
		$superate = $this->__findSuperate($this->Superate->id);
		if ($this->Superate->delete()) {
			$this->Session->setFlash(__('Superate deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Superate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Superate->id = $id;
		$this->__findSuperate($this->Superate->id);
		$data = array('activo' => 0);
		if ($this->Superate->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/superate', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
	//	$this->Session->setFlash(__('Cargo was not deleted'));
	//	$this->redirect(array('action' => 'index'));
	}

	private function __findSuperate($id = NULL)
	{
		$superate = $this->Superate->find('first', array('conditions'=>array('Superate.id =' => $id)));
		if (empty($superate)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $superate;
	}
}
