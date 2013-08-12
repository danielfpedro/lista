<?php
App::uses('AppModel', 'Model');
/**
 * Lista Model
 *
 * @property Evento $Evento
 * @property ListasTipo $ListasTipo
 * @property ListasUsuariosPrivados $usuarios_privados
 * @property Usuario $Usuario
 */
class Lista extends AppModel {

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
		'Evento' => array(
			'className' => 'Evento',
			'foreignKey' => 'evento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ListasTipo' => array(
			'className' => 'ListasTipo',
			'foreignKey' => 'listas_tipo_id',
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
		'usuarios_privados' => array(
			'className' => 'ListasUsuariosPrivados',
			'foreignKey' => 'lista_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'nome',
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
		'Usuario' => array(
			'className' => 'Usuario',
			'joinTable' => 'listas_usuarios',
			'foreignKey' => 'lista_id',
			'associationForeignKey' => 'usuario_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
