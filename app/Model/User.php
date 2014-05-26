<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Institucion $Institucion
 * @property Superate $Superate
 * @property Pais $Pais
 * @property Group $Group
 * @property Actividade $Actividade
 * @property Aplicacione $Aplicacione
 * @property Beca $Beca
 * @property Familiare $Familiare
 * @property Hermano $Hermano
 * @property Telefono $Telefono
 */
class User extends AppModel {
public $actsAs = array('WhoDidIt');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese su nombre completo. Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength','5'),
				'message' => 'Longitud mínima de nombre completo de 5 caracteres.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'Name Length' => array(
				'rule' => 'nameLength',
				'message' => "Escribe al menos un nombre y un apellido"
			)
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese su cuenta de correo. Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				 'rule'    => array('email', true),
        		 'message' => 'Ingrese una cuenta de correo válida.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese un nombre para la cuenta de usuario. Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength','5'),
				'message' => 'Longitud mínima de cuenta de usuario es de 5 caracteres.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Ya existe la cuenta de usuario. Ingresa otro nombre de cuenta.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese una contraseña para la cuenta de usuario.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength','5'),
				'message' => 'Longitud mínima de contraseña de 5 caracteres.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'password_confirmation' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido. Confirma la contraseña',
				),
			'Match passwords' => array(
				'rule' => 'matchPasswords',
				'message' => "Tus contraseñas no concuerdan"
			)
		),
		'activo' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


//confirmacion de contraseñas
public function matchPasswords($data)
{
	//debug($data);
	//debug($this->data['User']['password_confirmation']);
	//if (isset($this->data['User']['password_confirm']) && $data['password'] == $this->data['User']['password_confirm']) { 
	if ($this->data['User']['password'] == $this->data['User']['password_confirmation'])
	{
		return true;
	}
	$this->invalidate('password_confirmation', "Tus contraseñas no concuerdan");
		return false;
}

public function nameLength($data)
{
	$nombre = explode(" ",$this->data['User']['name']);
	if (count($nombre) < 2) 
	{
		$this->invalidate('name', "Escribe al menos un nombre y un apellido");
		return false;
	}
	return true;

}

public function beforeSave($options = array()) {

	    if (isset($this->data['User']['password'])) {
	        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	        #AuthComponent::password($this->data['Profesionale']['password']);
	       unset($this->data['User']['passwd']); 
	    }
	    
	    return true;
	}

	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Institucione' => array(
			'className' => 'Institucione',
			'foreignKey' => 'institucion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Superate' => array(
			'className' => 'Superate',
			'foreignKey' => 'superate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Paise' => array(
			'className' => 'Paise',
			'foreignKey' => 'pais_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InstitucionesAdicionale' => array(
			'className' => 'InstitucionesAdicionale',
			'foreignKey' => 'instituciones_adicionale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Otraubicacione' => array(
			'className' => 'Otraubicacione',
			'foreignKey' => 'otraubicacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Municipio' => array(
			'className' => 'Municipio',
			'foreignKey' => 'municipio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Actividade' => array(
			'className' => 'Actividade',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Estudio' => array(
			'className' => 'Estudio',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Aplicacione' => array(
			'className' => 'Aplicacione',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Beca' => array(
			'className' => 'Beca',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Familiare' => array(
			'className' => 'Familiare',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Hermano' => array(
			'className' => 'Hermano',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Telefono' => array(
			'className' => 'Telefono',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Carrera' => array(
			'className' => 'Carrera',
			'joinTable' => 'aplicaciones',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'carrera_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Proceso' => array(
			'className' => 'Proceso',
			'joinTable' => 'aplicaciones',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'proceso_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Tema' => array(
			'className' => 'Tema',
			'joinTable' => 'aplicaciones',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'tema_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Recomendadore' => array(
			'className' => 'Recomendadore',
			'joinTable' => 'aplicaciones',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'recomendador_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Evaluacione' => array(
			'className' => 'Evaluacione',
			'joinTable' => 'aplicaciones',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'evaluacion_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Examene' => array(
			'className' => 'Examene',
			'joinTable' => 'aplicaciones',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'examen_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);

}
