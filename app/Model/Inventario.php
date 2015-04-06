<?php

class Inventario extends AppModel {
    public $name = 'Inventario';
    public $useTable = 'existencias';

    public $belongsTo = array (
            'Articulo' => array(
                    'className' => 'Articulo',
                    'foreignKey' => 'codart',
                    'type' => 'LEFT',
            ),
            'Tienda' => array(
                    'className' => 'Tienda',
                    'foreignKey' => 'codtiend',
                    'type' => 'LEFT',
            ),
    );
    /*
    public $hasAndBelongsToMany = array(
        'invClasificacion' => array(
            'className' => 'Clasificacion',
            'joinTable' => 'siv_articulo',
            'foreignKey' => 'codart',
            'associationForeignKey' => 'codcla',
        ),
    );
    */
}

?>
