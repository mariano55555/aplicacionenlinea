<?php
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Controller', 'Controller');


class AppController extends Controller {
	public $uses       = array('User', 'Access', 'Aplicacione');
	public $helpers    = array('Form', 'Html','Js', 'Time', 'Paginacion','Text', 'Header', 'HeaderDefault');
	public $components = array('Session',
							   'Cookie',
							   'RequestHandler',
							   'Redirect',
							   'Logs',
							   'Auth' => array(
									'loginRedirect'  => array('controller' => 'Users', 'action' => 'landing'),
									'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
									'authError'      => "No tienes privilegios para acceder a esta sección",
									'authorize'      => array('Controller')
									)
								);

		public function isAuthorized($user)
		{
				return true;
		}
		public function beforeFilter()
		{
			

			$this->layout = 'default';
			if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
		        $this->layout = 'admin';
		    } else {
		    	switch ($this->usuarioAutenticado('group_id')) 
		    	{
		    		case 2:
		    			$this->layout = 'admin';
		    			break;
		    		case 3:
		    			$this->layout = 'consulta';
		    			break;
		    		default:
		    			$this->layout = 'default';
		    			break;
		    	}
		    }

			$this->set('current_user', $this->Auth->user());

			// 
			if ($this->usuarioAutenticado('id')) {
				$finalizado = $this->Aplicacione->field("finalizado", array('Aplicacione.user_id' => $this->usuarioAutenticado('id')));
				switch ($finalizado) {
					case 1:
						$read = 'disabled';
						break;
					
					default:
						$read = '';
						break;
				}
				$this->set(compact('read'));
			}
				
		}

		public function usuarioAutenticado($field = null)
 		{
 			if ($this->Auth->user()) {
					$usuarios = $this->Auth->user();
					return $usuarios[$field];
 			}
 		}

 		public function redirect($url, $status = null, $exit = true) {
	        // this statement catches not authenticated or not authorized ajax requests
	        // AuthComponent will call Controller::redirect(null, 403) in those cases.
	        // with this we're making sure that we return valid JSON responses in all cases
	        if($this->request->is('ajax') && $url == null && $status == 403) {
	            $this->response = new CakeResponse(array('code' => 'code'));
	            $this->response->send();
	            return $this->_stop();
	        }
	        return parent::redirect($url, $status, $exit);
	    }

}
