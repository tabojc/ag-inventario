<?php

class Articulo extends AppModel {
    public $name = 'Articulo';
    public $useTable = 'siv_articulo';
    public $primaryKey = 'codart';

    public $belongsTo = array (
            'Clasificacion' => array(
                    'className' => 'Clasificacion',
                    'foreignKey' => 'codcla',
                    'type' => 'LEFT',
            ),
            'Medida' => array(
                    'className' => 'Medida',
                    'foreignKey' => 'codunimed',
                    'type' => 'LEFT',
            ),
    );
}

?>
