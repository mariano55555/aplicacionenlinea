<?php  
App::uses('AppHelper', 'View/Helper');

class PaginacionHelper extends AppHelper {
    public $helpers = array('Html','Js');
	/*
	$links array containing information to create links
	'title' => 'Text shown for link'
	'url' => url to redirect, can be created by sending the controller and action
	'class' => optional, to be added id specific CSS needed
	*/
	public function display($activo = NULL)
	{
        switch ($activo) {
            case 1:
                $html='<div class="table-pagination">';
                    /*$html.='<a href="#" class="disabled">Primero</a>';
                    $html.='<a href="#" class="disabled">Anterior</a>';*/
                    $html.='<span>';
                        $html.='<a href="#" class="active">1</a>';
                        $html.='<a href="'.$this->webroot.'segunda_parte">2</a>';
                        $html.='<a href="'.$this->webroot.'tercera_parte">3</a>';
                        $html.='<a href="'.$this->webroot.'cuarta_parte">4</a>';
                        $html.='<a href="'.$this->webroot.'quinta_parte">5</a>';
                    $html.='</span>';
                    $html.='<a href="'.$this->webroot.'segunda_parte">Siguiente</a>';
                    $html.='<a href="'.$this->webroot.'quinta_parte">Último</a>';
                $html.='</div>';
                break;
            case 2:
                $html='<div class="table-pagination">';
                    $html.='<a href="'.$this->webroot.'primera_parte">Primero</a>';
                    $html.='<a href="'.$this->webroot.'primera_parte">Anterior</a>';
                    $html.='<span>';
                        $html.='<a href="'.$this->webroot.'primera_parte">1</a>';
                        $html.='<a href="#"  class="active">2</a>';
                        $html.='<a href="'.$this->webroot.'tercera_parte">3</a>';
                        $html.='<a href="'.$this->webroot.'cuarta_parte">4</a>';
                        $html.='<a href="'.$this->webroot.'quinta_parte">5</a>';
                    $html.='</span>';
                    $html.='<a href="'.$this->webroot.'tercera_parte">Siguiente</a>';
                    $html.='<a href="'.$this->webroot.'quinta_parte">Último</a>';
                $html.='</div>';
                break;
            case 3:
                $html='<div class="table-pagination">';
                    $html.='<a href="'.$this->webroot.'primera_parte">Primero</a>';
                    $html.='<a href="'.$this->webroot.'segunda_parte">Anterior</a>';
                    $html.='<span>';
                        $html.='<a href="'.$this->webroot.'primera_parte">1</a>';
                        $html.='<a href="'.$this->webroot.'segunda_parte">2</a>';
                        $html.='<a href="#" class="active">3</a>';
                        $html.='<a href="'.$this->webroot.'cuarta_parte">4</a>';
                        $html.='<a href="'.$this->webroot.'quinta_parte">5</a>';
                    $html.='</span>';
                    $html.='<a href="'.$this->webroot.'cuarta_parte">Siguiente</a>';
                    $html.='<a href="'.$this->webroot.'quinta_parte">Último</a>';
                $html.='</div>';
                break;
            case 4:
                $html='<div class="table-pagination">';
                    $html.='<a href="'.$this->webroot.'primera_parte">Primero</a>';
                    $html.='<a href="'.$this->webroot.'tercera_parte">Anterior</a>';
                    $html.='<span>';
                        $html.='<a href="'.$this->webroot.'primera_parte">1</a>';
                        $html.='<a href="'.$this->webroot.'segunda_parte">2</a>';
                        $html.='<a href="'.$this->webroot.'tercera_parte">3</a>';
                        $html.='<a href="#" class="active">4</a>';
                        $html.='<a href="'.$this->webroot.'quinta_parte">5</a>';
                    $html.='</span>';
                    $html.='<a href="'.$this->webroot.'quinta_parte">Siguiente</a>';
                    $html.='<a href="'.$this->webroot.'quinta_parte">Último</a>';
                $html.='</div>';
                break;
            case 5:
                $html='<div class="table-pagination">';
                    $html.='<a href="'.$this->webroot.'primera_parte">Primero</a>';
                    $html.='<a href="'.$this->webroot.'cuarta_parte">Anterior</a>';
                    $html.='<span>';
                        $html.='<a href="'.$this->webroot.'primera_parte">1</a>';
                        $html.='<a href="'.$this->webroot.'segunda_parte">2</a>';
                        $html.='<a href="'.$this->webroot.'tercera_parte">3</a>';
                        $html.='<a href="'.$this->webroot.'cuarta_parte">4</a>';
                        $html.='<a href="#" class="active">5</a>';
                    $html.='</span>';
                    /*$html.='<a href="#">Siguiente</a>';
                    $html.='<a href="#">Último</a>';*/
                $html.='</div>';
                break;
            default:
                $html='<div class="table-pagination">';
                    $html.='<a href="#" class="disabled">Primero</a>';
                    $html.='<a href="#" class="disabled">Anterior</a>';
                    $html.='<span>';
                        $html.='<a href="'.$this->webroot.'primera_parte">1</a>';
                        $html.='<a href="'.$this->webroot.'segunda_parte">2</a>';
                        $html.='<a href="#" class="activetercera_parte">3</a>';
                        $html.='<a href="'.$this->webroot.'">4</a>';
                        $html.='<a href="'.$this->webroot.'quinta_parte">5</a>';
                    $html.='</span>';
                    $html.='<a href="#">Siguiente</a>';
                    $html.='<a href="#">Último</a>';
                $html.='</div>';
                break;
        }
		
		
		return $html;
	}
}
?>