<?php
class EmailConfig {

	public $smtp = array(
		'transport'     => 'Smtp',
		'from'          => array('admision@esen.edu.sv' => 'ESEN'),
		'host'          => '192.168.1.11',
		'port'          => 25,
		'timeout'       => 30,
		'username'      => 'jmpaz@esen.edu.sv',
		'password'      => 'mariano',
		'client'        => null,
		'log'           => false,
		//'charset'       => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp1 = array(
		'transport' => 'Smtp',
		'from'      => array('admision@esen.edu.sv' => 'Registro postulante'),
		'host'      => '192.168.1.11',
		'port'      => 25,
		'timeout'   => 30,
		'username'  => 'jmpaz@esen.edu.sv',
		'password'  => 'mariano',
		'client'    => null,
		'log'       => false
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp2 = array(
		'transport' => 'Smtp',
		'from'      => array('admision@esen.edu.sv' => 'Postulante'),
		'host'      => '192.168.1.11',
		'port'      => 25,
		'timeout'   => 30,
		'username'  => 'jmpaz@esen.edu.sv',
		'password'  => 'mariano',
		'client'    => null,
		'log'       => false
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp3 = array(
		'transport' => 'Smtp',
		'from'      => array('admision@esen.edu.sv' => 'ESEN Carta de recomendación'),
		'host'      => '192.168.1.11',
		'port'      => 25,
		'timeout'   => 30,
		'username'  => 'jmpaz@esen.edu.sv',
		'password'  => 'mariano',
		'client'    => null,
		'log'       => false
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);


	public $default = array(
		'transport' => 'Mail',
		'from' => 'admision@esen.edu.sv',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
    public function __construct() {
        // Do conditional assignments here.
    }

}
?>
