<?php
App::uses('AppController', 'Controller');
/**
 * Tipofamiliares Controller
 *
 * @property Tipofamiliare $Tipofamiliare
 */
class TipofamiliaresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$tipofamiliares = $this->Tipofamiliare->find('all');
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $tipofamiliares;
	    }else{
	      	$this->set(compact('tipofamiliares'));
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
		$this->Tipofamiliare->id = $id;
		$familiares = $this->__findFamiliar($this->Tipofamiliare->id);
		$this->set(compact('tipofamiliare'));
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
			$this->Tipofamiliare->create();
			if ($this->Tipofamiliare->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/familiares', 'ajaxtable');
				}else{
					$this->Session->setFlash("La Información ha sido guardada", "flash_info");
					$this->redirect(array('action' => 'index'));
				}
				
			} else {
				$this->Session->setFlash(__('The tipofamiliare could not be saved. Please, try again.'));
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
		$this->Tipofamiliare->id = $id;
		$familiares = $this->__findFamiliar($this->Tipofamiliare->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tipofamiliare->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/familiares', 'ajaxtable');
				}else{
					$this->Session->setFlash("La Información ha sido guardada", "flash_info");
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The tipofamiliare could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $familiares;
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
		$this->Tipofamiliare->id = $id;
		$familiares = $this->__findFamiliar($this->Tipofamiliare->id);
		if ($this->Tipofamiliare->delete()) {
			$this->Session->setFlash(__('Tipofamiliare deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tipofamiliare was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function admin_updatedelete($id = null) {
		$this->Tipofamiliare->id = $id;
		$this->__findFamiliar($this->Tipofamiliare->id);
		$data = array('activo' => 0);
		if ($this->Tipofamiliare->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/familiares', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
	//	$this->Session->setFlash(__('Cargo was not deleted'));
	//	$this->redirect(array('action' => 'index'));
	}


	private function __findFamiliar($id = NULL)
	{
		$familiar = $this->Tipofamiliare->find('first', array('conditions'=>array('Tipofamiliare.id =' => $id)));
		if (empty($familiar)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $familiar;
	}

}
