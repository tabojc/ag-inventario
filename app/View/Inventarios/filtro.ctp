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

    $("#opcion").bind("click", function (event) {
		if ( $('#opcion').hasClass('icono_menos') ) {
            $.fn.activarBoton(1);
            $('#opcion').removeClass('icono_menos').addClass('icono_mas');
			$( "div#bloqueDescrip" ).addClass("activo").removeClass("inactivo");
			$( "div#bloqueCategoria" ).addClass("inactivo").removeClass("activo");
		} else {
            $.fn.activarBoton(2);
            $('#opcion').removeClass('icono_mas').addClass('icono_menos');
			$( "div#bloqueDescrip" ).addClass("inactivo").removeClass("activo");
            $( "div#bloqueCategoria" ).addClass("activo").removeClass("inactivo");
		}
		$("#listadoInv").remove();
    });

    $('input.validarForm').keyup(function(){
        $.fn.activarBoton(1);
    });

    $.fn.activarBoton = function(campo){
        if(campo == 1){
            $.each($('select.validarForm'), function(){
                $(this)[0].selectedIndex = 0;
            });
            var valor = $.trim($('input.validarForm').val());
            if((valor != '') && (valor.length > 3))
                $('#buscarInventario').prop('disabled', false);
            else
                $('#buscarInventario').prop('disabled', true);
        } else {
            $( "input#InventarioDenart" ).val("");
            var activar = 0;
            $.each($('select.validarForm :selected'), function(indice, valor){
                if(valor.value != '')
                    activar++;
            });
            if(activar == 3)
                $('#buscarInventario').prop('disabled', false);
            else
                $('#buscarInventario').prop('disabled', true);
        }
    };

    $('select.validarForm').change(function(){
        $.fn.activarBoton(2);
    });

    $(document).on('change', 'select.validarForm', function(){
        $.fn.activarBoton(2);
    });
});
</script>
<?php echo $this->Form->create('Inventario', array('action' => 'listado')); ?>
<fieldset>
    <!--legend>Datos del Producto</legend-->
    <div id="bloqueMarco">
		<div id="bloqueFiltro">
			<div id="bloqueCategoria" class="activo">
				<div id="bloqueCla">
                <?php echo $this->Form->input('codcla', array(
                                'type' => 'select',
                                'options' => $listaCla,
                                'empty' => '(Seleccione)',
                                'style'=>'width:160px;',
                                'label' => 'Clasificaci&oacute;n',
                                'class' => 'validarForm',
                                'div' => false,
                            ));?>
				</div><!--bloqueCla-->
				<div id="bloqueSubCla">
                <?php echo $this->Form->input('Inventario.subcla', array(
                                'type' => 'select',
                                'options' => $listaSubCla,
                                'empty' => '(Seleccione)',
                                'style'=>'width:160px;',
                                'label' => 'Sub-Clasificaci&oacute;n',
                                'class' => 'validarForm',
                                'div' => false,
                            ));?>
				</div><!--bloqueSubCla-->
                <div id='bloqueProducto'>
                <?php echo $this->Form->input('Inventario.codart', array(
                                'type' => 'select',
                                'options' => $listaProducto,
                                'empty' => '(Seleccione)',
                                'style'=>'width:160px;',
                                'label' => 'Producto',
                                'class' => 'validarForm',
                                'div' => false,
                            ));?>
                </div><!--bloqueProducto-->
			</div><!--bloqueCategoria-->
			<div id="bloqueDescrip" class="inactivo">
				<?php echo $this->Form->input('denart', array('label' => 'Producto', 'style' => 'width: 90%', 'class' => 'validarForm')); ?>
			</div><!--bloqueDescrip-->
		</div><!--bloqueFiltro-->
		<div id="bloqueBuscar">
		<?php echo $this->Form->button('Buscar', array('id'=>'buscarInventario','type' => 'button','disabled' => true)); ?>
            <div id="bloqueOpcion"><div id="opcion" class="icono_menos"></div></div>
		</div><!--bloqueBuscar-->
    </div><!--bloqueMarco-->
    </fieldset>
	<div id='bloqueListado'></div>
<?php echo $this->Form->end(); ?>
