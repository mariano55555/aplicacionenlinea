<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

public $uses = array('Aplicacione', 
					 'User', 
					 'Hermano', 
					 'Familiare', 
					 'InstitucionesAdicionale', 
					 'Institucione', 
					 'Recomendadore', 
					 'Tema', 
					 'Estudio', 
					 'Actividade', 
					 'Evaluacione', 
					 'Telefono', 
					 'Otraubicacione', 
					 'Departamento', 
					 'Municipio', 
					 'Beca', 
					 'Aplicacione',
					 'Proceso',
					 'Noticia', 
					 'Acceso');


public function beforeFilter()
{
	parent::beforeFilter();
	$this->Auth->allow(array(
						'registro',
						'registro2', 
						'reset', 
						'validate_form', 
						'validate_pass', 
						'validateregister', 
						'registrar', 
						'confirmacion'));
}

public function registro2()
{
	$this->layout ="registro";
	if ($this->request->is('post')) 
	{
		$this->request->data['User']['genero']                = $this->request->data['genero'];
		$this->request->data['User']['name']                  = $this->request->data['name'];
		$this->request->data['User']['email']                 = $this->request->data['email'];
		$this->request->data['User']['password']              = $this->request->data['password'];
		$this->request->data['User']['username']              = $this->request->data['username'];
		$this->request->data['User']['password_confirmation'] = $this->request->data['password_confirmation'];
		if ($this->User->save($this->request->data)) {
			if ($this->request->data['User']['genero'] == 0) {
				$this->Session->setFlash("Bienvenida ". $this->request->data['name'].', hemos enviado instrucciones al correo '.$this->request->data['email'] .' para activar su cuenta.', "loginsuccess");			
			}else{
				$this->Session->setFlash("Bienvenido ". $this->request->data['name'].', hemos enviado instrucciones al correo '.$this->request->data['email'] .' para activar su cuenta.', "loginsuccess");			
			}
			
			$this->redirect(array('action' => 'login'));
		} else {
			$this->Session->setFlash("No se ha podido crear la cuenta. Contactanos al correo admision@esen.edu.sv");
		}
	}
}
public function confirmacion($codigo = NULL)
{

	$this->autoRender = FALSE;

	$userid = $this->User->field("User.id", array('codverificacion' => $codigo));
	if (!isset($userid) || empty($userid)) {
		$this->Session->setFlash("El código de verificación no concuerda con los datos de tu cuenta", "flash_error");
		$this->redirect(array('action' => 'login'));
	}else{
		$this->User->id = $userid;
		$data = array('codactivado' => 1);
		$this->User->save($data);	
		$this->Session->setFlash("Tu cuenta ha sido activda", "flash_info");
		$this->redirect(array('action' => 'login'));
	}
}


public function login($mensaje = NULL)
{
		$this->layout ="login";
		if ($this->request->is('post')) {
			if($this->Auth->login()){
				//$this->Logs->access($this->usuarioAutenticado('id'), 'begin');
				if ($this->usuarioAutenticado('activo') == 1) {
					//$this->Logs->action($this->usuarioAutenticado('id'), 6, 1);
					if ($this->usuarioAutenticado('codactivado') == 1) {
						$this->Logs->access($this->usuarioAutenticado('id'), date("Y-m-d H:i:s"),$this->RequestHandler->isMobile(), $this->request->data['latitud'], $this->request->data['longitud'],$this->request->clientIp());
							if ($this->Auth->user('group_id') == 2) {
								$this->redirect(array('action' => 'dashboard', 'admin'=>true));
							}else{
								$this->redirect('/punto_de_partida');	
							}
					}else{
						$this->Session->destroy();
						$this->Session->setFlash("Tu cuenta se encuentra inactiva. Activala por medio de las instrucciones enviadas a tu cuenta de correo.");			
					}
				}else{
					$this->Session->destroy();
					$this->Session->setFlash("Tu cuenta se encuentra inactiva. Contacta al administrador");		
				}
			}else{
				$this->Session->setFlash("Credenciales incorrectas");
			}
		}
		$this->set(compact('mensaje'));
//		debug($this->RequestHandler->isMobile());
}


	//debug($this->request->clientIp());
	/*debug($this->RequestHandler->isMobile());
	debug($this->request->clientIp());
	debug($this->request->domain());
	debug($this->request->subdomains());*/


public function logout()
{
    $this->redirect($this->Auth->logout());
}




public function landing()
{
	$this->layout = "landing";
	// porcentaje primera pagina
	$datos       = $this->__dataprimera($this->usuarioAutenticado('id'));
	$porcentaje1 = $this->__primera($datos);

	// segunda parte
	$datos2      = $this->__datasegunda($this->usuarioAutenticado('id'));
	$porcentaje2 = $this->__segunda($datos2);

	// tercera parte
	$datos3      = $this->__datatercera($this->usuarioAutenticado('id'));
	$porcentaje3 = $this->__tercera($datos3);

	// cuarta parte
	$datos4      = $this->__datacuarta($this->usuarioAutenticado('id'));
	$porcentaje4 = $this->__cuarta($datos4);

	// porcentaje quinta pagina
	$datos5      = $this->__dataquinta($this->usuarioAutenticado('id'));
	$porcentaje5 = $this->__quinta($datos5);

	$this->set(compact('porcentaje1', 'porcentaje2', 'porcentaje3','porcentaje4', 'porcentaje5'));
}


private function __totalporcentaje()
{
	$datos       = $this->__dataprimera($this->usuarioAutenticado('id'));
	$porcentaje1 = $this->__primera($datos);
	$porcentaje1 = ($porcentaje1 == 0.1)? 0 : $porcentaje1;

	// segunda parte
	$datos2      = $this->__datasegunda($this->usuarioAutenticado('id'));
	$porcentaje2 = $this->__segunda($datos2);
	$porcentaje2 = ($porcentaje2 == 0.1)? 0 : $porcentaje2;

	// tercera parte
	$datos3      = $this->__datatercera($this->usuarioAutenticado('id'));
	$porcentaje3 = $this->__tercera($datos3);
	$porcentaje3 = ($porcentaje3 == 0.1)? 0 : $porcentaje3;

	// cuarta parte
	$datos4      = $this->__datacuarta($this->usuarioAutenticado('id'));
	$porcentaje4 = $this->__cuarta($datos4);
	$porcentaje4 = ($porcentaje4 == 0.1)? 0 : $porcentaje4;

	// porcentaje quinta pagina
	$datos5      = $this->__dataquinta($this->usuarioAutenticado('id'));
	$porcentaje5 = $this->__quinta($datos5);
	$porcentaje5 = ($porcentaje5 == 0.1)? 0 : $porcentaje5;

	$total = ($porcentaje1 + $porcentaje2 + $porcentaje3 + $porcentaje4 + $porcentaje5) / 5;
	return $total;
}





public function first()
{

	if ($this->request->is('post') || $this->request->is('put')) {
		//debug($this->request->data);
					$post = 1;
					foreach ($this->request->data as $key => $value) {
						if (strlen(trim($value)) == 0) 
						{
							$this->request->data[$key] = NULL;
						}
					}

					$select2                      = isset($this->request->data['select2']) ? $this->request->data['select2'] : NULL;
					$this->request->data['same6'] = isset($this->request->data['same6']) ? $this->request->data['same6'] : NULL;


					//GUARDAR DATA EN TABLA USERS
					$this->User->id = $this->usuarioAutenticado('id');
							$this->request->data['User']['name']        = isset($this->request->data['nombrecompleto']) ? $this->request->data['nombrecompleto']: NULL;
							$this->request->data['User']['genero']      = isset($this->request->data['same5']) ? $this->request->data['same5']: NULL;

							if (isset($this->request->data['nacimiento']) && !empty($this->request->data['nacimiento'])) {
								//12/20/1981
								/*$custom_date                               = str_replace("/", "-", trim($this->request->data['nacimiento']));*/
								$this->request->data['User']['nacimiento'] = DateTime::createFromFormat("m/d/Y", $this->request->data['nacimiento'])->format("Y-m-d");
							}else{
								$this->request->data['User']['nacimiento']  = NULL;
							}
							$this->request->data['User']['pais_id']     = isset($this->request->data['selectnacionalidad']) ? $this->request->data['selectnacionalidad']: NULL;		
							$this->request->data['User']['superate_id'] = isset($this->request->data['select4']) ? $this->request->data['select4'] : NULL;


							$verificarinstitucion                       = $this->Institucione->field('Institucione.codsql', array('Institucione.pais_id' =>$select2));



					$this->User->save($this->request->data);

					if (isset($verificarinstitucion) && !empty($verificarinstitucion)) 
					{
						//guardar como combo de institucion en tabla users
						$this->User->id = $this->usuarioAutenticado('id');
							$dato = isset($this->request->data['select3']) ? $this->request->data['select3'] : NULL;
							$data = array('institucion_id' => $dato);
						$this->User->save($data);
						
					}else{
//						debug('aca');
						// PONER A NULL EL CAMPO INSTITUCION_ID DE LA TABLA USER
						$this->User->id = $this->usuarioAutenticado('id');
						$data = array('institucion_id' => NULL);
						$this->User->save($data);
						//preparar datos para guardar en tabla instituciones adicionales
						$institucionadicionalid = $this->User->field("User.instituciones_adicionale_id", array("User.id" => $this->usuarioAutenticado("id")));
						if (isset($institucionadicionalid)) {
							//actualizar datos de la institucion en tablas  instituciones adicionales
							$this->InstitucionesAdicionale->id = $institucionadicionalid;
							$this->request->data['InstitucionesAdicionale']['pais_id'] = isset($this->request->data['select2'])? $this->request->data['select2']: NULL;
							$this->request->data['InstitucionesAdicionale']['name']    = isset($this->request->data['nombreinstitucion']) ? $this->request->data['nombreinstitucion'] : NULL;
							$this->InstitucionesAdicionale->save($this->request->data);

						}else{
							//crear registro en tabla instituciones adicionales
							$this->InstitucionesAdicionale->create();
							$this->request->data['InstitucionesAdicionale']['pais_id'] = isset($this->request->data['select2'])? $this->request->data['select2']: NULL;
							$this->request->data['InstitucionesAdicionale']['name']    = isset($this->request->data['nombreinstitucion']) ? $this->request->data['nombreinstitucion'] : NULL;
							$this->InstitucionesAdicionale->save($this->request->data);
							$lastinsitucionid = $this->InstitucionesAdicionale->getLastInsertID();
							//actualizar tabla users
							$this->User->id = $this->usuarioAutenticado('id');
							$data = array('instituciones_adicionale_id' => $lastinsitucionid);
							$this->User->save($data);
						}
					}

					//GUARDAR DATA EN TABLA APLICACIONES
					$this->Aplicacione->id                            = $this->Aplicacione->field("Aplicacione.id", array("Aplicacione.user_id" => $this->usuarioAutenticado('id')));
					$this->request->data['Aplicacione']['carrera_id'] = isset($this->request->data['same2']) ? $this->request->data['same2']: NULL;
					$this->request->data['Aplicacione']['proceso_id'] = isset($this->request->data['same3']) ? $this->request->data['same3']: NULL;
					$this->request->data['Aplicacione']['examen_id']  = isset($this->request->data['same6']) ? $this->request->data['same6']: NULL;
					if ($this->request->data['same6'] != '1') { // en caso que escogiera diferente de PAA
						$this->request->data['Aplicacione']['calificacion']    = (isset($this->request->data['calificacion']) && strlen(trim($this->request->data['calificacion']))>0) ? trim($this->request->data['calificacion']) : NULL;
					}
					$this->Aplicacione->save($this->request->data);
					
//						debug($this->request->data['same7']);

					if (isset($this->request->data['same7']) && $this->request->data['same7'] == '1') {// si tiene hermanos
						// verificar si ya existe algun registro para el hermano ---- ACTUALIZAR
						$hermanouserid = $this->Hermano->field("Hermano.id", array("Hermano.user_id" => $this->usuarioAutenticado('id')));

						if (isset($hermanouserid) && !empty($hermanouserid)) {
							# code...
							$this->Hermano->id = $hermanouserid;
								$this->request->data['Hermano']['name']    = isset($this->request->data['hermanonombre']) ? $this->request->data['hermanonombre'] : NULL;			
								$this->request->data['Hermano']['year']    = isset($this->request->data['select5']) ? $this->request->data['select5'] : NULL;			
							$this->Hermano->save($this->request->data);
						}else{
							// si no existe se crea el nuevo registro
							if (isset($this->request->data['hermanonombre']) && isset($this->request->data['select5']) && strlen(trim($this->request->data['hermanonombre'])) > 0 && strlen(trim($this->request->data['select5'])) > 0) {
								$this->Hermano->create();
									$this->request->data['Hermano']['name']    =  $this->request->data['hermanonombre'];			
									$this->request->data['Hermano']['year']    =  $this->request->data['select5'];			
									$this->request->data['Hermano']['user_id'] = $this->usuarioAutenticado('id');
								$this->Hermano->save($this->request->data);				
							}
						}
					}else{//si no tiene hermanos, borremos lo que ya habia en caso que existiera
						$hermanouserid = $this->Hermano->field("Hermano.id", array("Hermano.user_id" => $this->usuarioAutenticado('id')));
						if (isset($hermanouserid)) {
							$this->Hermano->id = $hermanouserid;
							$this->Hermano->delete();
						}
					}
					
						//debug($this->request->data);	
						/*if ($this->User->save($this->request->data)) {
						//	$this->Session->setFlash("La Información ha sido guardada", "flash_info");
						//	$this->redirect(array('action' => 'index'));
							
						}else{
							$this->Session->setFlash("La Información no ha sido guardada. Favor intente nuevamente", "flash_error");
						}*/
							$datos      = $this->__dataprimera($this->usuarioAutenticado('id'));
							$porcentaje = $this->__primera($datos);
							$total      = $this->__totalporcentaje();
							$this->set(compact('datos', 'porcentaje', 'post', 'total'));
							if ($porcentaje == 0.1) {
								$this->Session->setFlash("Debes de completar el formulario. Favor completa la información solicitada", "flash_error");
							}elseif ($porcentaje == 100) {
								$this->Session->setFlash("La Información ha sido guardada. Has finalizado la primera parte", "flash_info");
							}else{
								$this->Session->setFlash("La Información ha sido guardada, sin embargo debes de completar los campos requeridos", "flash_info");
							}
	} else {
		$datos      = $this->__dataprimera($this->usuarioAutenticado('id'));
		$porcentaje = $this->__primera($datos);
		$total      = $this->__totalporcentaje();
		$this->set(compact('datos', 'porcentaje', 'total'));
	}
	$this->__lists();
}


public function second()
{
	if ($this->request->is('post') || $this->request->is('put')) {
		$post = 1;
		


		//debug($this->request->data);
		if(isset($this->request->data['telefono']) && strlen(trim($this->request->data['telefono'])) > 0)
		{
			$telfijo = $this->request->data['telefono'];
		}else{
			$telfijo = 	NULL;
		}
		if(isset($this->request->data['celular']) && strlen(trim($this->request->data['celular'])) > 0)
		{
			$telcel = $this->request->data['celular'];
		}else{
			$telcel = 	NULL;
		}		
		
		
		//guardar telefono
		$fijo = $this->Telefono->field('Telefono.id', array('Telefono.id', array('Telefono.user_id' => $this->usuarioAutenticado('id'), 'Telefono.tipo' => 1)));
		if (isset($fijo) && $fijo >= 1) {
			$this->Telefono->id = $fijo;
				$data = array('name' => $telfijo);
			$this->Telefono->save($data);
		}else{
			$this->Telefono->create();
				$data = array('name' => $telfijo, 'user_id' => $this->usuarioAutenticado('id'), 'tipo' => 1);
			$this->Telefono->save($data);
		}
		//guardar cel
		$cel  = $this->Telefono->field('Telefono.id', array('Telefono.id', array('Telefono.user_id' => $this->usuarioAutenticado('id'), 'Telefono.tipo' => 2)));
		if (isset($cel) && $cel >= 1) {
//			debug("aca2");
			$this->Telefono->id = $cel;
				$data = array('name' => $telcel);
			$this->Telefono->save($data);
		}else{
//			debug("aca1");
//			debug($telcel);
			$this->Telefono->create();
				$data = array('name' => $telcel, 'user_id' => $this->usuarioAutenticado('id'), 'tipo' => 2);
			$this->Telefono->save($data);
		}

		// GUARDAR DIRECCION
		$this->request->data['User']['direccion'] = isset($this->request->data['User']['direccion']) ? $this->request->data['User']['direccion'] : '';

		if(isset($this->request->data['User']['direccion']) && strlen(trim($this->request->data['User']['direccion']))>0)
		{
				$error1 = 0;
				//CREAR VARIABLE POST PARA VALIDAR LA DIRECCION CON SUS TRES PALABRAS
				$str    = strtolower(trim($this->request->data['User']['direccion']));
				
				$findme = 'calle';
				$pos    = strpos($str, $findme);
				if ($pos === false) {
					$error1++; 
				}

				$findme1 = 'colonia';
				$pos1    = strpos($str, $findme1);
				if ($pos1 === false) {
					$error1++; 
				}

				$findme2 = '#';
				$pos2    = strpos($str, $findme2);
				if ($pos2 === false) {
					$error1++; 
				}

				if ($error1 > 0) {
					$validardireccion = 1;
					$this->set(compact('validardireccion'));
				}

		}

		
		$this->User->id = $this->usuarioAutenticado('id');
			$data = array('direccion' => $this->request->data['User']['direccion']);
		$this->User->save($data);

		// guardar datos de usuario en caso que sea con municipio_id y departamento_id

		if (isset($this->request->data['departamento']) && $this->request->data['departamento'] >= 1) 
		{
			if (isset($this->request->data['municipio']) && $this->request->data['municipio'] >= 1) {
				$this->User->id = $this->usuarioAutenticado('id');
					$data = array('departamento_id' => $this->request->data['departamento'], 'municipio_id' => $this->request->data['municipio'], 'otraubicacion_id' => NULL);
				$this->User->save($data);			
			}else{
				$this->User->id = $this->usuarioAutenticado('id');
					$data = array('departamento_id' => $this->request->data['departamento'], 'otraubicacion_id' => NULL, 'municipio_id' => NULL);
				$this->User->save($data);
			}
		}elseif(isset($this->request->data['Otraubicacione']['name'])){
			$ciudad = (strlen(trim($this->request->data['Otraubicacione']['name'])) == 0) ? NULL : $this->request->data['Otraubicacione']['name'];
			$pais   =  isset($this->request->data['pais']) ? $this->request->data['pais'] : NULL;

			$otraid = $this->User->field("User.otraubicacion_id", array('User.id' => $this->usuarioAutenticado('id')));

			if (isset($ciudad)) 
			{
				if (isset($otraid) && $otraid >=1) 
				{
					$this->Otraubicacione->id = $otraid;
						$data = array('name' => $ciudad, 'pais_id' => $pais);
					$this->Otraubicacione->save($data);
					//actualizo la tabla de usuario
					$this->User->id = $this->usuarioAutenticado('id');
						$data = array('municipio_id' => NULL, 'departamento_id' => NULL);
					$this->User->save($data);

				}else{
					$this->Otraubicacione->create();
						$data = array('name' => $ciudad, 'pais_id' => $pais);
					$this->Otraubicacione->save($data);
					//actualizo la tabla de usuario
					$this->User->id = $this->usuarioAutenticado('id');
						$data = array('otraubicacion_id' => $this->Otraubicacione->getLastInsertID(), 'municipio_id' => NULL, 'departamento_id' => NULL);
					$this->User->save($data);
				}
			}
		}else{
			// no mando nada actualizo todo x si habia residuo
			$this->User->id = $this->usuarioAutenticado('id');
				$data = array('otraubicacion_id' => NULL, 'municipio_id' => NULL, 'departamento_id' => NULL);
			$this->User->save($data);
		}


		$radioboton = (isset($this->request->data['same10']) && $this->request->data['same10'] > 0) ? $this->request->data['same10'] : 10000000000000;
		
		// ACTUALIZAR TODOS LOS REGISTROS EN EL CAMPO RESPONSABLE
		switch ($radioboton) {
			case 1:
				# RESPONSABLE ES PAPA ASI QUE ACTUALIZO A 0 EL CAMPO RESPONSABLE DE CAULQUIER OTRO FAMILIAR 
			$this->Familiare->updateAll(array('Familiare.responsable' => 0),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id !=' => 1)
										);
				break;
			case 2:
				# RESPONSABLE ES MAMA ASI QUE ACTUALIZO A 0 EL CAMPO RESPONSABLE DE CAULQUIER OTRO FAMILIAR 
			$this->Familiare->updateAll(array('Familiare.responsable' => 0),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id !=' => 2)
										);
				break;
			case 3:
				# RESPONSABLE ES OTRO ASI QUE ACTUALIZO A 0 EL CAMPO RESPONSABLE DE CAULQUIER OTRO FAMILIAR 
			$this->Familiare->updateAll(array('Familiare.responsable' => 0),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id !=' => 3)
										);
				break;
			case 4:
			debug("mariano paz");
				# REDIO = 4 RESPONSABLE ES PAPA Y MAMA ASI QUE ACTUALIZO A 0 EL CAMPO RESPONSABLE DE CAULQUIER OTRO FAMILIAR QUE NO SEA PAPA NI MAMA
			$this->Familiare->updateAll(array('Familiare.responsable' => 0),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id ' => 3)
										);
				$this->Familiare->updateAll(array('Familiare.responsable' => 1),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id ' => 1)
										);
				$this->Familiare->updateAll(array('Familiare.responsable' => 1),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id ' => 2)
										);
				break;
			default:
				
				break;
		}

		// REVISAR SI HAY ALGUNA INFORMACION DE PAPA
		$nombrepapa    = (isset($this->request->data['nombrepapa']) && strlen(trim($this->request->data['nombrepapa']))>0) ? $this->request->data['nombrepapa'] : NULL;
		$trabajopapa   = (isset($this->request->data['trabajopapa']) && strlen(trim($this->request->data['trabajopapa']))>0) ? $this->request->data['trabajopapa'] : NULL;
		$celularpapa   = (isset($this->request->data['celularpapa']) && strlen(trim($this->request->data['celularpapa']))>0) ? $this->request->data['celularpapa'] : NULL;
		$ocupacionpapa = (isset($this->request->data['ocupacionpapa']) && strlen(trim($this->request->data['ocupacionpapa']))>0) ? $this->request->data['ocupacionpapa'] : NULL;
		$telefonopapa  = (isset($this->request->data['telefonopapa']) && strlen(trim($this->request->data['telefonopapa']))>0) ? $this->request->data['telefonopapa'] : NULL;
		$emailpapa     = (isset($this->request->data['emailpapa']) && strlen(trim($this->request->data['emailpapa']))>0) ? $this->request->data['emailpapa'] : NULL;

		if (isset($nombrepapa) || isset($trabajopapa) || isset($celularpapa) || isset($ocupacionpapa) || isset($telefonopapa) || isset($emailpapa)) 
		{

			if ($radioboton == 1 || $radioboton == 4) {
				$responsable = 1;
			}else{
				$responsable = 0;
			}

			/*$this->Familiare->updateAll(array('Familiare.responsable' => 0),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id ' => 1)
										);*/

			# verificar si ya hay un registro de familiar tipo papa
			$checkpapa = $this->Familiare->field('id', array('Familiare.user_id' => $this->usuarioAutenticado('id'), 'tipofamiliar_id'=>1));
			if (isset($checkpapa) && count($checkpapa) > 0 && $checkpapa != false) 
			{

				// actualizo registro
				$this->Familiare->id = $checkpapa;
				$data = array('name' => $nombrepapa, 
						      'tipofamiliar_id' => 1, 
						      'ocupacion' => $ocupacionpapa, 
						      'trabajo' => $trabajopapa, 
						      'celular' => $celularpapa,
						      'telefono' => $telefonopapa, 
						      'email' => $emailpapa, 
						      'responsable' => $responsable
						      );
				$this->Familiare->save($data);
			}else{
				// creo registro
				$this->Familiare->create();
					$data = array(	'name'            => $nombrepapa, 
									'tipofamiliar_id' => 1, 
									'ocupacion'       => $ocupacionpapa, 
									'trabajo'         => $trabajopapa, 
									'celular'         => $celularpapa,
									'telefono'        => $telefonopapa, 
									'user_id'         => $this->usuarioAutenticado('id'),
									'email'           => $emailpapa,
									'responsable'     => $responsable
						         );
				$this->Familiare->save($data);
			}
		}else{

			
		}


		// REVISAR SI HAY ALGUNA INFORMACION DE PAPA
		$nombremama    = (isset($this->request->data['mamanombre']) && strlen(trim($this->request->data['mamanombre']))>0) ? $this->request->data['mamanombre'] : NULL;
		$trabajomama   = (isset($this->request->data['trabajomama']) && strlen(trim($this->request->data['trabajomama']))>0) ? $this->request->data['trabajomama'] : NULL;
		$celularmama   = (isset($this->request->data['celularmama']) && strlen(trim($this->request->data['celularmama']))>0) ? $this->request->data['celularmama'] : NULL;
		$ocupacionmama = (isset($this->request->data['ocupacionmama']) && strlen(trim($this->request->data['ocupacionmama']))>0) ? $this->request->data['ocupacionmama'] : NULL;
		$telefonomama  = (isset($this->request->data['telefonomama']) && strlen(trim($this->request->data['telefonomama']))>0) ? $this->request->data['telefonomama'] : NULL;
		$emailmama     = (isset($this->request->data['emailmama']) && strlen(trim($this->request->data['emailmama']))>0) ? $this->request->data['emailmama'] : NULL;

		if (isset($nombremama) || isset($trabajomama) || isset($celularmama) || isset($ocupacionmama) || isset($telefonomama) || isset($emailmama)) 
		{

			if ($radioboton == 2 || $radioboton == 4) {
				$responsable = 1;
			}else{
				$responsable = 0;
			}
			# verificar si ya hay un registro de familiar tipo mama
			/*$this->Familiare->updateAll(array('Familiare.responsable' => 0),
										array('Familiare.user_id ' => $this->usuarioAutenticado('id'), 'Familiare.tipofamiliar_id !=' => 2)
										);*/
			$checkmama = $this->Familiare->field('id', array('Familiare.user_id' => $this->usuarioAutenticado('id'), 'tipofamiliar_id'=> 2));
			if (isset($checkmama) && count($checkmama) > 0 && $checkmama != false) 
			{

				$this->Familiare->id = $checkmama;
					$data = array('name' => $nombremama, 
								  'tipofamiliar_id' => 2, 
					              'ocupacion' => $ocupacionmama, 
					              'trabajo' => $trabajomama, 
					              'celular' => $celularmama,
					              'telefono' => $telefonomama,
					              'email' => $emailmama,
					              'responsable' => $responsable
						         );
				$this->Familiare->save($data);
			}else{
				// creo registro
				$this->Familiare->create();
					$data = array('name' => $nombremama, 
								  'tipofamiliar_id' => 2, 
					              'ocupacion' => $ocupacionmama, 
					              'trabajo' => $trabajomama, 
					              'celular' => $celularmama,
					              'telefono' => $telefonomama,
					              'user_id' => $this->usuarioAutenticado('id'),
					              'email' => $emailmama,
					              'responsable' => $responsable
						         );
				$this->Familiare->save($data);
			}
		}else{
			/*$this->Familiare->updateAll(array('Familiare.responsable' => 0),
									    array('Familiare.user_id' => $this->usuarioAutenticado('id'), 'tipofamiliar_id'=> 2
									    	)
									    );*/
		}


		// REVISAR SI HAY ALGUNA INFORMACION DE RESPONSABLE
		$nombreresponsable     = (isset($this->request->data['responsablenombre']) && strlen(trim($this->request->data['responsablenombre']))>0) ? $this->request->data['responsablenombre'] : NULL;
		$trabajoresponsable    = (isset($this->request->data['responsabletrabajo']) && strlen(trim($this->request->data['responsabletrabajo']))>0) ? $this->request->data['responsabletrabajo'] : NULL;
		$celularresponsable    = (isset($this->request->data['celularresponsable']) && strlen(trim($this->request->data['celularresponsable']))>0) ? $this->request->data['celularresponsable'] : NULL;
		$ocupacionresponsable  = (isset($this->request->data['responsableocupacion']) && strlen(trim($this->request->data['responsableocupacion']))>0) ? $this->request->data['responsableocupacion'] : NULL;
		$telefonoresponsable   = (isset($this->request->data['telefonoresponsable']) && strlen(trim($this->request->data['telefonoresponsable']))>0) ? $this->request->data['telefonoresponsable'] : NULL;
		$emailresponsable      = (isset($this->request->data['correoresponsable']) && strlen(trim($this->request->data['correoresponsable']))>0) ? $this->request->data['correoresponsable'] : NULL;
		$parentescoresponsable = (isset($this->request->data['responsableparentesco']) && strlen(trim($this->request->data['responsableparentesco']))>0) ? $this->request->data['responsableparentesco'] : NULL;

		if (isset($nombreresponsable) || isset($trabajoresponsable) || isset($celularresponsable) || isset($ocupacionresponsable) || isset($telefonoresponsable) || isset($emailresponsable) || isset($parentescoresponsable)) 
		{
			if ($radioboton == 3) {
				$responsable = 1;
			}else{
				$responsable = 0;
			}

			# verificar si ya hay un registro de familiar tipo papa
			$checkresponsable123 = $this->Familiare->field('id', array('Familiare.user_id' => $this->usuarioAutenticado('id'), 'tipofamiliar_id'=>3));
			if (isset($checkresponsable123) && count($checkresponsable123) > 0 && $checkresponsable123 != false) 
			{
//				debug("aca1");
				// actualizo registro
				$this->Familiare->id = $checkresponsable123;
					$data = array('name' => $nombreresponsable, 
								  'tipofamiliar_id' => 3, 
					              'ocupacion' => $ocupacionresponsable, 
					              'trabajo' => $trabajoresponsable, 
					              'celular' => $celularresponsable,
					              'telefono' => $telefonoresponsable,
					              'email' => $emailresponsable,
					              'parentesco' => $parentescoresponsable,
					              'responsable' => $responsable
						         );
				$this->Familiare->save($data);
			}else{
				// creo registro
				$this->Familiare->create();
					$data = array('name' => $nombreresponsable, 
								  'tipofamiliar_id' => 3, 
					              'ocupacion' => $ocupacionresponsable, 
					              'trabajo' => $trabajoresponsable, 
					              'celular' => $celularresponsable,
					              'telefono' => $telefonoresponsable,
					              'user_id' => $this->usuarioAutenticado('id'),
					              'email' => $emailresponsable,
					              'parentesco' => $parentescoresponsable,
					              'responsable' => $responsable
						         );
				$this->Familiare->save($data);
			}
		}


		/*$this->request->data['municipio'];
		$this->request->data['departamento'];
		$this->request->data['Otraubicacione']['name'];
		$this->request->data['pais'];*/


		// guardar datos de usuario en caso que sea otraubicacion








		$datosfn    = $this->__raw2data($this->__datasegunda($this->usuarioAutenticado('id')));
		$datos      = $this->__datasegunda($this->usuarioAutenticado('id'));
		$porcentaje = $this->__segunda($datos);
		$responsable = $this->Familiare->field("Familiare.id", array('Familiare.user_id' =>$this->usuarioAutenticado('id'), 'Familiare.responsable' => 1));
		$total      = $this->__totalporcentaje();
		if (isset($responsable) && $responsable > 0) {
			$responsable = 1;
		}else{
			$responsable = 0;
		}
		if (isset($datos[0]['users']['departamento_id'])) {
			$paiseid = $this->Departamento->field("Departamento.pais_id", array('Departamento.id' => $datos[0]['users']['departamento_id']));
			$deptos  = $this->Departamento->find('list', array('conditions' => array('Departamento.pais_id' => $paiseid, 'Departamento.id !=' => 9999, 'Departamento.activo' => 1)));
			$muni    = $this->Municipio->find('list', array('conditions' => array('Municipio.departamento_id' => $datos[0]['users']['departamento_id'], 'Municipio.activo' => 1)));
		}else{
			$deptos = array();
			$muni   = array();
		}
		$this->set(compact('datos', 'porcentaje', 'datosfn', 'post', 'responsable', 'deptos', 'muni', 'total'));
		//mensajes
		if ($porcentaje == 0.1) {
			$this->Session->setFlash("Debes de completar el formulario. Favor completa la información solicitada", "flash_error");
		}elseif ($porcentaje == 100) {
			$this->Session->setFlash("La Información ha sido guardada. Has finalizado la segunda parte", "flash_info");
		}else{
			$this->Session->setFlash("La Información ha sido guardada, sin embargo debes de completar los campos requeridos", "flash_info");
		}
	}else{
		$datosfn    = $this->__raw2data($this->__datasegunda($this->usuarioAutenticado('id')));
		$datos      = $this->__datasegunda($this->usuarioAutenticado('id'));
		$porcentaje = $this->__segunda($datos);
		$total      = $this->__totalporcentaje();
		if (isset($datos[0]['users']['departamento_id'])) {
			$paiseid = $this->Departamento->field("Departamento.pais_id", array('Departamento.id' => $datos[0]['users']['departamento_id']));
			$deptos  = $this->Departamento->find('list', array('conditions' => array('Departamento.pais_id' => $paiseid, 'Departamento.id !=' => 9999, 'Departamento.activo' => 1)));
			$muni    = $this->Municipio->find('list', array('conditions' => array('Municipio.departamento_id' => $datos[0]['users']['departamento_id'], 'Municipio.activo' => 1)));
		}else{
			$deptos = array();
			$muni   = array();
		}
		$this->set(compact('datos', 'porcentaje', 'datosfn', 'deptos', 'muni', 'total'));
	}
	$this->__lists();	
}

public function third()
{
	if ($this->request->is('post') || $this->request->is('put')) {
		//debug($this->request->data);
		$post  = 1;
		$rbeca = isset($this->request->data['same55']) ? 1 : 0;

			$this->Aplicacione->id = $this->Aplicacione->field("id", array("Aplicacione.id", array("Aplicacione.user_id" => $this->usuarioAutenticado("id"))));
				$this->request->data['Aplicacione']['evaluacion_id'] = isset($this->request->data['same16']) ? $this->request->data['same16'] : NULL;
				$this->request->data['Aplicacione']['actividad']     = (isset($this->request->data['ck']) && strlen(trim($this->request->data['ck'])) > 0) ? trim($this->request->data['ck']) : '';
			$this->Aplicacione->save($this->request->data);

			
			
			$this->User->id = $this->usuarioAutenticado("id");
				$this->request->data['User']['bachillerato'] = isset($this->request->data['same25']) ? $this->request->data['same25'] : NULL;
				$this->request->data['User']['ingles']       = isset($this->request->data['same35']) ? $this->request->data['same35'] : NULL;
				$this->request->data['User']['idiomas']      = (isset($this->request->data['idiomas']) && strlen(trim($this->request->data['idiomas']))>0) ? $this->request->data['idiomas'] : NULL;
			$this->User->save($this->request->data);

			//guardar becas
			if (isset($this->request->data['same55']) && $this->request->data['same55'] == 1) 
			{
					// busco si ya hay algo, caso contrario guardo
					$becaid = $this->Beca->field("Beca.id", array('Beca.user_id' => $this->usuarioAutenticado("id")));

					$this->request->data['Beca']['name']     = (isset($this->request->data['Beca']['name']) && strlen(trim($this->request->data['Beca']['name'])) > 0) ? $this->request->data['Beca']['name'] : NULL;	
					$this->request->data['Beca']['duracion'] = (isset($this->request->data['Beca']['duracion']) && strlen(trim($this->request->data['Beca']['duracion'])) > 0) ? $this->request->data['Beca']['duracion'] : NULL;	
					$this->request->data['Beca']['user_id']  = $this->usuarioAutenticado("id");	
					if (isset($becaid)) {
						$this->Beca->id = $becaid;
						$this->Beca->save($this->request->data);
					}else{
						$this->Beca->create();
						$this->Beca->save($this->request->data);
					}
			
			}

			// guardar estudios
			if (isset($this->request->data['Estudio'])) 
			{
				for ($i=0; $i < 4 ; $i++) { 
					//DEBUG($this->request->data['Actividade']['name'][$i]);
					$this->request->data['Estudio']['name'][$i]        = (isset($this->request->data['Estudio']['name'][$i]) && strlen(trim($this->request->data['Estudio']['name'][$i])) > 0) ? $this->request->data['Estudio']['name'][$i] : NULL;
					$this->request->data['Estudio']['institucion'][$i] = (isset($this->request->data['Estudio']['institucion'][$i]) && strlen(trim($this->request->data['Estudio']['institucion'][$i])) > 0) ? $this->request->data['Estudio']['institucion'][$i] : NULL;
					$this->request->data['Estudio']['periodo'][$i]     = (isset($this->request->data['Estudio']['periodo'][$i]) && strlen(trim($this->request->data['Estudio']['periodo'][$i])) > 0) ? $this->request->data['Estudio']['periodo'][$i] : NULL ;
					$this->request->data['Estudio']['numero'][$i]      = $i + 1;
					if (isset($this->request->data['Estudio']['name'][$i]) || isset($this->request->data['Estudio']['institucion'][$i]) || isset($this->request->data['Estudio']['periodo'][$i]))
					{
						$check = $this->Estudio->field('Estudio.id', array('Estudio.user_id' => $this->usuarioAutenticado("id"), 'Estudio.numero' => $this->request->data['Estudio']['numero'][$i]));
						if (isset($check)  && !empty($check))
						{
							$this->Estudio->id = $check;
								$data = array('institucion' => $this->request->data['Estudio']['institucion'][$i],
											  'name'        => $this->request->data['Estudio']['name'][$i],
											  'periodo'     => $this->request->data['Estudio']['periodo'][$i]
											);
							$this->Estudio->save($data);
						}else{
							$this->Estudio->create();
								$data = array('numero'      => $this->request->data['Estudio']['numero'][$i],
											  'institucion' => $this->request->data['Estudio']['institucion'][$i],
											  'periodo'     => $this->request->data['Estudio']['periodo'][$i],
											  'numero'      => $this->request->data['Estudio']['numero'][$i],
											  'user_id'     => $this->usuarioAutenticado("id")
											);
							$this->Estudio->save($data);
						}
					}else{
						// LOS REGISTROS SON VACIOS
						$check = $this->Estudio->field('Estudio.id', array('Estudio.user_id' => $this->usuarioAutenticado("id"), 'Estudio.numero' => $this->request->data['Estudio']['numero'][$i]));
						if (isset($check) && !empty($check)) 
						{
							$this->Estudio->id = $check;
								  $data = array('institucion' => $this->request->data['Estudio']['institucion'][$i],
												'name'        => $this->request->data['Estudio']['name'][$i],
												'fecha'       => $this->request->data['Estudio']['fecha'][$i]
											  );
							$this->Estudio->save($data);
						}
					}
				}
			}


			// guardar actividades
			if (isset($this->request->data['Actividade'])) 
			{
				for ($i=0; $i < 4 ; $i++) { 
					//DEBUG($this->request->data['Actividade']['name'][$i]);
					$this->request->data['Actividade']['name'][$i]        = (isset($this->request->data['Actividade']['name'][$i]) && strlen(trim($this->request->data['Actividade']['name'][$i])) > 0) ? $this->request->data['Actividade']['name'][$i] : NULL;
					$this->request->data['Actividade']['institucion'][$i] = (isset($this->request->data['Actividade']['institucion'][$i]) && strlen(trim($this->request->data['Actividade']['institucion'][$i])) > 0) ? $this->request->data['Actividade']['institucion'][$i] : NULL;
					$this->request->data['Actividade']['fecha'][$i]       = (isset($this->request->data['Actividade']['fecha'][$i]) && strlen(trim($this->request->data['Actividade']['fecha'][$i])) > 0) ? $this->request->data['Actividade']['fecha'][$i] : NULL ;
					$this->request->data['Actividade']['puesto'][$i]      = (isset($this->request->data['Actividade']['puesto'][$i]) && strlen(trim($this->request->data['Actividade']['puesto'][$i])) > 0) ? $this->request->data['Actividade']['puesto'][$i] : NULL;
					$this->request->data['Actividade']['numero'][$i]      = $i + 1;
					if (isset($this->request->data['Actividade']['name'][$i]) || isset($this->request->data['Actividade']['institucion'][$i]) || isset($this->request->data['Actividade']['puesto'][$i]) || isset($this->request->data['Actividade']['fecha'][$i])) 
					{
						$check = $this->Actividade->field('Actividade.id', array('Actividade.user_id' => $this->usuarioAutenticado("id"), 'Actividade.numero' => $this->request->data['Actividade']['numero'][$i]));
						if (isset($check)  && !empty($check))
						{
							$this->Actividade->id = $check;
								$data = array('institucion' => $this->request->data['Actividade']['institucion'][$i],
											  'name'        => $this->request->data['Actividade']['name'][$i],
											  'fecha'       => $this->request->data['Actividade']['fecha'][$i],
											  'puesto'      => $this->request->data['Actividade']['puesto'][$i]
											);
							$this->Actividade->save($data);
						}else{
							$this->Actividade->create();
								$data = array('numero'      => $this->request->data['Actividade']['numero'][$i],
											  'institucion' => $this->request->data['Actividade']['institucion'][$i],
											  'name'        => $this->request->data['Actividade']['name'][$i],
											  'fecha'       => $this->request->data['Actividade']['fecha'][$i],
											  'puesto'      => $this->request->data['Actividade']['puesto'][$i],
											  'user_id'     => $this->usuarioAutenticado("id")
											);
							$this->Actividade->save($data);
						}
					}else{
						// LOS REGISTROS SON VACIOS
						$check = $this->Estudio->field('Estudio.id', array('Estudio.user_id' => $this->usuarioAutenticado("id"), 'Estudio.numero' => $this->request->data['Actividade']['numero'][$i]));
						if (isset($check) && !empty($check)) 
						{
							$this->Estudio->id = $check;
								  $data = array('institucion' => $this->request->data['Actividade']['institucion'][$i],
												'name'        => $this->request->data['Actividade']['name'][$i],
												'fecha'       => $this->request->data['Actividade']['fecha'][$i],
												'puesto'      => $this->request->data['Actividade']['puesto'][$i]
											  );
							$this->Estudio->save($data);
						}
					}
				}
			}





			$datos      = $this->__datatercera($this->usuarioAutenticado('id'));
			$porcentaje = $this->__tercera($datos);
			$total      = $this->__totalporcentaje();
			$this->set(compact('datos', 'porcentaje', 'post', 'rbeca', 'total'));
			//mensajes
			if ($porcentaje == 0.1) {
				$this->Session->setFlash("Debes de completar el formulario. Favor completa la información solicitada", "flash_error");
			}elseif ($porcentaje == 100) {
				$this->Session->setFlash("La Información ha sido guardada. Has finalizado la tercera parte", "flash_info");
			}else{
				$this->Session->setFlash("La Información ha sido guardada, sin embargo debes de completar los campos requeridos", "flash_info");
			}
	} else {
		$datos      = $this->__datatercera($this->usuarioAutenticado('id'));
		$porcentaje = $this->__tercera($datos);
		$total      = $this->__totalporcentaje();
		$this->set(compact('datos', 'porcentaje', 'total'));
	}
	$this->__lists();
}

public function fourth()
{

	if ($this->request->is('post') || $this->request->is('put')) {
		$post = 1;
		if (isset($this->request->data['ck1']) && strlen(trim($this->request->data['ck1'])) > 0) 
		{
			$this->request->data['Aplicacione']['ensayo'] = trim($this->request->data['ck1']);
			$cuenta = count(explode(" ", strip_tags($this->request->data['Aplicacione']['ensayo'])));
		}else{
			$this->request->data['Aplicacione']['ensayo'] = NULL;
			$cuenta = 0;
		}

		if (isset($this->request->data['same23'])) 
		{
			$this->request->data['Aplicacione']['tema_id'] = $this->request->data['same23'];
		}else{
			$this->request->data['Aplicacione']['tema_id'] = NULL;
		}
		
		
		$this->Aplicacione->id = $this->Aplicacione->field("Aplicacione.id", array("Aplicacione.user_id" => $this->usuarioAutenticado('id')));
		$this->Aplicacione->save($this->request->data);

		$datos      = $this->__datacuarta($this->usuarioAutenticado('id'));
		$porcentaje = $this->__cuarta($datos);
		$total      = $this->__totalporcentaje();
		
		$this->set(compact('datos', 'porcentaje', 'post', 'cuenta', 'total'));		
		//mensajes
		if ($porcentaje == 0.1) {
			$this->Session->setFlash("Debes de completar el formulario. Favor completa la información solicitada", "flash_error");
		}elseif ($porcentaje == 100) {
			$this->Session->setFlash("La Información ha sido guardada. Has finalizado la cuarta parte", "flash_info");
		}else{
			$this->Session->setFlash("La Información ha sido guardada, sin embargo debes de completar los campos requeridos", "flash_info");
		}
	} else {
		$datos      = $this->__datacuarta($this->usuarioAutenticado('id'));
		$porcentaje = $this->__cuarta($datos);
		$total      = $this->__totalporcentaje();
		$this->set(compact('datos', 'porcentaje', 'total'));			
	}
	$this->__lists();
}

public function fifth()
{
	if ($this->request->is('post') || $this->request->is('put')) {
		foreach ($this->request->data['Recomendadore'] as $key => $value) {
			if (strlen(trim($value)) == 0) {
				$this->request->data['Recomendadore'][$key] = NULL;
			}
		}
		$post         = 1;
		$aplicacionid = $this->Aplicacione->field("Aplicacione.id", array('Aplicacione.user_id' => $this->usuarioAutenticado('id'), 'Aplicacione.recomendador_id >=' => 1));
		if (isset($aplicacionid) && $aplicacionid > 0) 
		{
			$recomendadoreid = $this->Aplicacione->field('Aplicacione.recomendador_id', array('Aplicacione.user_id' => $this->usuarioAutenticado('id')));
			// ya existe un recomendador por lo que actualizamos la data
			$this->Recomendadore->id = $recomendadoreid;
			$this->Recomendadore->save($this->request->data);
		}else{
			// No existe, se crea y se actualiza la aplicacion
			$this->Recomendadore->create();
			$this->Recomendadore->save($this->request->data);

			$this->Aplicacione->id = $this->Aplicacione->field("Aplicacione.id", array('Aplicacione.user_id' => $this->usuarioAutenticado('id')));
			$data = array('recomendador_id' => $this->Recomendadore->getLastInsertID());
			$this->Aplicacione->save($data);
		}

		$datos      = $this->__dataquinta($this->usuarioAutenticado('id'));
		$porcentaje = $this->__quinta($datos);
		$total      = $this->__totalporcentaje();
		$this->set(compact('datos', 'porcentaje', 'post', 'total'));
		//mensajes
		if ($porcentaje == 0.1) {
			$this->Session->setFlash("Debes de completar el formulario. Favor completa la información solicitada", "flash_error");
		}elseif ($porcentaje == 100) {
			$this->Session->setFlash("La Información ha sido guardada. Has finalizado la quinta parte", "flash_info");
		}else{
			$this->Session->setFlash("La Información ha sido guardada, sin embargo debes de completar los campos requeridos", "flash_info");
		}
	}else{
		$datos      = $this->__dataquinta($this->usuarioAutenticado('id'));
		$porcentaje = $this->__quinta($datos);
		$total      = $this->__totalporcentaje();
		$this->set(compact('datos', 'porcentaje', 'total'));
	}
	$this->__lists();
}


public function reset($email = null)
{
	if ($this->request->is('post') || $this->request->is('ajax')) 
	{
		$usuarioid = $this->User->field("User.id", array('User.email' => $email));
	}
}

public function registro()
{
	$this->layout ="ajaxtable";
}


public function checkmail($email = null)
{
	$this->autoRender = false;
	$usuarioid = $this->User->field("User.id", array('User.email' => $email));
	if($usuarioid){ // si existe la cuenta de usuario, asi que enviar el correo y resetear la cuenta
		
		return 1;
	}else{
		return 0;
	}

}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		if ($this->request->is('ajax')) {
			$this->layout = 'ajaxtable';
		}
		$users = $this->User->find("all");
		$this->set(compact('users'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		$user = $this->__findUser($this->User->id);
		$this->set(compact('user'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("La Información ha sido guardada", "flash_info");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("La Información no ha sido guardada. Favor intente nuevamente", "flash_error");
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
		$this->User->id = $id;
		$user = $this->__findUser($this->User->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("La Información ha sido guardada", "flash_info");
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("La Información no ha sido guardada. Favor intente nuevamente", "flash_error");
			}
		} else {
			$this->request->data = $user;
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
		$this->User->id = $id;
		$user = $this->__findUser($this->User->id);
		if ($this->User->delete()) {
			$this->Session->setFlash("El usuario ha sido eliminado", "flash_info");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("El usuario no ha sido eliminado. Favor intente nuevamente", "flash_error");
		$this->redirect(array('action' => 'index'));
	}


	private function __lists()
	{
		$instituciones        = $this->User->Institucione->find('list', array('conditions' => array('Institucione.activo' => 1)));
		$superates            = $this->User->Superate->find('list', array('conditions'=>array('Superate.activo' => 1)));
		$pais                 = $this->User->Paise->find('list', array('conditions' => array('Paise.activo' => 1)));
		$groups               = $this->User->Group->find('list', array('conditions' => array('Group.activo' => 1)));
		$carreras             = $this->User->Carrera->find('list', array('conditions' => array('Carrera.activo' => 1)));
		$procesos             = $this->User->Proceso->find('list', array('conditions' => array('Proceso.activo' => 1)));
		$temas                = $this->User->Tema->find('list', array('conditions' => array('Tema.activo' => 1)));
		$recomendadores       = $this->User->Recomendadore->find('list', array('conditions' => array('Recomendadore.activo' => 1)));
		$cargos               = $this->User->Recomendadore->Cargo->find('list', array('conditions' => array('Cargo.activo' => 1)));
		$evaluaciones         = $this->User->Evaluacione->find('list', array('conditions' => array('Evaluacione.activo' => 1)));
		$examenes             = $this->User->Examene->find('list', array('conditions' => array('Examene.activo' => 1)));
		$institucionadicional = $this->User->InstitucionesAdicionale->find('list', array('conditions' => array('InstitucionesAdicionale.activo' => 1)));
		$temas                = $this->User->query("SELECT temas.id, temas.name, temas.contenido FROM temas WHERE temas.activo = 1");
		$departamentoss       = $this->User->Municipio->Departamento->find("list", array('conditions' => array('Departamento.activo' => 1)));
		$municipioss       = $this->User->Paise->Departamento->Municipio->find("list", array('conditions' => array('Municipio.activo' => 1)));
		$this->set(compact('instituciones', 'superates', 'pais', 'groups', 'carreras', 'procesos', 'temas', 'recomendadores', 'evaluaciones', 'examenes', 'cargos', 'temas', 'departamentoss', 'municipioss'));
	}

	private function __findUser($id = NULL)
	{
		$user = $this->User->find('first', array('conditions'=>array('User.id =' => $id)));
		if (empty($user)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $user;
	}

	// Recuento de porcentajes

	private function __primera($datos = array())
	{
		$entre      = 9;
		$acumulador = 0;

		if (isset($datos) && count($datos) > 0) 
		{
					if (isset($datos[0]['aplicaciones']['carrera_id'])) { //carrera
							$acumulador++;
					}if (isset($datos[0]['aplicaciones']['proceso_id'])) { //proceso
						    $acumulador++;
					}if (isset($datos[0]['users']['name'])) { //proceso
						    $acumulador++;
					}if (isset($datos[0]['users']['genero'])) { //proceso
						    $acumulador++;
					}if (isset($datos[0]['users']['nacimiento'])) { //proceso
						    $acumulador++;
					}if (isset($datos[0]['users']['pais_id'])) { //proceso
						    $acumulador++;
					}

					//$insitucionid = $this->User->field('User.institucion_id', array('User.id' => $this->usuarioAutenticado('id')));
					if (isset($datos[0]['users']['institucion_id'])) 
					{
						$acumulador++;
					}elseif (isset($datos[0]['users']['instituciones_adicionale_id'])) {
						$entre++;//11
						if (isset($datos[0]['instituciones_adicionales']['pais_id'])) {
							$acumulador++;
//							debug("12");
						}
						if (isset($datos[0]['instituciones_adicionales']['name'])) {
							$acumulador++;
//							debug("123");
						}
					}


					if (isset($datos[0]['aplicaciones']['examen_id'])) { //examen
						$acumulador++;
						if ($datos[0]['aplicaciones']['examen_id'] != 1) {
							$entre++;      //10
							if (isset($datos[0]['aplicaciones']['calificacion']) && !empty($datos[0]['aplicaciones']['calificacion'])) 
							{
								$acumulador++;
							}
						}
					}

					
					if (isset($datos[0]['users']['superate_id'])) { //proceso
						    $acumulador++;
					}
					if (isset($datos[0]['hermanos'])) {
						$entre++;//12
						$entre++;//12
					}
					if (isset($datos[0]['hermanos']['name'])) { //proceso
							
						    $acumulador++;
					}if (isset($datos[0]['hermanos']['year'])) { //proceso
							
						    $acumulador++;
					}

					$porcentaje =(100*$acumulador)/$entre;
					if ($porcentaje > 1) {
						$porcentaje = $porcentaje;
					}else{
						$porcentaje = 0.1;
					}
		}else{
			$porcentaje = 0.1;
		}
		return $porcentaje;
	}

	private function __segunda($datos = array())
	{
		$porcentaje = 0;
		if (count($datos) > 0 && isset($datos)) {
			$telefonos  = array();
			$tel        = array();
			$familiares = array();
			$fam        = array();
			for ($i=0; $i < count($datos) ; $i++) { 
				// ordenar telefonos
				if (isset($datos[$i]['telefonos']['id']) && strlen(trim($datos[$i]['telefonos']['id'])) > 0) 
				{
					if (in_array($datos[$i]['telefonos']['id'], $telefonos)){
					}else{
						$telefonos[]                                  = $datos[$i]['telefonos']['id'];
						$tel[$datos[$i]['telefonos']['id']]['numero'] = $datos[$i]['telefonos']['name'];
						$tel[$datos[$i]['telefonos']['id']]['tipo']   = $datos[$i]['telefonos']['tipo'];
					}
				}
				
				//ordenar familiares
				if (isset($datos[$i]['familiares']['id']) && strlen(trim($datos[$i]['familiares']['id'])) > 0) 
				{
					if (in_array($datos[$i]['familiares']['id'], $familiares)){
					}else{
						$familiares[]                                           = $datos[$i]['familiares']['id'];
						$fam[$datos[$i]['familiares']['id']]['name']            = $datos[$i]['familiares']['name'];
						$fam[$datos[$i]['familiares']['id']]['ocupacion']       = $datos[$i]['familiares']['ocupacion'];
						$fam[$datos[$i]['familiares']['id']]['telefono']        = $datos[$i]['familiares']['telefono'];
						$fam[$datos[$i]['familiares']['id']]['celular']         = $datos[$i]['familiares']['celular'];
						$fam[$datos[$i]['familiares']['id']]['tipofamiliar_id'] = $datos[$i]['familiares']['tipofamiliar_id'];
						$fam[$datos[$i]['familiares']['id']]['trabajo']         = $datos[$i]['familiares']['trabajo'];
						$fam[$datos[$i]['familiares']['id']]['email']           = $datos[$i]['familiares']['email'];
						$fam[$datos[$i]['familiares']['id']]['parentesco']      = $datos[$i]['familiares']['parentesco'];
						$fam[$datos[$i]['familiares']['id']]['responsable']     = $datos[$i]['familiares']['responsable'];
					}
				}
			}

			foreach ($tel as $key => $v) {
			    if ($v['tipo'] == 1) 
			    {
			         $telfijo = $v['numero'];
			    }elseif ($v['tipo'] == 2) {
			         $telcel = $v['numero'];
			    }
			  }

			  	$papa = array();
				$mama = array();
				$otro = array();
				foreach ($fam as $key => $value) {
				      if ($value['tipofamiliar_id'] == 1) { // es papa
				        $papa['name']        = $value['name'];
				        $papa['ocupacion']   = $value['ocupacion'];
				        $papa['telefono']    = $value['telefono'];
				        $papa['celular']     = $value['celular'];
				        $papa['trabajo']     = $value['trabajo'];
				        $papa['email']       = $value['email'];
				        $papa['responsable'] = $value['responsable'];
				      }elseif ($value['tipofamiliar_id'] == 2) { // es mama
				        $mama['name']        = $value['name'];
				        $mama['ocupacion']   = $value['ocupacion'];
				        $mama['telefono']    = $value['telefono'];
				        $mama['celular']     = $value['celular'];
				        $mama['trabajo']     = $value['trabajo'];
				        $mama['email']       = $value['email'];
				        $mama['responsable'] = $value['responsable'];
				      }elseif ($value['tipofamiliar_id'] == 3) { // es diferente de mama o papa
				        $otro['name']        = $value['name'];
				        $otro['ocupacion']   = $value['ocupacion'];
				        $otro['telefono']    = $value['telefono'];
				        $otro['celular']     = $value['celular'];
				        $otro['trabajo']     = $value['trabajo'];
				        $otro['email']       = $value['email'];
				        $otro['responsable'] = $value['responsable'];
				        $otro['parentesco']  = $value['parentesco'];
				      }
				}
			#aca comienza
			$entre      = 11;
			$acumulador = 0;
			$error      = 0;
			if (isset($datos[0]['users']['direccion']) && strlen(trim($datos[0]['users']['direccion'])) > 0) 
			{
				//VERIFICAR SI CONTIENE LAS PALABRAS: CALLE, COLONIA Y #
				$str    = strtolower(trim($datos[0]['users']['direccion']));
				$findme = 'calle';
				$pos    = strpos($str, $findme);
				if ($pos === false) {
					$error++; 
				}
				$findme = 'colonia';
				$pos    = strpos($str, $findme);
				if ($pos === false) {
					$error++; 
				}
				$findme = '#';
				$pos    = strpos($str, $findme);
				if ($pos === false) {
					$error++; 
				}

				// Si si fueron encontradas todas las palabras
				if ($error == 0) {
					$acumulador++; //1
				}
				
			}
			if (isset($datos[0]['users']['departamento'])) 
			{
				$entre++;
				$acumulador++; //1
			}
			if (isset($telcel) && strlen(trim($telcel)) > 0) 
			{
				$acumulador++; //2
			}
			if (isset($telfijo) && strlen(trim($telfijo)) > 0) 
			{
				$acumulador++;//3
			}
			if (isset($datos[0]['users']['municipio_id']) && $datos[0]['users']['municipio_id'] > 0)
			{
				$acumulador++;//4
			}
			if (isset($datos[0]['users']['departamento_id']) && $datos[0]['users']['departamento_id'] > 0)
			{
				$acumulador++;//4
			}
			if (isset($datos[0]['users']['otraubicacion_id']))
			{
				//$entre++;
				if ($datos[0]['otraubicaciones']['pais_id']) {
					$acumulador++;//4
				}if ($datos[0]['otraubicaciones']['name']) {
					$acumulador++;//5
				}
			}
			if (isset($papa['responsable']) && $papa['responsable'] == 1) { // El papa es responsable asi que son validos 6 campos
	
						if(isset($papa['name']) && strlen(trim($papa['name'])) > 0)
						{
							$acumulador++;
						}       
				        if(isset($papa['ocupacion']) && strlen(trim($papa['ocupacion'])) > 0)
				        {
							$acumulador++;
				        }   
				        if(isset($papa['telefono']) && strlen(trim($papa['telefono'])) > 0)
				        {
				        	$acumulador++;
				        }  
				        if(isset($papa['celular']) && strlen(trim($papa['celular'])) > 0) 
				        {
				        	$acumulador++;
				        }   
				        if(isset($papa['trabajo']) && strlen(trim($papa['trabajo'])) > 0) 
				        {
				        	$acumulador++;
				        }   
				        if(isset($papa['email']) && strlen(trim($papa['email'])) > 0) 
				        {
				        	$acumulador++;
				        }     
				        
			}if (isset($mama['responsable']) && $mama['responsable'] == 1) { // El papa es responsable asi que son validos 6 campos
		
						if(isset($mama['name']) && strlen(trim($mama['name'])) > 0)
						{
							$acumulador++;
						}       
				        if(isset($mama['ocupacion']) && strlen(trim($mama['ocupacion'])) > 0)
				        {
							$acumulador++;
				        }   
				        if(isset($mama['telefono']) && strlen(trim($mama['telefono'])) > 0)
				        {
				        	$acumulador++;
				        }  
				        if(isset($mama['celular']) && strlen(trim($mama['celular'])) > 0) 
				        {
				        	$acumulador++;
				        }   
				        if(isset($mama['trabajo']) && strlen(trim($mama['trabajo'])) > 0) 
				        {
				        	$acumulador++;
				        }   
				        if(isset($mama['email']) && strlen(trim($mama['email'])) > 0) 
				        {
				        	$acumulador++;
				        }     
			}if (isset($otro['responsable']) && $otro['responsable'] == 1) { //Otro es responsable asi que son validos 7 campos
						$entre+=1;
						if(isset($otro['name']) && strlen(trim($otro['name'])) > 0)
						{
							$acumulador++;
						}       
				        if(isset($otro['ocupacion']) && strlen(trim($otro['ocupacion'])) > 0)
				        {
							$acumulador++;
				        }   
				        if(isset($otro['telefono']) && strlen(trim($otro['telefono'])) > 0)
				        {
				        	$acumulador++;
				        }  
				        if(isset($otro['celular']) && strlen(trim($otro['celular'])) > 0) 
				        {
				        	$acumulador++;
				        }   
				        if(isset($otro['trabajo']) && strlen(trim($otro['trabajo'])) > 0) 
				        {
				        	$acumulador++;
				        }   
				        if(isset($otro['email']) && strlen(trim($otro['email'])) > 0) 
				        {
				        	$acumulador++;
				        }
				        if(isset($otro['parentesco']) && strlen(trim($otro['parentesco'])) > 0) 
				        {
				        	$acumulador++;
				        }
			}
					$porcentaje =(100*$acumulador)/$entre;
					if ($porcentaje > 1) {
						$porcentaje = $porcentaje;
					}else{
						$porcentaje = 0.1;
					}
		}else{
			$porcentaje = 0.1;
		}
//		debug($acumulador);
		//debug($entre);
//		debug($porcentaje);
		return $porcentaje;
	}

	private function __tercera($datos = array())
	{
		$porcentaje = 0;
		if (count($datos) > 0 && isset($datos)) {
			$estudios1 = array();
			$per1      = array();
			$int1      = array();
			$es1       = array();
			for ($i=0; $i < count($datos) ; $i++) 
			{ 
			  if (isset($datos[$i]['estudios']) && isset($datos[$i]['estudios']['name'])) 
			  {

			    if (in_array($datos[$i]['estudios']['name'] ,$estudios1)) {
			       # code...
			     }else{
			       $estudios1[] = $datos[$i]['estudios']['name'];
			       $es[]        = $datos[$i]['estudios']['name'];
			     }
			  }
			  if (isset($datos[$i]['estudios']) && isset($datos[$i]['estudios']['institucion'])) 
			  {

			    if (in_array($datos[$i]['estudios']['institucion'] ,$int1)) {
			       # code...
			     }else{
			       $int1[] = $datos[$i]['estudios']['institucion'];
			       $int[]  = $datos[$i]['estudios']['institucion'];
			     }
			  }
			  if (isset($datos[$i]['estudios']) && isset($datos[$i]['estudios']['periodo'])) 
			  {

			    if (in_array($datos[$i]['estudios']['periodo'] ,$per1)) {
			       # code...
			     }else{
			       $per1[] = $datos[$i]['estudios']['periodo'];
			       $per[]  = $datos[$i]['estudios']['periodo'];
			     }
			  }
			}
			$actividades1 = array();
			$aint1        = array();
			$afecha1      = array();
			$apuesto1     = array();
			for ($i=0; $i < count($datos) ; $i++) 
			{ 
			  if (isset($datos[$i]['actividades']) && isset($datos[$i]['actividades']['name'])) 
			  {

			    if (in_array($datos[$i]['actividades']['name'] ,$actividades1)) {
			       # code...
			     }else{
			       $actividades1[] = $datos[$i]['actividades']['name'];
			       $aname[]        = $datos[$i]['actividades']['name'];
			     }
			  }
			  if (isset($datos[$i]['actividades']) && isset($datos[$i]['actividades']['institucion'])) 
			  {

			    if (in_array($datos[$i]['actividades']['institucion'] ,$aint1)) {
			       # code...
			     }else{
			       $aint1[] = $datos[$i]['actividades']['institucion'];
			       $aint[]         = $datos[$i]['actividades']['institucion'];
			     }
			  }
			  if (isset($datos[$i]['actividades']) && isset($datos[$i]['actividades']['fecha'])) 
			  {

			    if (in_array($datos[$i]['actividades']['fecha'] ,$afecha1)) {
			       # code...
			     }else{
			       $afecha1[] = $datos[$i]['actividades']['fecha'];
			       $afecha[]  = $datos[$i]['actividades']['fecha'];
			     }
			  }
			  if (isset($datos[$i]['actividades']) && isset($datos[$i]['actividades']['puesto'])) 
			  {

			    if (in_array($datos[$i]['actividades']['puesto'] ,$apuesto1)) {
			       # code...
			     }else{
			       $apuesto1[] = $datos[$i]['actividades']['puesto'];
			       $apuesto[]  = $datos[$i]['actividades']['puesto'];
			     }
			  }
			   
			}
			#aca comienza
			$entre         = 11;
			$acumulador    = 0;
			$testestudio   = 0;
			$testactividad = 0;
			if (isset($datos[0]['users']['bachillerato'])) 
			{
				$acumulador++; //1
			}
			if (isset($datos[0]['users']['ingles'])) 
			{
				$acumulador++; //2
			}
			if (isset($datos[0]['aplicaciones']['actividad']) && strlen(trim($datos[0]['aplicaciones']['actividad'])) > 0) 
			{
				$acumulador++; //3
			}
			if (isset($datos[0]['aplicaciones']['evaluacion_id'] )) 
			{
				$acumulador++;//4
			}
			for ($i=0; $i < 6 ; $i++) 
			{ 
			    if (isset($per[$i]) && isset($int[$i]) && isset($es[$i])) 
			    {
			      $testestudio++;
			    }			    
			}
			for ($i=0; $i < 4 ; $i++) 
			{ 
			    if (isset($apuesto[$i]) && isset($aint[$i]) && isset($aname[$i]) && isset($afecha[$i])) 
			    {
			      $testactividad++;
			    }			    
			}
			if ($testestudio > 0) 
			{
				$acumulador+=3;//5
			}
			if ($testactividad > 0) {
				$acumulador+=4;//6
			}

			if (isset($datos[0]['becas'])) 
			{
				$entre+=2;
				if (isset($datos[0]['becas']['name'])) {
					$acumulador++;
				}
				if (isset($datos[0]['becas']['duracion'])) {
					$acumulador++;
				}

			}

					$porcentaje =(100*$acumulador)/$entre;
					if ($porcentaje > 1) {
						$porcentaje = $porcentaje;
					}else{
						$porcentaje = 0.1;
					}
		}else{
			$porcentaje = 0.1;
		}
//		debug($acumulador);
		//debug($entre);
//		debug($porcentaje);
		return $porcentaje;
	}

	private function __cuarta($datos = array())
	{
		$entre      = 2;
		$acumulador = 0;
		if (isset($datos) && count($datos) > 0) 
		{
			if (isset($datos[0]['aplicaciones']['tema_id'] )) {
				$acumulador++;
			}if (isset($datos[0]['aplicaciones']['ensayo'] )) {
				$cuenta = count(explode(" ", strip_tags($datos[0]['aplicaciones']['ensayo'])));
				if ($cuenta >= 200 && $cuenta <= 250) {
					$acumulador++;
				}
				
			}
			$porcentaje =(100*$acumulador)/$entre;
			if ($porcentaje > 1) {
				$porcentaje = $porcentaje;
			}else{
				$porcentaje = 0.1;
			}
		}else{
			$porcentaje = 0.1;
		}
		return $porcentaje;
	}
	private function __quinta($datos = array())
	{
		$entre      = 4;
		$acumulador = 0;
		if (isset($datos) && count($datos) > 0) 
		{
			if (isset($datos[0]['recomendadores']['name'] )) {
				$acumulador++;
			}if (isset($datos[0]['recomendadores']['celular'] )) {
				$acumulador++;
			}if (isset($datos[0]['recomendadores']['email'] )) {
				$acumulador++;
			}if (isset($datos[0]['recomendadores']['cargo_id'] )) {
				$acumulador++;
			}
			$porcentaje =(100*$acumulador)/$entre;
			if ($porcentaje > 1) {
				$porcentaje = $porcentaje;
			}else{
				$porcentaje = 0.1;
			}
		}else{
			$porcentaje = 0.1;
		}

		return $porcentaje;

	}

	// get data per sheet

	private function __dataprimera($usuarioid = null)
	{
		$queryssid      = "CALL PrimeraParteData($usuarioid);";
		$dataUniqueSSID = $this->User->query($queryssid);
		return $dataUniqueSSID;
	}

	private function __datasegunda($usuarioid = NULL)
	{
		$queryssid      = "CALL SegundaParteData($usuarioid);";
		$dataUniqueSSID = $this->User->query($queryssid);
		return $dataUniqueSSID;

	}

	private function __raw2data($datos = array())
	{
		$telefonos  = array();
		$tel        = array();
		$familiares = array();
		$fam        = array();
		for ($i=0; $i < count($datos) ; $i++) { 
			// ordenar telefonos
			if (isset($datos[$i]['telefonos']['id']) && strlen(trim($datos[$i]['telefonos']['id'])) > 0) 
			{
				if (in_array($datos[$i]['telefonos']['id'], $telefonos)){
				}else{
					$telefonos[]                                  = $datos[$i]['telefonos']['id'];
					$tel[$datos[$i]['telefonos']['id']]['numero'] = $datos[$i]['telefonos']['name'];
					$tel[$datos[$i]['telefonos']['id']]['tipo']   = $datos[$i]['telefonos']['tipo'];
				}
			}
			
			//ordenar familiares
			if (isset($datos[$i]['familiares']['id']) && strlen(trim($datos[$i]['familiares']['id'])) > 0) 
			{
				if (in_array($datos[$i]['familiares']['id'], $familiares)){
				}else{
					$familiares[]                                           = $datos[$i]['familiares']['id'];
					$fam[$datos[$i]['familiares']['id']]['id']              = $datos[$i]['familiares']['id'];
					$fam[$datos[$i]['familiares']['id']]['name']            = $datos[$i]['familiares']['name'];
					$fam[$datos[$i]['familiares']['id']]['ocupacion']       = $datos[$i]['familiares']['ocupacion'];
					$fam[$datos[$i]['familiares']['id']]['telefono']        = $datos[$i]['familiares']['telefono'];
					$fam[$datos[$i]['familiares']['id']]['celular']         = $datos[$i]['familiares']['celular'];
					$fam[$datos[$i]['familiares']['id']]['tipofamiliar_id'] = $datos[$i]['familiares']['tipofamiliar_id'];
					$fam[$datos[$i]['familiares']['id']]['trabajo']         = $datos[$i]['familiares']['trabajo'];
					$fam[$datos[$i]['familiares']['id']]['email']           = $datos[$i]['familiares']['email'];
					$fam[$datos[$i]['familiares']['id']]['parentesco']      = $datos[$i]['familiares']['parentesco'];
					$fam[$datos[$i]['familiares']['id']]['responsable']     = $datos[$i]['familiares']['responsable'];
				}
			}
			

		}
		$this->set(compact('tel', 'fam'));
	}

	private function __datatercera($usuarioid = NULL)
	{
		$queryssid      = "CALL TerceraParteData($usuarioid);";
		$dataUniqueSSID = $this->User->query($queryssid);
		return $dataUniqueSSID;
	}


	private function __datacuarta($usuarioid = NULL)
	{
		$queryssid      = "CALL CuartaParteData($usuarioid);";
		$dataUniqueSSID = $this->User->query($queryssid);
		return $dataUniqueSSID;

	}
	private function __dataquinta($usuarioid = NULL)
	{
		$queryssid      = "CALL QuintaParteData($usuarioid);";
		$dataUniqueSSID = $this->User->query($queryssid);
		return $dataUniqueSSID;

	}	


	// admin methods

	public function admin_dashboard()
	{
		/*if ($this->request->is('ajax')) 
		{
			$this->layout = "ajaxselect";
		}*/
		$letras = array();
		$queryssid   = "CALL Usuarios(1,'');";
		$postulantes = $this->User->query($queryssid);
		for ($i=0; $i < count($postulantes); $i++) { 
			$postulantes[$i]['users']['letra'] = substr($postulantes[$i]['users']['name'], 0,1);
			if (in_array(substr($postulantes[$i]['users']['name'], 0,1), $letras)) {
				# code...
			}else{
				$letras[] = substr($postulantes[$i]['users']['name'], 0,1);
			}
		}
		//sort($letras);


		//para los graficos
		//-- grafico 1
		$this->__combos();
		$this->set(compact('postulantes', 'letras'));
		$a = date("Y");

		$queryssid    = "CALL ReportePostulantePeriodo($a, 999999);";
		$barra  = $this->User->query($queryssid);

		$completado       = 0;
		$menordecincuenta = 0;
		$mayorde50menor75 = 0;
		$nofinalizado     = 0;
		$entre75y100      = 0;
		for ($i=0; $i < count($barra); $i++) { 
			$datos       = $this->__dataprimera($barra[$i]['users']['id']);
			$porcentaje1 = $this->__primera($datos);

			// segunda parte
			$datos2      = $this->__datasegunda($barra[$i]['users']['id']);
			$porcentaje2 = $this->__segunda($datos2);

			// tercera parte
			$datos3      = $this->__datatercera($barra[$i]['users']['id']);
			$porcentaje3 = $this->__tercera($datos3);

			// cuarta parte
			$datos4      = $this->__datacuarta($barra[$i]['users']['id']);
			$porcentaje4 = $this->__cuarta($datos4);

			// porcentaje quinta pagina
			$datos5      = $this->__dataquinta($barra[$i]['users']['id']);
			$porcentaje5 = $this->__quinta($datos5);

			$total = number_format(($porcentaje1+$porcentaje2+$porcentaje3+$porcentaje4+$porcentaje5)/5,2);
			if ($total == 100.00 && !empty($barra[$i]['aplicaciones']['codigoPostulante'])) {
				$completado++;
			}elseif ($total < 50) {
				$menordecincuenta++;
			}elseif ($total >= 50 && $total < 75) {
				$mayorde50menor75++;
			}elseif ($total == 100.00 && empty($barra[$i]['aplicaciones']['codigoPostulante'])) {
				$nofinalizado++;
			}elseif ($total >= 75 && $total < 100) {
				$entre75y100++;
			}else{

			}
			$barra[$i]['users']['completado'] = $total;
		}
		for ($i=0; $i < count($barra); $i++) { 
			if (strlen(trim($barra[$i]['instituciones']['name'])) > 0) 
			{
				$barra[$i]['institucionesv']['name'] = $barra[$i]['instituciones']['name'];
				if (strlen(trim($barra[$i]['paisinstitucion']['name'])) > 0) {
				$barra[$i]['institucionesv']['pais'] = $barra[$i]['paisinstitucion']['name'];
				}else{
				$barra[$i]['institucionesv']['pais'] = 'No Completado';
				}
			}elseif (strlen(trim($barra[$i]['instituciones_adicionales']['name'])) > 0) {
				$barra[$i]['institucionesv']['name'] = $barra[$i]['instituciones_adicionales']['name'];
				if (strlen(trim($barra[$i]['paisotro']['name'])) > 0) {
				$barra[$i]['institucionesv']['pais'] = $barra[$i]['paisotro']['name'];
				}else{
				$barra[$i]['institucionesv']['pais'] = 'No Completado';
				}
			}else{
				$barra[$i]['institucionesv']['pais'] = 'No Completado';
				$barra[$i]['institucionesv']['pais'] = 'No Completado';
			}
		}


		//-grafico 2
		$queryssid        = "CALL ReporteInstituciones($a, 999999);";
		$instituciones    = $this->User->query($queryssid);

		$int              = array();
		$totalpostulantes = 0;
		for ($i=0; $i < count($instituciones); $i++) 
		{ 
			
			if (isset($instituciones[$i]['users']['institucion_id']) && strlen(trim($instituciones[$i]['instituciones']['name'])) > 0 && $instituciones[$i]['users']['institucion_id'] > 0) {
				if(in_array(trim($instituciones[$i]['instituciones']['name']), $int)){

				}else{
					$int[] = $instituciones[$i]['instituciones']['name'];
				}
				
			}elseif (isset($instituciones[$i]['users']['instituciones_adicionale_id']) && strlen(trim($instituciones[$i]['instituciones_adicionales']['name'])) > 0 && $instituciones[$i]['users']['instituciones_adicionale_id'] > 0) {
				if(in_array(trim($instituciones[$i]['instituciones_adicionales']['name']), $int)){

				}else{
					$int[] = $instituciones[$i]['instituciones_adicionales']['name'];
				}
			}else{
				if(in_array('No completado', $int)){

				}else{
					$int[] = 'No completado';
				}
			}
			$totalpostulantes++;
		}
		$int1  = array();
		$check = array();
		for ($j=0; $j < count($int) ; $j++) { 
			$contador = 0;
			
			for ($i=0; $i < count($instituciones); $i++) 
			{ 

				if (isset($instituciones[$i]['users']['institucion_id']) && strlen(trim($instituciones[$i]['instituciones']['name'])) > 0 && $instituciones[$i]['users']['institucion_id'] > 0) {
						
						$int1[$instituciones[$i]['instituciones']['name']]['pais']          = $instituciones[$i]['paises']['name'];
						$int1[$instituciones[$i]['instituciones']['name']]['departamentos'] = $instituciones[$i]['departamentos']['name'];
						$int1[$instituciones[$i]['instituciones']['name']]['intid']         = $instituciones[$i]['users']['institucion_id'];
						$int1[$instituciones[$i]['instituciones']['name']]['tipo']          = 1;
						if ($int[$j] == trim($instituciones[$i]['instituciones']['name'])) {
							$int1[$instituciones[$i]['instituciones']['name']]['contador']      = $contador + 1;
						}else{
							//debug($instituciones[$i]['instituciones']['name']);
						}	
					
				}elseif (isset($instituciones[$i]['users']['instituciones_adicionale_id']) && strlen(trim($instituciones[$i]['instituciones_adicionales']['name'])) > 0 && $instituciones[$i]['users']['instituciones_adicionale_id'] > 0) {
							
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['pais']          = $instituciones[$i]['paisesotro']['name'];
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['departamentos'] = 'sin departamento';
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['intid']         = $instituciones[$i]['users']['instituciones_adicionale_id'];
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['tipo']          = 2;
							if ($int[$j] == trim($instituciones[$i]['instituciones_adicionales']['name'])) {
								$int1[$instituciones[$i]['instituciones_adicionales']['name']]['contador'] = $contador + 1;
							}else{

							}
				}else{
					
				}
			}
		}
		$this->__highest($int1);
		$this->set(compact('barra', 'int1', 'int', 'totalpostulantes','completado', 'nofinalizado', 'menordecincuenta', 'mayorde50menor75', 'entre75y100'));

		/*debug($this->request->clientIp());
		debug($this->RequestHandler->isMobile());
		debug($this->request->clientIp());
		debug($this->request->domain());
		debug($this->request->subdomains());
		debug($this->__getRealIpAddr());*/

	}

	private function __getRealIpAddr()
	{
	   if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	   {
	     $ip=$_SERVER['HTTP_CLIENT_IP'];
	   }
	   elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	   {
	     $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	   }
	   else
	   {
	     $ip=$_SERVER['REMOTE_ADDR'];
	   }
	   return $ip;
	}
	// funciones de validacion

	public function validate_form()
	{
		if($this->request->is('ajax'))
		{
			//$this->layout = "ajaxtable";
			//$this->data['User'][$this->params['form']['field']] = $this->params['form']['value'];
			$this->request->data['User'][$this->request->data['field']] = $this->request->data['value'];
			$this->User->set($this->data);
			if ($this->User->validates()) {
				$this->autoRender = FALSE;
			}else{
				//$this->layout = "ajaxtable";
				$error = $this->validateErrors($this->User);
				$this->set('error', $error[$this->request->data['field']]);
			}
		}
	}

	public function validate_pass()
	{
		if($this->request->is('ajax'))
		{
			$this->layout = "ajax";
			//$this->data['User'][$this->params['form']['field']] = $this->params['form']['value'];
			$this->request->data['User']['password_confirmation'] = $this->request->data['password_confirmation'];
			$this->request->data['User']['password']              = $this->request->data['password'];
			$this->User->set($this->data);
			//debug($this->data);
			if ($this->User->validates()) {
				$this->autoRender = FALSE;
			}else{
				$error = $this->validateErrors($this->User);
				//$this->set('error', $error[$this->request->data['field']]);
				$this->set('error', $error['password_confirmation']);
			}
		}
	}


	public function validateregister()
	{
		$this->autoRender = FALSE;
		if ($this->request->is('ajax')) 
		{
			$this->request->data['User']['name']                  = $this->request->data['name'];
			$this->request->data['User']['password']              = $this->request->data['password'];
			$this->request->data['User']['password_confirmation'] = $this->request->data['password_confirmation'];
			$this->request->data['User']['email']                 = $this->request->data['email'];
			$this->request->data['User']['username']              = $this->request->data['username'];

			$this->User->set($this->data);

			if ($this->User->validates()){
				return 1;
			}else{
				return 2;
			}
		}else{
			return 3;
		}
	}

	public function registrar()
	{
		$this->autoRender = FALSE;
		if($this->request->is('ajax'))
		{
			$this->request->data['User']['name']                  = $this->request->data['name'];
			$this->request->data['User']['password']              = $this->request->data['password'];
			/*$this->request->data['User']['password_confirmation'] = $this->request->data['password_confirmation'];*/
			$this->request->data['User']['email']                 = $this->request->data['email'];
			$this->request->data['User']['username']              = $this->request->data['username'];
			$this->request->data['User']['codverificacion']       = md5(rand(1000,10000000000000));
			$this->request->data['User']['group_id']              = 1;

			if ($this->User->save($this->request->data)) {
				//enviar correo y guardar tanto en tabla usuarios como en la aplicacion
				$lastid = $this->User->getLastInsertID();
				$this->Aplicacione->create();
				$data = array('user_id' => $lastid, 'year' => date('Y'));
				$this->Aplicacione->save($data);

				$this->__correroregistro($this->request->data['User']['name'],$this->request->data['User']['email'],$this->request->data['User']['username'],$this->request->data['User']['password'],$this->request->data['User']['codverificacion']);
				$this->__correroregistroadmision($this->request->data['User']['name'],$this->request->data['User']['email'],$this->request->data['User']['username'],$this->request->data['User']['password'],$this->request->data['User']['codverificacion']);

				return 1;
			}else{
				// no se pudo guardar
				return 2;
			}
		}
	}

	public function finalizar()
	{
		$this->autoRender = FALSE;
		$userid     = $this->usuarioAutenticado('id');
		$aplicacion = $this->Aplicacione->field('id', array('Aplicacione.user_id' => $userid));
		if (!empty($aplicacion) && $aplicacion > 0) {
			$codigo = $this->__get_max();
			$this->Aplicacione->id = $aplicacion;
				$data = array('finalizado' => 1, 'codigoPostulante' => $codigo + 1);
			$this->Aplicacione->save($data);


			// CORREOS SOLICITANDO RECOMENDACION
			$datosr = $this->Aplicacione->query("SELECT recomendadores.name, recomendadores.celular, recomendadores.email, cargos.name,
												instituciones_adicionales.name, paisotra.name, instituciones.name, paisuno.name
												FROM aplicaciones
												INNER JOIN users ON aplicaciones.user_id = users.id
												INNER JOIN recomendadores ON recomendadores.id = aplicaciones.recomendador_id
												INNER JOIN cargos ON cargos.id = recomendadores.cargo_id
												LEFT JOIN instituciones_adicionales ON  instituciones_adicionales.id = users.instituciones_adicionale_id
												LEFT JOIN paises as paisotra ON  instituciones_adicionales.pais_id = paisotra.id
												LEFT JOIN instituciones ON  instituciones.id = users.institucion_id
												LEFT JOIN paises as paisuno ON  instituciones.pais_id = paisuno.id
												WHERE users.id =".$this->usuarioAutenticado('id'));


			if (isset($datosr[0]['instituciones']['name'])) 
			{
				$colegio = $datosr[0]['instituciones']['name'];
				$pais    = $datosr[0]['paisuno']['name'];
			}elseif (isset($datosr[0]['instituciones_adicionales']['name'])) 
			{
				$colegio = $datosr[0]['instituciones']['name'];
				$pais    = $datosr[0]['paisotra']['name'];
			}else{

			}
			

			$this->__correorecomendacionpostulante($this->usuarioAutenticado('name'), $this->usuarioAutenticado('email'), $datosr[0]['recomendadores']['name'], $datosr[0]['recomendadores']['celular'], $datosr[0]['recomendadores']['email'], $datosr[0]['cargos']['name'], $colegio, $pais);
			$this->__correorecomendacionadmision($this->usuarioAutenticado('name'), $this->usuarioAutenticado('email'), $datosr[0]['recomendadores']['name'], $datosr[0]['recomendadores']['celular'], $datosr[0]['recomendadores']['email'], $datosr[0]['cargos']['name'], $colegio, $pais);

			// CORREOS SOBRE FINALIZACION
			$this->__correofinalizadopostulante($this->usuarioAutenticado('name'), $this->usuarioAutenticado('email'), $this->usuarioAutenticado('codverificacion'));
			$this->__correofinalizadoadmision($this->usuarioAutenticado('name'), $this->usuarioAutenticado('email'), $this->usuarioAutenticado('codverificacion'));


			$this->Session->setFlash("La aplicación ha finalizado exitosamente. Se ha enviado a tu dirección de correo con el enlace de descarga de la aplicación en formato PDF", "flash_info");
			$this->redirect(array("controller" => "Users", 'action' => 'landing'));

		}else{
			$this->Session->setFlash("La aplicación no se ha podido finalizar. No se encuentra una aplicación asociada a tu cuenta de usuario", "flash_error");
			$this->redirect(array("controller" => "Users", 'action' => 'landing'));
		}
	}


	private function __get_max(){
		$max = $this->Aplicacione->field('MAX(Aplicacione.codigoPostulante)', array('Aplicacione.year' => date('Y')));
		if (isset($max) && $max > 0) {
			return $max;
		}else{
			return 4999;
		}
	}


	public function prueba(){
		$this->autoRender = FALSE;
		$var = $this->__get_max();
		debug($var);
	}

	// CORREOS

	// correo confirmando que se ha registrado
	public function __correroregistro($nombre = NULL, $email = NULL, $username = NULL, $password = NULL, $codigo = NULL)
	{
				$Email = new CakeEmail('default');
				$Email->template('nuevacuenta', 'layout')
					  ->emailFormat('html')
					  ->viewVars(array('usuario' => $username, 'password' => $password, 'nombres' => $nombre, 'codigo' => $codigo))
					  ->from(array('admision@esen.edu.sv' => 'ESEN'))
		    		  ->to(array($email))
		    		  ->subject('Aplicación en línea')
		    		  ->attachments(array(
						    'logo.png' => array(
						        'file' => 'img/esen_header.png',
						        'mimetype' => 'image/png',
						        'contentId' => 'milogo'
						    )
						))
		              ->send();	
	}

	//correo confirmando al depto de admision y al representante de informatica que un usuario se ha registrado
	private function __correroregistroadmision($nombre = NULL, $email = NULL, $username = NULL, $password = NULL, $codigo = NULL)
	{
				$Email = new CakeEmail('default');
				$Email->template('nuevousuario', 'layout')
					  ->emailFormat('html')
					  ->viewVars(array('usuario' => $username, 'password' => $password, 'nombres' => $nombre, 'codigo' => $codigo, 'correo' => $email))
					  ->from(array('admision@esen.edu.sv' => 'Registro postulante'))
		    		  ->to(array('jmpaz@esen.edu.sv', 'admision@esen.edu.sv'))
		    		  ->subject('Nuevo usuario registrado')
		    		  ->attachments(array(
						    'logo.png' => array(
						        'file' => 'img/esen_header.png',
						        'mimetype' => 'image/png',
						        'contentId' => 'milogo'
						    )
						))
		              ->send();	
	}
	// correo para cambiar la clave
	private function __correroreset($nombres = NULL, $email = NULL, $username = NULL, $password = NULL, $codigo = NULL)
	{
				$Email = new CakeEmail('default');
				$Email->template('nuevacuenta', 'layout')
					  ->emailFormat('html')
					  ->viewVars(array('nombres' => $nombres))
					  ->from(array('admision@esen.edu.sv' => 'ESEN'))
		    		  ->to(array($email))
		    		  ->subject('Indicaciones de cambio de credenciales')
		    		  ->attachments(array(
						    'logo.png' => array(
						        'file' => 'img/esen_header.png',
						        'mimetype' => 'image/png',
						        'contentId' => 'milogo'
						    )
						))
		              ->send();	
	}

	// Mensaje que se envia al postulante comentandole que ha finalizado exitosamente su postulacion
	private function __correofinalizadopostulante($nombres = NULL, $email = NULL, $codigo = NULL)
	{
				$Email = new CakeEmail('default');
				$Email->template('finalizadopostulante', 'layout')
					  ->emailFormat('html')
					  ->viewVars(array('nombres' => $nombres, 'email' => $email, 'codigo' => $codigo))
					  ->from(array('admision@esen.edu.sv' => 'ESEN'))
		    		  ->to(array($email))
		    		  ->subject('Aplicación en línea')
		    		  ->attachments(array(
						    'logo.png' => array(
						        'file' => 'img/esen_header.png',
						        'mimetype' => 'image/png',
						        'contentId' => 'milogo'
						    )
						))
		              ->send();	
	}

	// Mensaje que se envia al postulante comentandole que un usuario a completado su postulacion
	private function __correofinalizadoadmision($nombres = NULL, $email = NULL, $codigo = NULL)
	{
				$Email = new CakeEmail('default');
				$Email->template('finalizadoadmision', 'layout')
					  ->emailFormat('html')
					  ->viewVars(array('nombres' => $nombres, 'email' => $email, 'codigo' => $codigo))
					  ->from(array('admision@esen.edu.sv' => 'Postulante'))
		    		  ->to(array('jmpaz@esen.edu.sv','admision@esen.edu.sv'))
		    		  ->subject('Postulante ha finalizado')
		    		  ->attachments(array(
						    'logo.png' => array(
						        'file' => 'img/esen_header.png',
						        'mimetype' => 'image/png',
						        'contentId' => 'milogo'
						    )
						))
		              ->send();	
	}


	// Mensaje que se envia al recomendante para que le llene la hoja en linea
	private function __correorecomendacionpostulante($nombres = NULL, $email = NULL, $recomendador = NULL, $celular = NULL, $emailr = NULL, $cargo = NULL, $colegio = NULL, $pais = NULL)
	{
				$Email = new CakeEmail('default');
				$Email->template('recomendacionpostulante', 'layout')
					  ->emailFormat('html')
					  ->viewVars(array('nombres' => $nombres, 'correopostulante' => $email, 'recomendador' => $recomendador, 'celular' => $celular, 'emailr' => $emailr, 'cargo' => $cargo, 'colegio' => $colegio, 'pais' => $pais))
					  ->from(array('admision@esen.edu.sv' => 'ESEN'))
		    		  ->to(array($emailr,$email))
		    		  ->subject('ESEN: Solicitud de recomendación')
		    		  ->attachments(array(
		    		  		'img/carta_recomendacion.pdf',
						    'logo.png' => array(
						        'file' => 'img/esen_header.png',
						        'mimetype' => 'image/png',
						        'contentId' => 'milogo'
						    )
						))
		              ->send();	
	}

	// Mensaje que se envia a admisión con los datos del recomendador por cualquier consulta posterior
	private function __correorecomendacionadmision($nombres = NULL, $email = NULL, $recomendador = NULL, $celular = NULL, $emailr = NULL, $cargo = NULL, $colegio = NULL, $pais = NULL)
	{
				$Email = new CakeEmail('default');
				$Email->template('recomendacionadmision', 'layout')
					  ->emailFormat('html')
					  ->viewVars(array('nombres' => $nombres, 'correopostulante' => $email, 'recomendador' => $recomendador, 'celular' => $celular, 'emailr' => $emailr, 'cargo' => $cargo, 'colegio' => $colegio, 'pais' => $pais))
					  ->from(array('admision@esen.edu.sv' => 'ESEN Carta de recomendación'))
		    		  ->to(array('jmpaz@esen.edu.sv','admision@esen.edu.sv'))
		    		  ->subject('Postulante ha solicidato recomendación')
		    		  ->attachments(array(
						    'logo.png' => array(
						        'file' => 'img/esen_header.png',
						        'mimetype' => 'image/png',
						        'contentId' => 'milogo'
						    )
						))
		              ->send();	
	}


	// GRAFICOS DASHBOARD
	protected function __highest($data = array())
	{

		//debug($data);
		$contador = 0;
		$new      = array();
		$otros    = 0;
		foreach ($data as $key => $value) 
		{
			$contador += $value['contador'];
			$data[$key]['institucion'] = $key;
		}
		if (count($data) > 5) {
			usort($data, array($this,"usort_callback"));
			$top5 = array_slice($data, 0, 5);
			foreach ($top5 as $key => $value) {
				$newtop5[$value['institucion']] = $value;
			}
			$suma = 0;
			foreach ($newtop5 as $key => $value) {
				$new[$key] = number_format(($value['contador']*100)/$contador,2);
				$suma += $value['contador'];
			}
			$otros = number_format((($contador - $suma)*100)/$contador,2);
		}else{
			$suma = 0;
			foreach ($data as $key => $value) {
				$new[$key] = number_format(($value['contador']*100)/$contador,2);	
				$suma += $value['contador'];
			}
			$otros = 0;
		}
		$this->set(compact('contador','otros', 'new'));
	}
	 protected function usort_callback($a, $b)
	{
	  if ($a['contador'] == $b['contador'])
	    return 0;

	  return ($a['contador'] > $b['contador']) ? -1 : 1;
	}

	protected function __combos(){
		$anio     = $this->Aplicacione->field("MIN(Aplicacione.year)");
		$procesos = $this->Proceso->find("list");
		$this->set(compact("anio", 'procesos'));
	}


	public function admin_actualizardona()
	{
		$this->layout ="ajaxtable";
		$anio         = $this->request->data['anio'];
		$proceso      = $this->request->data['proceso'];

		$queryssid        = "CALL ReporteInstituciones($anio, $proceso);";
		$instituciones    = $this->User->query($queryssid);

		$int              = array();
		$totalpostulantes = 0;
		for ($i=0; $i < count($instituciones); $i++) 
		{ 
			
			if (isset($instituciones[$i]['users']['institucion_id']) && strlen(trim($instituciones[$i]['instituciones']['name'])) > 0 && $instituciones[$i]['users']['institucion_id'] > 0) {
				if(in_array(trim($instituciones[$i]['instituciones']['name']), $int)){

				}else{
					$int[] = $instituciones[$i]['instituciones']['name'];
				}
				
			}elseif (isset($instituciones[$i]['users']['instituciones_adicionale_id']) && strlen(trim($instituciones[$i]['instituciones_adicionales']['name'])) > 0 && $instituciones[$i]['users']['instituciones_adicionale_id'] > 0) {
				if(in_array(trim($instituciones[$i]['instituciones_adicionales']['name']), $int)){

				}else{
					$int[] = $instituciones[$i]['instituciones_adicionales']['name'];
				}
			}else{
				if(in_array('No completado', $int)){

				}else{
					$int[] = 'No completado';
				}
			}
			$totalpostulantes++;
		}
		$int1  = array();
		$check = array();
		for ($j=0; $j < count($int) ; $j++) { 
			$contador = 0;
			
			for ($i=0; $i < count($instituciones); $i++) 
			{ 

				if (isset($instituciones[$i]['users']['institucion_id']) && strlen(trim($instituciones[$i]['instituciones']['name'])) > 0 && $instituciones[$i]['users']['institucion_id'] > 0) {
						
						$int1[$instituciones[$i]['instituciones']['name']]['pais']          = $instituciones[$i]['paises']['name'];
						$int1[$instituciones[$i]['instituciones']['name']]['departamentos'] = $instituciones[$i]['departamentos']['name'];
						$int1[$instituciones[$i]['instituciones']['name']]['intid']         = $instituciones[$i]['users']['institucion_id'];
						$int1[$instituciones[$i]['instituciones']['name']]['tipo']          = 1;
						if ($int[$j] == trim($instituciones[$i]['instituciones']['name'])) {
							$int1[$instituciones[$i]['instituciones']['name']]['contador']      = $contador + 1;
						}else{
							//debug($instituciones[$i]['instituciones']['name']);
						}	
					
				}elseif (isset($instituciones[$i]['users']['instituciones_adicionale_id']) && strlen(trim($instituciones[$i]['instituciones_adicionales']['name'])) > 0 && $instituciones[$i]['users']['instituciones_adicionale_id'] > 0) {
							
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['pais']          = $instituciones[$i]['paisesotro']['name'];
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['departamentos'] = 'sin departamento';
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['intid']         = $instituciones[$i]['users']['instituciones_adicionale_id'];
							$int1[$instituciones[$i]['instituciones_adicionales']['name']]['tipo']          = 2;
							if ($int[$j] == trim($instituciones[$i]['instituciones_adicionales']['name'])) {
								$int1[$instituciones[$i]['instituciones_adicionales']['name']]['contador'] = $contador + 1;
							}else{

							}
				}else{
					
				}
			}
		}
		$this->__highest($int1);
		$this->set(compact('instituciones', 'int1', 'int', 'proceso', 'anio', 'totalpostulantes'));
	}

	public function admin_actualizarbarra()
	{
		$this->layout = "ajaxtable";
		$proceso      = $this->request->data['proceso'];
		$anio         = $this->request->data['anio'];
		$queryssid    = "CALL ReportePostulantePeriodo($anio, $proceso);";
		$postulantes  = $this->User->query($queryssid);

		$completado       = 0;
		$menordecincuenta = 0;
		$mayorde50menor75 = 0;
		$nofinalizado     = 0;
		$entre75y100      = 0;
		for ($i=0; $i < count($postulantes); $i++) { 
			$datos       = $this->__dataprimera($postulantes[$i]['users']['id']);
			$porcentaje1 = $this->__primera($datos);

			// segunda parte
			$datos2      = $this->__datasegunda($postulantes[$i]['users']['id']);
			$porcentaje2 = $this->__segunda($datos2);

			// tercera parte
			$datos3      = $this->__datatercera($postulantes[$i]['users']['id']);
			$porcentaje3 = $this->__tercera($datos3);

			// cuarta parte
			$datos4      = $this->__datacuarta($postulantes[$i]['users']['id']);
			$porcentaje4 = $this->__cuarta($datos4);

			// porcentaje quinta pagina
			$datos5      = $this->__dataquinta($postulantes[$i]['users']['id']);
			$porcentaje5 = $this->__quinta($datos5);

			$total = number_format(($porcentaje1+$porcentaje2+$porcentaje3+$porcentaje4+$porcentaje5)/5,2);
			if ($total == 100.00 && !empty($postulantes[$i]['aplicaciones']['codigoPostulante'])) {
				$completado++;
			}elseif ($total < 50) {
				$menordecincuenta++;
			}elseif ($total >= 50 && $total < 75) {
				$mayorde50menor75++;
			}elseif ($total == 100.00 && empty($postulantes[$i]['aplicaciones']['codigoPostulante'])) {
				$nofinalizado++;
			}elseif ($total >= 75 && $total < 100) {
				$entre75y100++;
			}else{

			}
			$postulantes[$i]['users']['completado'] = $total;
		}
		for ($i=0; $i < count($postulantes); $i++) { 
			if (strlen(trim($postulantes[$i]['instituciones']['name'])) > 0) 
			{
				$postulantes[$i]['institucionesv']['name'] = $postulantes[$i]['instituciones']['name'];
				if (strlen(trim($postulantes[$i]['paisinstitucion']['name'])) > 0) {
				$postulantes[$i]['institucionesv']['pais'] = $postulantes[$i]['paisinstitucion']['name'];
				}else{
				$postulantes[$i]['institucionesv']['pais'] = 'No Completado';
				}
			}elseif (strlen(trim($postulantes[$i]['instituciones_adicionales']['name'])) > 0) {
				$postulantes[$i]['institucionesv']['name'] = $postulantes[$i]['instituciones_adicionales']['name'];
				if (strlen(trim($postulantes[$i]['paisotro']['name'])) > 0) {
				$postulantes[$i]['institucionesv']['pais'] = $postulantes[$i]['paisotro']['name'];
				}else{
				$postulantes[$i]['institucionesv']['pais'] = 'No Completado';
				}
			}else{
				$postulantes[$i]['institucionesv']['pais'] = 'No Completado';
				$postulantes[$i]['institucionesv']['pais'] = 'No Completado';
			}
		}
		$sumapostulantes = $completado + $nofinalizado + $menordecincuenta + $mayorde50menor75 + $entre75y100;
		if ($sumapostulantes != count($postulantes)) {
			$mensaje = "Existen: ".(count($postulantes)-$sumapostulantes).' postulantes que no han compleato el tipo de admisión';
			$this->set(compact('mensaje'));
		}

		$this->set(compact('postulantes', 'completado', 'nofinalizado', 'menordecincuenta', 'mayorde50menor75', 'entre75y100', 'proceso', 'anio'));
	}
}

