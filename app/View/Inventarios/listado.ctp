<?php echo "" ?>
<table id="listadoInv" border='0'>
	<tr>
        <th width='200px'>Tienda</th>
        <th>Producto</th>
        <th width='80px'>Unidad</th>
        <!--th width='80px'>Existencia</th-->
        <th width='90px' style='display:none'>Fecha</th-->
	<?php
    $i = 0;
    $msg = "";
    foreach ($listaInv as $data):
    //pr( $data );
    //utf8_decode(
        $i++;
        $tienda = $data['Tienda']['dentie'];
        $articulo = $data['Articulo']['denart'];
        $medida = $data['Medida']['denunimed'];
        //$medida = $data['Articulo']['codunimed'];
        //$existencia = $data['Inventario']['existencia'];
        //$fecha = $this->Time->format($data['Inventario']['fecha'], '%d-%m-%Y %H:%M:%S');
        $fecha = $data['Inventario']['fecha'];
	?>
		<tr>
			<td><?php echo $tienda; ?></td>
			<td><?php echo $articulo; ?></td>
			<td style='text-align:center;' ><?php echo $medida; ?></td>
			<!--td style='text-align:right;'><?php echo $existencia; ?></td-->
			<td style='display:none;text-align:center;' ><?php echo $fecha; ?></td>
		</tr>
	<?php
    if ($i >= $mostrado) {
        $msg = ". Por favor, sea más especifico en su busqueda";
        break;
    }
    endforeach;
    ?>
    <tr>
        <td colspan=5>&nbsp;</td>
    </tr>
    <tr>
        <td colspan='5'><b><?php echo "Se muestran $i productos de $filas registros encontrados $msg";?></b></td>
    </tr>
</table>
<br />
<p>
<?php
   // echo $this->Paginator->counter('Página {:page} de {:pages}, mostrando {:current} registros de {:count} ') . ' ';
?>
</p>
<?php
    /*
    echo $this->Paginator->first('<< ') . ' ';
    echo $this->Paginator->prev('< ') . ' ';
    echo $this->Paginator->numbers(array('separators' => ''));
    echo $this->Paginator->next('>') . ' ';
    echo $this->Paginator->last('>>');
    echo $this->Js->writeBuffer();
     */
?>
