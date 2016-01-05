<?php 

class Mesero extends AppModel
{
	public $validate = array(
			'dni' => array(
					'notBlank' => array(
							'rule' => 'notBlank'
						),
					'numeric' => array(
							'rule' => 'numeric',
							'message' => 'Sólo números'
						),
					'unique' => array(
						'rule' => 'isUnique', 
						'message' => 'dni existente. Ingresa dato válido')
					),
				'nombre' => array(
					'rule' => 'notBlank'
					),
				'apellido' => array(
					'rule'=> 'notBlank'
					),
				'telefono' => array(
					'notBlank' => array(
							'rule' => 'notBlank'
						),
					'numeric' => array(
							'rule' => 'numeric',
							'message' => 'Sólo números'
						)
				)

		);

}
 ?>