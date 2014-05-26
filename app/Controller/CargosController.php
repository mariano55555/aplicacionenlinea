<?php
App::uses('AppController', 'Controller');
/**
 * Cargos Controller
 *
 * @property Cargo $Cargo
 */
class CargosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$cargos = $this->Cargo->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $cargos;
	    }else{
	      	$this->set(compact('cargos'));
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
		$this->Cargo->id = $id;
		$cargo = $this->__findCargo($this->Cargo->id);
		if (isset($cargo['Recomendadore'][0]['id']) && !empty($cargo['Recomendadore'][0]['id'])) {
			$user = $this->Cargo->query("SELECT users.name FROM aplicaciones
									LEFT JOIN users ON  aplicaciones.user_id = users.id
									LEFT JOIN recomendadores ON aplicaciones.recomendador_id = users.id
									WHERE aplicaciones.recomendador_id = ".$cargo['Recomendadore'][0]['id']);
			$cargo['Recomendadore'][0]['CreatedBy']['name'] = $user[0]['users']['name'];
		}
		
		$this->set(compact('cargo'));
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
			$this->Cargo->create();
			if ($this->Cargo->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/cargos', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The cargo has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The cargo could not be saved. Please, try again.'));
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
		$this->Cargo->id = $id;
		$cargo = $this->__findCargo($this->Cargo->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cargo->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/cargos', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The cargo has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The cargo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $cargo;
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
		$this->Cargo->id = $id;
		$this->__findCargo($this->Cargo->id);
		if ($this->Cargo->delete()) {
			$this->Session->setFlash(__('Cargo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cargo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Cargo->id = $id;
		$this->__findCargo($this->Cargo->id);
		$data = array('activo' => 0);
		if ($this->Cargo->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/cargos', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
	//	$this->Session->setFlash(__('Cargo was not deleted'));
	//	$this->redirect(array('action' => 'index'));
	}

	private function __findCargo($id = NULL)
	{
		$cargo = $this->Cargo->find('first', array('conditions'=>array('Cargo.id =' => $id)));
		if (empty($cargo)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $cargo;
	}
}
