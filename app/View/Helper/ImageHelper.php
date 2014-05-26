<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class ImageHelper extends AppHelper {
    public $helpers = array('Html');

    public function myImage($id = NULL, $option = NULL) {
        // Use the HTML helper to output
        // formatted data:
       	 	$dir = new Folder(WWW_ROOT . 'files/colaboradores/'.$id.'/img');
			$files = $dir->find('foto.*', true);
			if (count($files) > 0) {
				$ruta = $this->webroot . 'files/colaboradores/'.$id.'/img/'.$files[0];
				switch ($option) {
					case 1:
						# imagen para el dashboar de colaboradores
						$img = '<img src="'.$ruta.'" alt="usuario" style="width:40px; height:40px !important">';
						break;
					case 2:
						#imagen para la la hoja de evaluacion caso de ser 2 , solo para la vista html
						$img = '<img src="'.$ruta.'" alt="usuario" style="width:58px; height:100px !important">';
						break;
					default:
						#imagen para la hoa de evaluacion en caso de ser la vista pdf. Ruta especial
						$img = '<img src="'.WWW_ROOT.'files/colaboradores/'.$id.'/img/'.$files[0].'" alt="usuario" style="width:58px; height:100px !important">';
						break;
				}
				
			}else{
				$ruta= $this->webroot . 'img/noimage.png';
				switch ($option) {
					case 1:
						# imagen para el dashboar de colaboradores
						$img = '<img src="'.$ruta.'" alt="usuario" style="width:40px; height:40px !important">';
						break;
					
					default:
						#imagen para la la hoja de evaluacion caso de ser 2 o no pasar nada
						$img = "";
						break;
				}	
			}
        return $img;
    }
}
?>