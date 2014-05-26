<?php
App::uses('AppController', 'Controller');
/**
 * Municipios Controller
 *
 * @property Municipio $Municipio
 */
class MunicipiosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$municipios = $this->Municipio->find('all');
		if ($this->request->is('requested')) {
			$this->layout="ajax1";
	        return $municipios;
	    }else{
	      	$this->set(compact('municipios'));
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
		$this->Municipio->id = $id;
		$municipio = $this->__findMunicipio($this->Municipio->id);
		$this->set(compact('municipio'));
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
			$this->Municipio->create();
			if ($this->Municipio->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/municipios', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The municipio has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The municipio could not be saved. Please, try again.'));
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
		$this->Municipio->id = $id;
		$municipio = $this->__findMunicipio($this->Municipio->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Municipio->save($this->request->data)) {
				if($this->request->is('ajax')){
					$this->render('/Elements/requests/municipios', 'ajaxtable');
				}else{
					$this->Session->setFlash(__('The municipio has been saved'));
					$this->redirect(array('action' => 'index'));
				}
				
			} else {
				$this->Session->setFlash(__('The municipio could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $municipio;
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
		$this->Municipio->id = $id;
		$municipio = $this->__findMunicipio($this->Municipio->id);
		if ($this->Municipio->delete()) {
			$this->Session->setFlash(__('Municipio deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Municipio was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_updatedelete($id = null) {
		$this->Municipio->id = $id;
		$this->__findMunicipio($this->Municipio->id);
		$data = array('activo' => 0);
		if ($this->Municipio->save($data)) {
			if($this->request->is('ajax')){
				$this->render('/Elements/requests/municipios', 'ajaxtable');
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
		$departamentos = $this->Municipio->Departamento->find('list');
		$this->set(compact('departamentos'));
	}

	private function __findMunicipio($id = NULL)
	{
		$municipio = $this->Municipio->find('first', array('conditions'=>array('Municipio.id =' => $id)));
		if (empty($municipio)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $municipio;
	}



	//Ajax REQUEST
	public function getmunicipioajax()
	{	if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if ($this->request->is('ajax')) {
			$this->layout = "ajaxselect";
		}
		$valor     = $this->request->data['valor'];
		$municipio = $this->Municipio->find('list', array('conditions' => array('Municipio.departamento_id' => $valor, 'Municipio.activo' => 1)));
		if(!isset($municipio) || empty($municipio)){
			$municipio = $this->Municipio->find('list', array('conditions' => array('Municipio.id' => 271))); // SIN MUNICIPIO
		}

		$this->set(compact('municipio'));
	}
}
