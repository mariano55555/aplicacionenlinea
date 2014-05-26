<?php
App::uses('Component', 'Controller');
class LogsComponent extends Component {
	public $uses       = array('User', 'Access');
	public $controller = null;
	public $data       = array();
	public $fecha      = null;

	function initialize(Controller $controller)
	{
		$this->controller = $controller;
		$this->fecha = date("Y-m-d H:i:s");
	}
	function access($user = null, $begin = null, $dispositivo = NULL, $latitud = NULL, $longitud = NULL, $ip = NULL)
	{	
		ClassRegistry::init('Acceso')->create();
		$this->data = array('user_id' => $user, 'inicio'=> date("Y-m-d H:i:s"), 'dispositivo' =>$dispositivo, 'latitud' => $latitud, 'longitud' => $longitud, 'ip'=>$ip);
		ClassRegistry::init('Acceso')->save($this->data);
	}
	function out($id = null, $last = null)
	{
		$this->data = array('id'=>$id, 'fin'=> date("Y-m-d H:i:s"));
		ClassRegistry::init('Acceso')->save($this->data);
	}
	public function action($user = null, $action = null, $table = null)
	{
		ClassRegistry::init('ActionsTablesUser')->create();
		$this->data = array('user_id' => $user, 'created'=> $this->fecha, 'modified'=>$this->fecha, 'action_id'=>$action, 'table_id'=>$table);
		ClassRegistry::init('ActionsTablesUser')->save($this->data);	
	}
}