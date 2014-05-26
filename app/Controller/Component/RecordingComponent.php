<?php
App::uses('Component', 'Controller');
class RecordingComponent extends Component {
  public $controller  = null;
  public $settings    = array();
  public $cookie      = null;
  public $value       = null;
  public $urlRedirect = null;
  public $components  = array("Cookie");
  public $expira      = array('expires' => '15 days');


   public function __construct($collection, $settings = array()) {
    parent::__construct($collection, $settings);
    $this->settings = array_merge($this->expira, $settings);
  } 

	function initialize(Controller $controller)
  {
    $this->controller = $controller;
    #$this->settings = array_merge(array('expires' => '7 days'), $config);
    //print_r($this->settings);
     if (empty($this->settings['urlRedirect'])) 
    {
      trigger_error(__("Recording::initialize() - Undefined 'urlRedirect' key in {$this->controller->name}Controller::{\$components['Recording']}", true), E_USER_WARNING); 
    }
    $this->cookie = isset($this->controller->request->params['named']['cookie']) ? $this->controller->request->params['named']['cookie'] : null;
    $this->value = isset($this->controller->request->params['named']['value']) ? $this->controller->request->params['named']['value'] : null;
    $this->urlRedirect = $this->settings['urlRedirect'];
    #pr($this->controller->params);
    #exit();
  }
  
  function startup(Controller $controller)
  {
    $controller->autoRender = null;
  }
  
  function redirect()
  {
    $ref = env('HTTP_REFERER');
    if (isset($ref)) 
    {
      $this->controller->redirect($ref, null, true);
    }
    elseif (isset($this->urlRedirect)) 
    {
      $this->controller->redirect($this->urlRedirect, null, true);
    }
  }

  function save($expires = null)
  {
    if (isset($expires)) 
    {
      $this->settings['expires'] = $expires;
    }
    if ($this->__cookieValid($this->cookie, $this->value)) 
    {
      $this->__record($this->cookie, $this->value, $this->settings['expires']);
      return true;
    }
    return false;
  }


  # Privates
  function __record($cookie, $value, $expires)
  {
    $this->Cookie->write($cookie, $value, true, $expires);
  }

  function __cookieValid($cookie, $value)
  {
    if (isset($this->settings['cookies'][$cookie]) && in_array($value, $this->settings['cookies'][$cookie])) 
    {
      return true;
    }
    return false;
  }

}
?>