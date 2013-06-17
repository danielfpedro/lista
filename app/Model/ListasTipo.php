<?php
App::uses('AppModel', 'Model');
/**
 * ListasTipo Model
 *
 * @property Lista $Lista
 */
class ListasTipo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tipo';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Lista' => array(
			'className' => 'Lista',
			'foreignKey' => 'listas_tipo_id',
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

}
