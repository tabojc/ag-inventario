<?php

class Tienda extends AppModel {
    //public $useDbConfig = 'default';
    public $name = 'Tienda';
    public $useTable = 'int_servidores_agencias';
    //public $tablePrefix = 'sfc_';
    public $primaryKey = 'codtiend';

    public $hasMany = array(
        'Inventario' => array(
            'className' => 'Inventario',
            'foreignKey' => 'codtiend',
        )
    );
}

?>
