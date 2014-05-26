<?php
App::uses('AppController', 'Controller');
/**
 * Evaluaciones Controller
 *
 * @property Evaluacione $Evaluacione
 */
class EvaluacionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$evaluaciones = $this->Evaluacione->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
            return $evaluaciones;
        }else{
        	$this->set(compact('evaluaciones'));
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
		$this->Evaluacione->id = $id;
		$evaluacione = $this->__findEvaluacion($this->Evaluacione->id);
		$this->set(compact('evaluacione'));
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
			$this->Evaluacione->create();
			if ($this->Evaluacione->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/evaluaciones', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The evaluacione has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The evaluacione could not be saved. Please, try again.'));
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
		$this->Evaluacione->id = $id;
		$evaluacion = $this->__findEvaluacion($this->Evaluacione->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evaluacione->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/evaluaciones', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The evaluacione has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The evaluacione could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $evaluacion;
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
		$this->Evaluacione->id = $id;
		$evaluacion = $this->__findEvaluacion($this->Evaluacione->id);
		if ($this->Evaluacione->delete()) {
			$this->Session->setFlash(__('Evaluacione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Evaluacione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function admin_updatedelete($id = null) {
		$this->Evaluacione->id = $id;
		$evaluacion = $this->__findEvaluacion($this->Evaluacione->id);
		$data = array('activo' => 0);
		if ($this->Evaluacione->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/evaluaciones', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
	}

	private function __lists()
	{
		$users = $this->Evaluacione->User->find('list');
		$this->set(compact('users'));
	}

	private function __findEvaluacion($id = NULL)
	{
		$evaluacion = $this->Evaluacione->find('first', array('conditions'=>array('Evaluacione.id =' => $id)));
		if (empty($evaluacion)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $evaluacion;
	}
}
