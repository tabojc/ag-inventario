<h1>Listado de Menus</h1>
<?php
echo $this->Html->link(
    $this->Html->image('nuevo.png',
		array('alt' => 'Nuevo', 'title' => 'Nuevo producto')),
    array('controller' => 'menus', 'action' => 'nuevo'),
    array('escape' => false));
?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Accion</th>
	</tr>
	<?php foreach ($menus as $data): ?>
		<tr>
			<td><?php echo $data['Menu']['nombre']; ?></td>
			<td>
				<?php
					echo $this->Html->link(
						$this->Html->image('ver.png',
							array('alt' => 'Ver', 'title' => 'Ver menu', 'class' => 'button')),
						array('controller' => 'menus', 'action' => 'ver',$data['Menu']['id']),
						array('escape' => false));
				?>&nbsp;
				<?php
					echo $this->Html->link(
						$this->Html->image('modificar.png',
							array('alt' => 'Modificar', 'title' => 'Modificar menu', 'class' => 'button')),
						array('controller' => 'menus', 'action' => 'modificar',$data['Menu']['id']),
						array('escape' => false));
				?>&nbsp;
				<?php
					echo $this->Form->postLink(
						$this->Html->image('eliminar.png',
							array('alt' => 'Eliminar', 'title' => 'Eliminar menu', 'class' => 'button')),
						array('action' => 'eliminar', $data['Menu']['id']),
						array('escape' => false),
						'Seguro desear eliminar el menu?');
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($menus); ?>
</table>
