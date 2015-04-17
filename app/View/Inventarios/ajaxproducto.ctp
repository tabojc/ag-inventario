<?php echo $this->Form->input('Inventario.codart', array(
                'type' => 'select',
                'options' => $listaProducto,
                'empty' => '(Seleccione)',
                'style'=>'width:160px;',
                'class' => 'validarForm',
                'label' => 'Producto',
                'div' => false,
            ));
?>
