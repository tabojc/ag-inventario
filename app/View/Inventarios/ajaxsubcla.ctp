<?php echo $this->Form->input('Inventario.subcla', array(
                'type' => 'select',
                'options' => $listaSubCla,
                'empty' => '(Seleccione)',
                'style'=>'width:160px;',
                'class' => 'validarForm',
                'label' => 'Sub-Clasificaci&oacute;n',
                'div' => false
            ));
?>
