<?php
class MenusUsuario extends AppModel {
    public $name = 'MenusUsuario';
    public $useTable = 'menus_usuarios';
    public $primaryKey = 'id';
    public $belongsTo = 'Usuario, Menu';

    public $belongsTo = array (
            'Usuario' => array(
                    'className' => 'Usuario',
                    'foreignKey' => 'usuario_id',
                    'type' => 'LEFT',
            ),
            'Menu' => array(
                    'className' => 'Menu',
                    'foreignKey' => 'menu_id',
                    'type' => 'LEFT',
            ),
    );

    public $validate = array(
        'nombre' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'el usuario debe tener algun valor!',
            ),
            'nisUnique' => array(
                'rule'=> 'isUnique',
                'required' => true,
                'message' => 'el usuario ya existe!',
                ),
            ),
        'correo' => array(
			'correoRule-1' => array(
				'rule' => 'notEmpty',
                'required' => true,
				'message' => 'el correo debe tener algun valor!',
			),
			'correoRule-2' => array(
				'rule' => 'email',
                'required' => true,
				'message' => 'el correo debe tener algun valor!',
			),
			'correoRule-3' => array(
				'rule'=> 'isUnique',
                'required' => true,
				'message' => 'el correo ya existe!',
			),
        ),
        'contrasena' => array(
			'minLength' => array(
				'rule' => array('minLength', '6'),
                'required' => true,
				'message' => 'la clave debe tener al menos 6 digitos!',
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
                'required' => true,
				'message' => 'la clave debe tener caracteres y numeros!!',
			),

        ),
    );

}
?>
