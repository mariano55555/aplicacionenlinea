<?php
App::uses('AppController', 'Controller');
/**
 * Departamentos Controller
 *
 * @property Departamento $Departamento
 */
class DepartamentosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$departamento = $this->Departamento->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $departamento;
	    }else{
	      	$this->set(compact('departamentos'));
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
		$this->Departamento->id = $id;
		$departamento = $this->__findDepartamento($this->Departamento->id);
		$this->set(compact('departamento'));
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
			$this->Departamento->create();
			if ($this->Departamento->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/departamentos', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The departamento has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The departamento could not be saved. Please, try again.'));
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
		$this->Departamento->id = $id;
		$departamento = $this->__findDepartamento($this->Departamento->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Departamento->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/departamentos', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The departamento has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The departamento could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $departamento;
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
		$this->Departamento->id = $id;
		$departamento = $this->__findDepartamento($this->Departamento->id);
		if ($this->Departamento->delete()) {
			$this->Session->setFlash(__('Departamento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Departamento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function admin_updatedelete($id = null) {		
		$this->Departamento->id = $id;
		$departamento = $this->__findDepartamento($this->Departamento->id);
		$data = array('activo' => 0);
		if ($this->Departamento->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/departamentos', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
			
		}
		
	}

	private function __lists()
	{
		$pais = $this->Departamento->Paise->find('list');
		$this->set(compact('pais'));
	}

	private function __findDepartamento($id = NULL)
	{
		$departamento = $this->Departamento->find('first', array('conditions'=>array('Departamento.id =' => $id)));
		if (empty($departamento)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $departamento;
	}



	// AJAX CALLS

	public function checkpais()
	{
		$this->autoRender = FALSE;
		$check = $this->Departamento->find('list', array('conditions' => array("Departamento.pais_id" => $this->request->data['id'])));
		if (isset($check) && count($check) > 0) {
			return 1;
		}else{
			return 0;
		}
	}

	public function departamentosajax($paisid = NULL)
	{
		$this->layout = "ajaxselect";
		$departamentos = $this->Departamento->find('list', array('conditions' => array('Departamento.pais_id' => $this->request->data['paisid'])));
		$this->set(compact('departamentos'));
	}

	public function departamentostextboxajax($paisid=NULL)
	{
		$this->layout = "ajaxselect";
	}

}
