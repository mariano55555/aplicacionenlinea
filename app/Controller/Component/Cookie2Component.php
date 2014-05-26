<?php
/* /app/View/Helper/LinkHelper.php */
/* /app/View/Helper/LinkHelper.php */
App::uses('Component', 'Controller');
class Cookie2Component extends Component {
    public $resultados = array();
    public $components = array('Cookie', 'Recording');
    public function read($key = null)
    {
    	$cookie = new CookieComponent();
        $cookie->key = configure::read('Security.salt');
        $value = $cookie->read($key);
        if (isset($value)) 
        {
            return $value;
        }
        return false;
      
    }
    public function toggleLink($name, $cookie, $value, $active = false)
    {
        $this->resultados = array();
        $cookieValue = $this->Cookie->read($cookie);
        $url = array('controller' => 'Recordings', 'action' => 'toggle', 'admin' => 0, 'cookie'=> $cookie, 'value' => $value);
        $attr = ($value == $cookieValue || $active) ? array('class' => 'active') : null;
        $this->resultados[] = $name;
        $this->resultados[] = $url;
        $this->resultados[] = $attr;
        return ($this->resultados);

      
    }
}
?>