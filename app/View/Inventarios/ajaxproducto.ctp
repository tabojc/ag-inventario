<?php echo $this->Form->input('Inventario.codart', array(
                'type' => 'select',
                'options' => $listaProducto,
                'empty' => '(Seleccione)',
                'style'=>'width:160px;',
                'label' => 'Producto',
            ));?>
