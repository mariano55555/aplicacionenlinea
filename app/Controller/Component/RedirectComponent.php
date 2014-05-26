<?php
App::uses('Component', 'Controller');
class RedirectComponent extends Component {

	public $controller = null;
	public $components = array('Session');
	public $settings   = array();
	public $success    = null;
	public $warning    = null;


	function initialize(Controller $controller)
	{
		$this->controller = $controller;
		$this->settings   = array('success' => 'flash_info', 'warning' => 'flash_error');
		$this->success    = $this->settings['success'];
		$this->warning    = $this->settings['warning'];

	}
	function flashSuccess($msg, $url = null)
	{
		$this->Session->setFlash($msg, $this->success);
		if (!empty($url)) {
			$this->controller->redirect($url, null, true);
		}
	}
	function flashWarning($msg, $url = null)
	{
		$this->Session->setFlash($msg, $this->warning);
		if (!empty($url)) {
			$this->controller->redirect($url, null, true);
		}
	}

	function idEmpty($id, $url)
  	{
    if (!$id && empty($this->controller->data)) {
			$this->flashWarning('Id inválido. Favor verifica tu enlace.', $url);
		}
  	}
}