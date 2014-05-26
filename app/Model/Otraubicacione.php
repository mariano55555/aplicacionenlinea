<?php
App::uses('AppModel', 'Model');
/**
 * Otraubicacione Model
 *
 * @property Pais $Pais
 */
class Otraubicacione extends AppModel {
public $actsAs = array('WhoDidIt');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Paise' => array(
			'className' => 'Paise',
			'foreignKey' => 'pais_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
