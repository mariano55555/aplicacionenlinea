<?php
App::uses('AppController', 'Controller');
/**
 * Instituciones Controller
 *
 * @property Institucione $Institucione
 */
class InstitucionesController extends AppController {





public function findbyPais($pais = NULL)
{
	$this->layout = "ajaxselect";
	$instituciones = $this->Institucione->find('list', array('conditions' => array('Institucione.pais_id' => $pais)));
	if (count($instituciones) > 0) 
	{
		$this->set(compact('instituciones'));
	}else{
		$this->autoRender = false;
		return 0;
	}
}




/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$instituciones = $this->Institucione->find('all');
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $instituciones;
	    }else{
	      	$this->set(compact('instituciones'));
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
		$this->Institucione->id = $id;
		$institucione = $this->__findInstitution($this->Institucione->id);
		$this->set(compact('institucione'));
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
			switch ($this->request->data['Institucione']['tipo']) {
				case 0:
					$this->request->data['Institucione']['tipo'] = 1;
					break;
				
				default:
					$this->request->data['Institucione']['tipo'] = 2;
					break;
			}
			$this->Institucione->create();
			if ($this->Institucione->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/instituciones', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The institucione has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The institucione could not be saved. Please, try again.'));
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
		$this->Institucione->id = $id;
		$institucione = $this->__findInstitution($this->Institucione->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			switch ($this->request->data['Institucione']['tipo']) {
				case 0:
					$this->request->data['Institucione']['tipo'] = 1;
					break;
				
				default:
					$this->request->data['Institucione']['tipo'] = 2;
					break;
			}
			if ($this->Institucione->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/instituciones', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The institucione has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The institucione could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $institucione;
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
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Institucione->id = $id;
		$institucione = $this->__findInstitution($this->Institucione->id);
		if ($this->Institucione->delete()) {
			$this->Session->setFlash(__('Institucione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Institucione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Institucione->id = $id;
		$institucione = $this->__findInstitution($this->Institucione->id);
		$data = array('activo' => 0);
		if ($this->Institucione->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/instituciones', 'ajaxtable');
			}else{
				#$this->Session->setFlash(__('The empleado has been saved'));
				#$this->redirect(array('action' => 'index'));
			}
		}
	}

	private function __findInstitution($id = NULL){
		$institucione = $this->Institucione->find('first', array('conditions'=>array('Institucione.id =' => $id)));
		if (empty($institucione)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $institucione;
	}

}
