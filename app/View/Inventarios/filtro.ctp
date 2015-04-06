<?php $before = $this->Js->get('#overlay')->effect('fadeOut', array('buffer' => false)); ?>
<?php $complete = $this->Js->get('#overlay')->effect('fadeOut', array('buffer' => false)); ?>
<?php $data = $this->Js->get('#InventarioListadoForm')->serializeForm(array('isForm' => true, 'inline' => true)); ?>
<?php $this->Js->get('#InventarioCodcla'); ?>
<?php $this->Js->event(
    'change',
    $this->Js->request(
    array('controller'=>'inventarios',
        'action' => 'ajaxsubcla'),
    array('async' => true,
        'update' => '#bloqueSubCla',
        'complete' => "$('#overlay').css('display', 'none');",
        'before' => "$('#overlay').css('display', 'block');",
        'method' => 'post',
        'dataExpression' => true,
        'data' => $data,
        )
    ));
?>
<?php $this->Js->get('#buscarInventario'); ?>
<?php $this->Js->event(
    'click',
    $this->Js->request(
    array('controller'=>'inventarios',
        'action' => 'listado'),
    array('async' => false,
        'update' => '#bloqueListado',
        'method' => 'post',
	'complete' => "$('#overlay').css('display', 'none');",
        'before' => "$('#overlay').css('display', 'block');",
        'dataExpression' => true,
        'data' => $data,
        )
    ));
?>
<script type="text/javascript">
$(document).ready(function () {
    $(document).on('change', '#InventarioSubcla', function() {
        $.ajax({
            async:true, 
            data: $("#InventarioListadoForm").serialize(), 
            dataType:"html", 
            success: function (data, textStatus) {
                    $("#bloqueProducto").html(data);
            }, 
            type:"post", 
            url:"\/inventarios\/ajaxproducto",
            complete: function () {
                    $("#overlay").css('display', 'none');
            }
                    ,
            beforeSend: function () {
                    $("#overlay").css('display', 'block');
            },
        });
        return false;
    });

    $("#InventarioListadoForm").bind("submit", function (event) {
        event.preventDefault();
        $('#buscarInventario').trigger('click');
    });
});
</script>
<?php echo $this->Form->create('Inventario', array('action' => 'listado')); ?>
<fieldset>
    <!--legend>Datos del Producto</legend-->
        <table border="0">
            <td>
                <?php echo $this->Form->input('codcla', array(
                                'type' => 'select',
                                'options' => $listaCla,
                                'empty' => '(Seleccione)',
                                'style'=>'width:160px;',
                                'label' => 'Clasificaci&oacute;n'
                            ));?>
            </td>
            <td>
                <div id='bloqueSubCla'>
                <?php echo $this->Form->input('Inventario.subcla', array(
                                'type' => 'select',
                                'options' => $listaSubCla,
                                'empty' => '(Seleccione)',
                                'style'=>'width:160px;',
                                'label' => 'Sub-Clasificaci&oacute;n'
                            ));?>
                </div>
            </td>
            <td>
                <div id='bloqueProducto'>
                <?php echo $this->Form->input('Inventario.codart', array(
                                'type' => 'select',
                                'options' => $listaProducto,
                                'empty' => '(Seleccione)',
                                'style'=>'width:160px;',
                                'label' => 'Producto'
                            ));?>
                </div>
                <?php //echo $this->Form->input('denart', array('label' => 'Producto')); ?>
            </td>
            <td><?php echo $this->Form->button('Buscar', array('id'=>'buscarInventario','type' => 'button')); ?></td>
        </table>
    </fieldset>
	<div id='bloqueListado'></div>
<?php echo $this->Form->end(); ?>

