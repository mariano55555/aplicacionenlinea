<?php
App::uses('AppController', 'Controller');
/**
 * Aplicaciones Controller
 *
 * @property Aplicacione $Aplicacione
 */
class AplicacionesController extends AppController {


public $uses = array('Aplicacione', 'User', 'Proceso');

public function beforeFilter()
{
	parent::beforeFilter();
	$this->Auth->allow(array('aplicacion'));
}




public function admin_generales()
{
	if ($this->request->is('ajax')) {
		$this->layout = 'ajaxtable';
	}
}

public function admin_generalesgeo()
{
	if ($this->request->is('ajax')) {
		$this->layout = 'ajaxtable';
	}
}



public function aplicacion($codigo = NULL)
{
	$this->layout="pdf";
	//$this->autoRender = FALSE;
	//$this->layout = 'ajax';

	$id = $this->User->field("User.id", array('User.codverificacion' => $codigo));

	if (!$id || $id < 1) 
	{
		$this->redirect(array("controller" => "Users", "action" => "login"));
	}else{
		$queryssid = "CALL MiAplicacion($id);";
		$data      = $this->Aplicacione->query($queryssid);
		$this->__rawdata($data);

		$this->set(compact('data'));	
	}

	//debug($data);
}

public function admin_aplicacion($codigo = NULL)
{
	$this->layout="pdf";
	$queryssid = "CALL MiAplicacion($codigo);";
	$data      = $this->Aplicacione->query($queryssid);
	$this->__rawdata($data);
	$this->set(compact('data'));	

}


private function __rawdata($data = array())
{
	$estudiosarray    = array();
	$actividadesarray = array();
	$telefonosarray   = array();
	$familiaresarray  = array();
	$padre            = array();
	$madre            = array();
	$responsable      = array();
	$telefonos        = array();
	$actividades      = array();
	$estudios         = array();
	$responsablemio   = '';
	for ($i=0; $i < count($data) ; $i++) 
	{ 
		if (isset($data[$i]['estudios']['id'])) 
		{
			if (in_array($data[$i]['estudios']['id'], $estudiosarray)) {

			}
			else{
				$estudiosarray[]             = $data[$i]['estudios']['id'];
				$estudios[$i]['id']          = $data[$i]['estudios']['id'];
				$estudios[$i]['name']        = $data[$i]['estudios']['name'];
				$estudios[$i]['institucion'] = $data[$i]['estudios']['institucion'];
				$estudios[$i]['periodo']     = $data[$i]['estudios']['periodo'];
				$estudios[$i]['numero']      = $data[$i]['estudios']['numero'];
			}
		}
		if (isset($data[$i]['actividades']['id'])) 
		{
			if (in_array($data[$i]['actividades']['id'], $actividadesarray)) {

			}
			else{
				$actividadesarray[]             = $data[$i]['actividades']['id'];
				$actividades[$i]['id']          = $data[$i]['actividades']['id'];
				$actividades[$i]['name']        = $data[$i]['actividades']['name'];
				$actividades[$i]['institucion'] = $data[$i]['actividades']['institucion'];
				$actividades[$i]['fecha']       = $data[$i]['actividades']['fecha'];
				$actividades[$i]['puesto']      = $data[$i]['actividades']['puesto'];
			}
		}
		if (isset($data[$i]['telefonos']['id'])) 
		{
			if (in_array($data[$i]['telefonos']['id'], $telefonosarray)) {

			}
			else{
				$telefonosarray[]      = $data[$i]['telefonos']['id'];
				$telefonos[$i]['id']   = $data[$i]['telefonos']['id'];
				$telefonos[$i]['name'] = $data[$i]['telefonos']['name'];
				$telefonos[$i]['tipo'] = $data[$i]['telefonos']['tipo'];
			}
		}
		if (isset($data[$i]['familiares']['id'])) 
		{
			if (in_array($data[$i]['familiares']['id'], $familiaresarray)) {

			}
			else{
				$familiaresarray[]      = $data[$i]['familiares']['id'];
				if ($data[$i]['familiares']['tipofamiliar_id'] == 1) 
				{
					$padre['id']        = $data[$i]['familiares']['id'];
					$padre['name']      = $data[$i]['familiares']['name'];
					$padre['ocupacion'] = $data[$i]['familiares']['ocupacion'];
					$padre['trabajo']   = $data[$i]['familiares']['trabajo'];
					$padre['celular']   = $data[$i]['familiares']['celular'];
					$padre['telefono']  = $data[$i]['familiares']['telefono'];
					$padre['email']     = $data[$i]['familiares']['email'];
					if ($data[$i]['familiares']['responsable'] == 1) {
						$responsablemio = "papa";
					}
				}elseif ($data[$i]['familiares']['tipofamiliar_id'] == 2) {
					$madre['id']        = $data[$i]['familiares']['id'];
					$madre['name']      = $data[$i]['familiares']['name'];
					$madre['ocupacion'] = $data[$i]['familiares']['ocupacion'];
					$madre['trabajo']   = $data[$i]['familiares']['trabajo'];
					$madre['celular']   = $data[$i]['familiares']['celular'];
					$madre['telefono']  = $data[$i]['familiares']['telefono'];
					$madre['email']     = $data[$i]['familiares']['email'];
					if ($data[$i]['familiares']['responsable'] == 1) {
						$responsablemio = "mama";
					}
				}elseif ($data[$i]['familiares']['tipofamiliar_id'] == 3) {
					$responsable['id']         = $data[$i]['familiares']['id'];
					$responsable['name']       = $data[$i]['familiares']['name'];
					$responsable['ocupacion']  = $data[$i]['familiares']['ocupacion'];
					$responsable['trabajo']    = $data[$i]['familiares']['trabajo'];
					$responsable['celular']    = $data[$i]['familiares']['celular'];
					$responsable['telefono']   = $data[$i]['familiares']['telefono'];
					$responsable['email']      = $data[$i]['familiares']['email'];
					$responsable['parentesco'] = $data[$i]['familiares']['parentesco'];
					if ($data[$i]['familiares']['responsable'] == 1) {
						$responsablemio = "responsable";
					}
				}
				
			}
		}
	}
	
	//debug($madre);
	//debug($padre);
	$html  = $this->__pdfreport1($data, $actividades, $estudios, $telefonos);
	$html2 = $this->__pdfreport2($data, $actividades, $estudios, $telefonos);
	$this->set(compact('actividades', 'estudios', 'telefonos', 'html', 'html2', 'responsable', 'responsablemio', 'madre', 'padre'));
}


private function __pdfreport1($data = array(), $actividades = array(), $estudios = array(), $telefonos = array()){

	$html = '<br/>
			<h2 style="text-align:center">Solicitud de admisi&oacute;n</h1>
			<h3 style="color:red; text-align:center">N°  '.$data[0]['aplicaciones']['codigoPostulante'] .'</h3>
				<span style = "text-align:center">Licenciatura en Econom&iacute;a y Negocios - Licenciatura en Ciencias Jur&iacute;dicas - Ingenier&iacute;a de Negocios</span>
			<p>
				<span style="font-size:1.4em">Misi&oacute;n</span><br/>
				Formar de manera integral a futuros l&iacute;deres de El Salvador y Centroam&eacute;rica para que se desempe&ntilde;en con dinamismo y visi&oacute;n en los sectores privado y p&uacute;blico.<br/>
				Contribuir, con excelencia acad&eacute;mica, a crear una masa cr&iacute;tica de profesionales que promueva el desarrollo sostenido de la regi&oacute;n.
			</p>
			<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
				<span style="color:white; padding:25px">REVISION DE REQUISITOS</span>
			</div>';
	$html .= '

	<table cellspacing="3" cellpadding="4" width:100%>
	    <tr>
	        <th style="width:5%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/checked.jpg" width="32px" height="32px"></th>
	        <th align="left" style="width:95%">No olvide cerciorarse que estos requisitos est&eacute;n en sus manos, ya que si falta alguno, no podremos seguir adelante con su proceso de admisi&oacute;n</th>
	    </tr>
	    <tr>
	        <td style="width:5%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	        <td style="width:95%">Solicitud de Admisi&oacute;n <br/> <span style="font-size:0.8em">Llenar el formulario de admisi&oacute;n con letra de molde, legible, e incluir toda la informaci&oacute;n requerida.</span></td>
	    </tr>
	    <tr>
	        <td style="width:5%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	        <td style="width:95%">Dos fotograf&iacute;as <br/> <span style="font-size:0.8em">Presentar dos fotograf&iacute;as recientes a color, tamaño c&eacute;dula una pegada en el formulario de admisi&oacute;n y la otra con el n&uacute;mero de colicitud y nombre completo del aspirante.</span></td>
	    </tr>
	    <tr>
	        <td style="width:5%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	        <td style="width:95%">Carta recomendaci&oacute;n<br /><span style="font-size:0.8em">Adjunto a la solicitud encontrar&aacute; un formato de carta que deber&aacute; ser completado por un profesor de matem&aacute;ticas o encargado de bachillerato de su instituci&oacute;n educativa (presentarla en sobre sellado y firmado en el cierre por el recomendante).</span></td>    </tr>
	    <tr>
	        <td style="width:5%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	        <td style="width:95%">Notas de bachillerato<br /><span style="font-size:0.8em">Original y copia de notas finales obtenidas en los años cursados del bachillerato y notas recientes del año en curso.</span></td>
	    </tr>
	    <tr>
	        <td style="width:5%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	        <td style="width:95%">Pago de derecho de examen<br /><span style="font-size:0.8em">Luego de entregar la solicitud deber&aacute; pagar US $20.00 para tener derecho al examen de admisi&oacute;n.<br/>
	        Inmediatamente se le entregar&aacute; su Gu&iacute;a de Estudio preparatoria al examen.
	        </span></td>
	    </tr>
	</table>
	<div style="text-decoration:none;background-color:#000000;color:black; width:100%;">&nbsp;
		<span style="color:white;">INSTRUCCIONES GENERALES</span>
	</div>
	<ul>
		<li>No se procesa ninguna solicitud que no est&eacute; completa, tanto en el formato como con la documentaci&oacute;n solicitada.</li>
		<li>Toda la informaci&oacute;n obtenida en esta solicitud es totalmente confidencial y no ser&aacute; discutida con ninguna persona ajena al proceo de selecci&oacute;n de alumnos.</li>
		<li>La ESEN se reserva el derecho de verificar la exactitud de los datos presentados en esta solicitud. <br/> Cualquier informaci&oacute;n que resulte falsa, constituir&aacute; un impedimento para la admisi&oacute;n del postulante.</li>
		<li>No se devolver&aacute; ning&uacute;n documento independientemente de la decisi&oacute;n de admisi&oacute;n.</li>
	</ul>
	';





	return $html;

}


private function __pdfreport2($data = array(), $actividades = array(), $estudios = array(), $telefonos = array()){


	switch ($data[0]['aplicaciones']['carrera_id'])  {
	    case 1:
	        // create some HTML content
	        $html = '
	        <br/><br/><br/><br/><br/>
	        <div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
	            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;A&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;CARRERA QUE DESEA CURSAR</span>
	        </div>
	        <table cellspacing="3" cellpadding="4" width:100%>
	            <tr>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/checked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Licenciatura en Econom&iacute;a y Negocios</td>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Licenciatura en Ciencias Jurídicas</td>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Ingeniería de Negocios</td>
	            </tr>
	        </table>';
	        break;
	    case 2:
	        $html = '
	        <br/><br/><br/><br/><br/>
	        <div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
	            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;A&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;CARRERA QUE DESEA CURSAR</span>
	        </div>
	        <table cellspacing="3" cellpadding="4" width:100%>
	            <tr>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Licenciatura en Econom&iacute;a y Negocios</td>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/checked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Licenciatura en Ciencias Jurídicas</td>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Ingeniería de Negocios</td>
	            </tr>
	        </table>';
	        break;
	    default:
	        $html = '
	        <br/><br/><br/><br/><br/>
	        <div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
	            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;A&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;CARRERA QUE DESEA CURSAR</span>
	        </div>
	        <table cellspacing="3" cellpadding="4" width:100%>
	            <tr>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Licenciatura en Econom&iacute;a y Negocios</td>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Licenciatura en Ciencias Jurídicas</td>
	                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/checked.jpg" width="32px" height="32px"></td>
	                <td style="width:29%">Ingeniería de Negocios</td>
	            </tr>
	        </table>';
	        break;
	}

	switch ($data[0]['aplicaciones']['proceso_id']) {
    case 1:
       $html.= '<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;B&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;PROCESO AL QUE DESEA POSTULAR</span>
        </div>
        <table cellspacing="3" cellpadding="4" width:100%>
            <tr>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/checked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n temprana</td>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n regular</td>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n extraordinaria</td>
            </tr>
        </table>
        <div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;C&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;DATOS PERSONALES</span>
        </div>
        Por favor escriba su nombre tal como aparece en su partida de nacimiento.
        <br/>
        Apellidos
        ';
        break;
    case 2:
        $html.= '<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;B&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;PROCESO AL QUE DESEA POSTULAR</span>
        </div>
        <table cellspacing="3" cellpadding="4" width:100%>
            <tr>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n temprana</td>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/checked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n regular</td>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n extraordinaria</td>
            </tr>
        </table>
        <div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;C&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;DATOS PERSONALES</span>
        </div>
        Por favor escriba su nombre tal como aparece en su partida de nacimiento.
        <br/>
        Apellidos
        ';        
        break;
    
    default:
        $html.= '<div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;B&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;PROCESO AL QUE DESEA POSTULAR</span>
        </div>
        <table cellspacing="3" cellpadding="4" width:100% >
            <tr>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n temprana</td>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/unchecked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n regular</td>
                <td style="width:4%"><img src="http://'.$_SERVER['HTTP_HOST'].'/'.$this->webroot.'/img/checked.jpg" width="32px" height="32px"></td>
                <td style="width:29%">Admisi&oacute;n extraordinaria</td>
            </tr>
        </table>
        <div style="text-decoration:none;background-color:#000000;color:black; width:100%; padding:25px">&nbsp;
            <span style="margin-left:-10px; color:black; background-color:white; font-weight:bold">&nbsp;&nbsp;C&nbsp;&nbsp;</span><span style="color:white; padding:25px">&nbsp;&nbsp;&nbsp;DATOS PERSONALES</span>
        </div>
        Por favor escriba su nombre tal como aparece en su partida de nacimiento.
        <br/>
        Apellidos
        ';
        break;
	}



	return $html;

}




/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$aplicaciones = $this->Aplicacione->find("all");
		$this->set(compact('aplicaciones'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Aplicacione->id = $id;
		$aplicacione = $this->__findAplicacione($this->Aplicacione->id);
		$this->set(compact('aplicacione'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Aplicacione->create();
			if ($this->Aplicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The aplicacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aplicacione could not be saved. Please, try again.'));
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
		$this->Aplicacione->id = $id;
		$aplicacione = $this->__findAplicacione($this->Aplicacione->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aplicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The aplicacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aplicacione could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $aplicacione;
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
		$this->Aplicacione->id = $id;
		$aplicacione = $this->__findAplicacione($this->Aplicacione->id);
		if ($this->Aplicacione->delete()) {
			$this->Session->setFlash(__('Aplicacione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aplicacione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function __lists()
	{
		$users         = $this->Aplicacione->User->find('list');
		$carreras      = $this->Aplicacione->Carrera->find('list');
		$procesos      = $this->Aplicacione->Proceso->find('list');
		$examens       = $this->Aplicacione->Examene->find('list');
		$temas         = $this->Aplicacione->Tema->find('list');
		$recomendadors = $this->Aplicacione->Recomendadore->find('list');
		$evaluacions   = $this->Aplicacione->Evaluacione->find('list');
		$this->set(compact('users', 'carreras', 'procesos', 'examens', 'temas', 'recomendadors', 'evaluacions'));
	}

	private function __findAplicacione($id = NULL)
	{
		$aplicacion = $this->Aplicacione->find('first', array('conditions'=>array('Aplicacione.id =' => $id)));
		if (empty($aplicacion)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $aplicacion;
	}


	//REPORTES

	public function admin_rpostulantes()
	{
		$this->layout="ajaxselect";
		$this->__combos();
	}


	public function admin_rpostulantesgrid()
	{
		$this->layout ="ajaxtable";
		$proceso = $this->request->data['proceso'];
		$anio    = $this->request->data['anio'];
		$queryssid   = "CALL ReportePostulantePeriodo($anio, $proceso);";
		$postulantes = $this->User->query($queryssid);
		$this->set(compact('postulantes'));
	}

	public function admin_rinstituciones()
	{
		$this->layout="ajaxselect";
		$this->__combos();
	}


	public function admin_ravance()
	{
		$this->layout="ajaxselect";
		$this->__combos();
	}

	public function admin_ravancegrid()
	{
		$this->layout ="ajaxtable";
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

			debug($postulantes[$i]['users']['name'].' '. $total);

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
		$this->set(compact('postulantes', 'completado', 'nofinalizado', 'menordecincuenta', 'mayorde50menor75', 'entre75y100', 'proceso', 'anio'));

	}



	public function admin_updatepost()
	{
		$this->layout ="ajaxtable";
		$rango        = $this->request->data['rango'];
		$proceso      = $this->request->data['proceso'];
		$anio         = $this->request->data['anio'];
		$queryssid    = "CALL ReportePostulantePeriodo($anio, $proceso);";
		$postulantes  = $this->User->query($queryssid);
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
			switch ($rango) {
				case 1:
					if ($total < 50) {
						$postulantes[$i]['users']['tabla'] = "si";
					}
					break;
				case 2:
					if ($total >= 50 && $total < 75) {
						$postulantes[$i]['users']['tabla'] = "si";	
					}
					break;
				case 3:
					if ($total >= 75 && $total < 100) {
						$postulantes[$i]['users']['tabla'] = "si";
					}
					break;
				case 4:
					if ($total == 100.00 && empty($postulantes[$i]['aplicaciones']['codigoPostulante'])) {
						$postulantes[$i]['users']['tabla'] = "si";
					}
					break;
				default:
					if ($total == 100.00 && !empty($postulantes[$i]['aplicaciones']['codigoPostulante'])) {
						$postulantes[$i]['users']['tabla'] = "si";
					}
					break;
			}
			
			$postulantes[$i]['users']['completado'] = $total;
		}
		$this->set(compact('rango', 'postulantes'));
	}
	public function admin_rinstitucionesgrid()
	{
		$this->layout     ="ajaxtable";
		$proceso          = $this->request->data['proceso'];
		$anio             = $this->request->data['anio'];
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

	public function admin_viewallbyint($anio = NULL, $proceso = NULL, $tipo = NULL, $institucion = NULL)
	{
		$this->layout="ajaxtable";
		$institucion1= "'".$institucion."'";
		$queryssid = "CALL ReportePostulantesPorInstitucion($anio, $proceso, $tipo, $institucion1);";
		$data      = $this->User->query($queryssid);
		for ($i=0; $i < count($data) ; $i++) { 
			$datos       = $this->__dataprimera($data[$i]['users']['id']);
			$porcentaje1 = $this->__primera($datos);

			// segunda parte
			$datos2      = $this->__datasegunda($data[$i]['users']['id']);
			$porcentaje2 = $this->__segunda($datos2);

			// tercera parte
			$datos3      = $this->__datatercera($data[$i]['users']['id']);
			$porcentaje3 = $this->__tercera($datos3);

			// cuarta parte
			$datos4      = $this->__datacuarta($data[$i]['users']['id']);
			$porcentaje4 = $this->__cuarta($datos4);

			// porcentaje quinta pagina
			$datos5      = $this->__dataquinta($data[$i]['users']['id']);
			$porcentaje5 = $this->__quinta($datos5);
			$data[$i]['users']['completado'] = number_format(($porcentaje1+$porcentaje2+$porcentaje3+$porcentaje4+$porcentaje5)/5,2);
		}
		$this->set(compact('data', 'institucion'));
	}


	public function admin_rdepartamentos()
	{
		$this->layout="ajaxselect";
		$this->__combos();
	}

	public function admin_rdepartamentosgrid()
	{
		$this->layout ="ajaxtable";
		$proceso      = $this->request->data['proceso'];
		$anio         = $this->request->data['anio'];
		$queryssid    = "CALL ReporteDepartamentos($anio, $proceso);";
		$data         = $this->User->query($queryssid);
		$total        = count($data);
		$deptos = array();
		for ($i=0; $i < count($data); $i++) { 
			if (!empty($data[$i]['users']['departamento_id'])) {
				if (in_array($data[$i]['departamentos']['name'], $deptos)) {
				
				}else{
					$deptos[] = $data[$i]['departamentos']['name'];
				}	
			}elseif (!empty($data[$i]['users']['otraubicacion_id'])) {
				if (in_array($data[$i]['otraubicaciones']['name'], $deptos)) {
				
				}else{

				}	
			}else{

			}
		}
		$new1 = array();
		for ($j=0; $j < count($deptos) ; $j++) { 
			$new1[$deptos[$j]]['contador'] = 0;
			for ($i=0; $i < count($data); $i++) { 
				if (!empty($data[$i]['users']['departamento_id'])) {
					if ($deptos[$j] == $data[$i]['departamentos']['name'] ) {
						$new1[$deptos[$j]]['contador'] += 1;
						$new1[$deptos[$j]]['pais']     = $data[$i]['paisdepto']['name'];
						$new1[$deptos[$j]]['tipo']     = 1;
					}
				}elseif (!empty($data[$i]['users']['otraubicacion_id'])) {
					if ($deptos[$j] == $data[$i]['otraubicaciones']['name'] ) {
						$new1[$deptos[$j]]['contador'] += 1;
						$new1[$deptos[$j]]['pais']     = $data[$i]['pais2']['name'];
						$new1[$deptos[$j]]['tipo']     = 2;
					}
				}else{

				}
			}
			$new1[$deptos[$j]]['participacion'] = number_format(($new1[$deptos[$j]]['contador']*100)/2,2);
		}

		//debug($new1);
		$this->__highest($new1);
		$this->set(compact('data', 'anio', 'proceso', 'new1', 'total'));
	}


	public function admin_viewallbydepto($anio = NULL, $proceso = NULL, $depto = NULL, $tipo = NULL)
	{
		$this->layout = "ajaxtable";
		$departamento = "'".$depto."'";
		$queryssid    = "CALL ReportePostulantesPorDepartamentos($anio,$proceso,$departamento,$tipo);";
		$data         = $this->User->query($queryssid);
		for ($i=0; $i < count($data) ; $i++) { 

			if ($data[$i]['users']['institucion_id'] > 0 ) {
				$data[$i]['institucion']['nombre'] = $data[$i]['instituciones']['name'];
				$data[$i]['institucion']['pais']   = $data[$i]['paises']['name'];
			}elseif ($data[$i]['users']['instituciones_adicionale_id'] > 0 ) {
				$data[$i]['institucion']['nombre'] = $data[$i]['instituciones_adicionales']['name'];
				$data[$i]['institucion']['pais']   = $data[$i]['pais2']['name'];
			}else{
				$data[$i]['institucion']['nombre'] = "no completado";
				$data[$i]['institucion']['pais']   =  "na";
			}

			$datos       = $this->__dataprimera($data[$i]['users']['id']);
			$porcentaje1 = $this->__primera($datos);

			// segunda parte
			$datos2      = $this->__datasegunda($data[$i]['users']['id']);
			$porcentaje2 = $this->__segunda($datos2);

			// tercera parte
			$datos3      = $this->__datatercera($data[$i]['users']['id']);
			$porcentaje3 = $this->__tercera($datos3);

			// cuarta parte
			$datos4      = $this->__datacuarta($data[$i]['users']['id']);
			$porcentaje4 = $this->__cuarta($datos4);

			// porcentaje quinta pagina
			$datos5      = $this->__dataquinta($data[$i]['users']['id']);
			$porcentaje5 = $this->__quinta($datos5);
			$data[$i]['users']['completado'] = number_format(($porcentaje1+$porcentaje2+$porcentaje3+$porcentaje4+$porcentaje5)/5,2);
		}

		$this->set(compact('depto', 'anio', 'proceso', 'data'));

	}

	public function admin_rcomparar()
	{
		$this->layout="ajaxselect";
		$this->__combos();
	}	

	public function admin_rcomparargrid()
	{
		$this->layout ="ajaxtable";
		$proceso      = $this->request->data['proceso'];
		$anio1        = $this->request->data['anio1'];
		$anio2        = $this->request->data['anio2'];
		if (isset($this->request->data['rango'])) {
			$rango = 2;
		}else{
			$rango = 1;
		}

		$queryssid    = "CALL ReporteComparar($anio1, $anio2, $proceso, $rango);";
		$data         = $this->User->query($queryssid);
		$proc = array();
		$ejes = array();
		for ($i=0; $i < count($data) ; $i++) { 
			if (in_array($data[$i]['comparar_temp']['proceso'],$proc)) {
			}else{
				$proc[] = $data[$i]['comparar_temp']['proceso']; 
			}
			if (in_array($data[$i]['comparar_temp']['anio'],$ejes)) {
			}else{
				$ejes[] = $data[$i]['comparar_temp']['anio']; 
			}
		}
		$new = array();
		for ($i=0; $i < count($ejes); $i++) { 
			for ($j=0; $j < count($data); $j++) { 
				if ($ejes[$i] == $data[$j]['comparar_temp']['anio']) 
				{
					$new[$ejes[$i]][$data[$j]['comparar_temp']['proceso']] = $data[$j]['comparar_temp']['contador'];
				}
			}
		}
		$this->set(compact('data', 'anio1', 'anio2', 'proceso', 'rango', 'proc', 'ejes', 'new'));
	}
	public function admin_rproyeccion()
	{
		$this->layout="ajaxselect";
		$this->__combos();
	}

	protected function __combos(){
		$anio     = $this->Aplicacione->field("MIN(Aplicacione.year)");
		$procesos = $this->Proceso->find("list");
		$this->set(compact("anio", 'procesos'));
	}

	protected function __highest($data = array())
	{
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












	//porcentajes
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
			if (isset($datos[0]['users']['direccion']) && strlen(trim($datos[0]['users']['direccion'])) > 0) 
			{
				$acumulador++; //1
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

}
