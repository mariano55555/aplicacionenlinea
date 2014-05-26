<?php
App::uses('AppController', 'Controller');
/**
 * Accesos Controller
 *
 * @property Acceso $Acceso
 */
class AccesosController extends AppController {



/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$accesos = $this->Acceso->find('all');
		$this->set(compact('accesos'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$acceso = $this->__findAcceso($id);
		$this->set(compact('acceso'));
	}

    

    private function __findAcceso($id = NULL)
    {
		$options = array('conditions' => array('Acceso.' . $this->Acceso->primaryKey => $id));
		$acceso  = $this->Acceso->find('first', $options);
		if (empty($acceso)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $acceso;
    }

}
