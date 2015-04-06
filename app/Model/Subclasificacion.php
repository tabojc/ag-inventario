<?php

class Subclasificacion extends AppModel {
    public $name = 'Subclasificacion';
    public $useTable = 'sfc_subclasificacion';
    public $primaryKey = 'cod_sub';

    public $belongsTo = array (
            'Clasificacion' => array(
                'className' => 'Clasificacion',
                'foreignKey' => 'codcla',
                'type' => 'LEFT',
            ),
    );
}

?>
