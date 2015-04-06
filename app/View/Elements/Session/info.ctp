<div id="session" >
    <div id='session-row' style='display: table-row;'>
        <div id="session-user" style= 'display: table-cell; width: 85%; text-align: right'><?php echo $this->Session->read('usuario_nombre'); ?></div>
        <div id="session-logout" style='text-align: left' width='15%'>
        <?php
            echo $this->Html->link(
                $this->Html->image('salir.png',
                    array('alt' => 'Regresar', 'title' => 'salir', 'class' => 'button')
            ),
            array('controller' => 'entradas', 'action' => 'salir', null),
            array('escape' => false));
        ?>
        </div>
    </div>
</div>
