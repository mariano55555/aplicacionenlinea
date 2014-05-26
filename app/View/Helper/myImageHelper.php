<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class ImageHelper extends AppHelper {
    public $helpers = array('Html');

    public function myImage($id = NULL) {
        // Use the HTML helper to output
        // formatted data:
        $ruta = $this->webroot . 'img/';
        switch ($id) {
        	case 1:
        		$img = '<img src="'.$ruta.'checked.jpg" alt="usuario" style="width="32px" height="32px" !important">';
        		break;
        	
        	default:
        		$img = '<img src="'.$ruta.'unchecked.jpg" alt="usuario" style="width="32px" height="32px" !important">';
        		break;
        }
       	 
        return $img;
    }
}
?>