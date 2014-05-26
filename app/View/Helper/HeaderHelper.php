<?php  
App::uses('AppHelper', 'View/Helper');

class HeaderHelper extends AppHelper {
    public $helpers = array('Html','Js');

	public function display($tema = NULL)
	{
		$html = '<div class="page-header">
							<div class="pull-left">
								<h1>'.$tema.'</h1>
							</div>
							<div class="pull-right">
								<ul class="stats">
									<li>'.$this->Html->image('esen_header.png', array('alt' => 'ESEN')).'</li>
								</ul>
							</div>
						</div>';
		return $html;
	}
}
