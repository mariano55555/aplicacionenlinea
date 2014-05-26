<?php
App::uses('AppController', 'Controller');
/**
 * Procesos Controller
 *
 * @property Proceso $Proceso
 */
class ProcesosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$procesos = $this->Proceso->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $procesos;
	    }else{
	      	$this->set(compact('procesos'));
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
		$this->Proceso->id = $id;
		$proceso = $this->__findProceso($this->Proceso->id);
		$this->set(compact('proceso'));
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
			$this->Proceso->create();
			if ($this->Proceso->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/procesos', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The proceso has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The proceso could not be saved. Please, try again.'));
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
		if ($this->request->is('ajax')) {
			$this->layout ="ajax1";
		}
		$this->Proceso->id = $id;
		$proceso = $this->__findProceso($this->Proceso->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Proceso->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/procesos', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The proceso has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The proceso could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $proceso;
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
		$this->Proceso->id = $id;
		$proceso = $this->__findProceso($this->Proceso->id);
		if ($this->Proceso->delete()) {
			$this->Session->setFlash(__('Proceso deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Proceso was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Proceso->id = $id;
		$this->__findProceso($this->Proceso->id);
		$data = array('activo' => 0);
		if ($this->Proceso->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/procesos', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
	//	$this->Session->setFlash(__('Cargo was not deleted'));
	//	$this->redirect(array('action' => 'index'));
	}

	private function __lists()
	{
		$users = $this->Proceso->User->find('list');
		$this->set(compact('users'));
	}

	private function __findProceso($id)
	{
		$proceso = $this->Proceso->find('first', array('conditions'=>array('Proceso.id =' => $id)));
		if (empty($proceso)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $proceso;
	}
}
