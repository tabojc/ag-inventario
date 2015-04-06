<?php

class Clasificacion extends AppModel {
    //public $useDbConfig = 'default';
    public $name = 'Clasificacion';
    public $useTable = 'sfc_clasificacion';
    //public $tablePrefix = 'sfc_';
    public $primaryKey = 'codcla';

    public $hasMany = array(
        'Subclasificacion' => array(
            'className' => 'Subclasificacion',
            'foreignKey' => 'codcla',
        )
    );
    public $belongsTo = array (
            'claArticulo' => array(
                'className' => 'Articulo',
                'foreignKey' => 'codcla',
                'type' => 'LEFT',
            ),
    );

    public $hasAndBelongsToMany = array(
        'claInventario' => array(
            'className' => 'Inventario',
            'joinTable' => 'siv_articulo',
            'foreignKey' => 'codcla',
            'associationForeignKey' => 'codart',
        ),
    );
}

?>
