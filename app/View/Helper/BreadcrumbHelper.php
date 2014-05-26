<?php  
App::uses('AppHelper', 'View/Helper');

class BreadcrumbHelper extends AppHelper {
    public $helpers = array('Html','Js');
	/*
	$links array containing information to create links
	'title' => 'Text shown for link'
	'url' => url to redirect, can be created by sending the controller and action
	'class' => optional, to be added id specific CSS needed
	*/
	public function create($links)
	{
		$html = '<div class="breadcrumbs">';
		$html.= "<ul>";
		for ($i=0; $i < count($links) ; $i++) 
		{ 
			$html.="<li>";
				if($i == count($links)-1){
						$html.= "<span>".$links[$i]['title']."</span>";
				}else{
					$html .= $this->Js->link($links[$i]['title'],$links[$i]['url'],
						array(
						    'before' => $this->Js->get('#loading')->effect('fadeIn'),
						    'success' => $this->Js->get('#loading')->effect('fadeOut'),
						    'update' => '#here',
						    'escape' => false,
						    'class' => $links[$i]['class']
						)
				    );
				    $html.='<i class="icon-angle-right"></i>';
				}
			$html.="</li>";
		}
		$html .= "</ul>";
		$html .= '</div>';
		return $html;
	}
}
?>