<?php
App::uses('AppController', 'Controller');
/**
 * Temas Controller
 *
 * @property Tema $Tema
 */
class TemasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$temas = $this->Tema->find("all");
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $temas;
	    }else{
	      	$this->set(compact('temas'));
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
		$this->Tema->id = $id;
		$tema = $this->__findTema($this->Tema->id);
		$this->set(compact('tema'));
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
			$this->Tema->create();
			if ($this->Tema->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/temas', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The tema has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The tema could not be saved. Please, try again.'));
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
		$this->Tema->id = $id;
		$tema = $this->__findTema($this->Tema->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tema->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/temas', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The tema has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The tema could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $tema;
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
		$this->Tema->id = $id;
		$tema = $this->__findTema($this->Tema->id);
		if ($this->Tema->delete()) {
			$this->Session->setFlash(__('Tema deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tema was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Tema->id = $id;
		$this->__findTema($this->Tema->id);
		$data = array('activo' => 0);
		if ($this->Tema->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/temas', 'ajaxtable');
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
		$users = $this->Tema->User->find('list');
		$this->set(compact('users'));
	}

	private function __findTema($id = NULL)
	{
		$tema = $this->Tema->find('first', array('conditions'=>array('Tema.id =' => $id)));
		if (empty($tema)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $tema;
	}
}
