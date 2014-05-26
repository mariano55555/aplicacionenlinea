<?php
App::uses('AppController', 'Controller');
/**
 * Carreras Controller
 *
 * @property Carrera $Carrera
 */
class CarrerasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$carreras = $this->Carrera->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $carreras;
	    }else{
	      	$this->set(compact('carreras'));
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
		$this->layout = "ajaxtable";
		$this->Carrera->id = $id;
		$carrera = $this->__findCarrera($this->Carrera->id);
		$this->set(compact('carrera'));
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
			$this->Carrera->create();
			if ($this->Carrera->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/carreras', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The carrera has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The carrera could not be saved. Please, try again.'));
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
		$this->Carrera->id = $id;
		$carrera = $this->__findCarrera($this->Carrera->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Carrera->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/carreras', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The carrera has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The carrera could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $carrera;
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
		$this->Carrera->id = $id;
		$carrera = $this->__findCarrera($this->Carrera->id);
		if ($this->Carrera->delete()) {
			$this->Session->setFlash(__('Carrera deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Carrera was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Carrera->id = $id;
		$carrera = $this->__findCarrera($this->Carrera->id);
		$data = array('activo' => 0);
		if ($this->Carrera->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/carreras', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
		//$this->Session->setFlash(__('Carrera was not deleted'));
		//$this->redirect(array('action' => 'index'));
	}


	private function __lists(){
		$users = $this->Carrera->User->find('list');
		$this->set(compact('users'));
	}

	private function __findCarrera($id = NULL)
	{
		$carrera = $this->Carrera->find('first', array('conditions'=>array('Carrera.id =' => $id)));
		if (empty($carrera)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $carrera;
	}
}
