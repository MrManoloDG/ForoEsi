<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_web ?></title>
</head>
<body>
	<table>
		<tr>
			<th>Nuevo Hilo</th>
		</tr>
		<?= form_open(base_url().'index.php/hilos/nuevoHilo',
 					array('name'=>'mi_form','id'=>'form'));?>
		<tr>
				<td>Titulo</td>
 				<td><?= form_input('titulo','','class="input"') ?></td>
 				
		</tr>
		<tr>
			<td> </td>
		</tr>
		<tr>
				<td>Texto</td>
				<td><?= form_textarea('texto','','class="textarea" row="25px" id="texto"'); ?></td>
		</tr>
		<tr>
				<td>Categoria</td>
				<td><?= form_dropdown('categ',$categorias,'1'); ?></td>
		</tr>
		<tr>
			<td>
			<?= form_submit('submit', 'Crear Hilo','class="submit"');?>
			
 			<?= form_close(); ?>
 			</td>
		</tr>
	</table>
	<!-- asdadasda-->
</body>
</html>