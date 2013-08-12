<?php
App::uses('AppModel', 'Model');
/**
 * ListasUsuariosPrivado Model
 *
 * @property Lista $Lista
 */
class ListasUsuariosPrivado extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Lista' => array(
			'className' => 'Lista',
			'foreignKey' => 'lista_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
