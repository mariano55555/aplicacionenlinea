<?php
App::uses('AppController', 'Controller');
/**
 * Examenes Controller
 *
 * @property Examene $Examene
 */
class ExamenesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$examenes = $this->Examene->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $examenes;
	    }else{
	      	$this->set(compact('examenes'));
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
		$this->Examene->id = $id;
		$examene = $this->__findExamen($this->Examene->id);
		$this->set(compact('examene'));
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
			$this->Examene->create();
			if ($this->Examene->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/examenes', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The examene has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The examene could not be saved. Please, try again.'));
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
		$this->Examene->id = $id;
		$examene = $this->__findExamen($this->Examene->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Examene->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/examenes', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The examene has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The examene could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $examene;
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
		$this->Examene->id = $id;
		$examene = $this->__findExamen($this->Examene->id);
		if ($this->Examene->delete()) {
			$this->Session->setFlash(__('Examene deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Examene was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Examene->id = $id;
		$this->__findExamen($this->Examene->id);
		$data = array('activo' => 0);
		if ($this->Examene->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/examenes', 'ajaxtable');
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
		$users = $this->Examene->User->find('list');
		$this->set(compact('users'));
	}

	private function __findExamen($id = NULL)
	{
		$examen = $this->Examene->find('first', array('conditions'=>array('Examene.id =' => $id)));
		if (empty($examen)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $examen;
	}
}
