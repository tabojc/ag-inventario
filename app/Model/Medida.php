<?php

class Medida extends AppModel {
    public $name = 'Medida';
    public $useTable = 'siv_unidadmedida';
    public $primaryKey = 'codunimed';

    public $hasMany = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'codunimed',
        )
    );

}
