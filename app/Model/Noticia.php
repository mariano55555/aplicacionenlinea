<?php
App::uses('AppModel', 'Model');
/**
 * Accione Model
 *
 */
class Noticia extends AppModel {
	public $actsAs      = array('WhoDidIt');
	public $useTable    = 'jos_content'; // nombre de la tabla que estoy usando
	public $useDbConfig = 'nueva_conexion'; // conexión a la base de datos que he

}
