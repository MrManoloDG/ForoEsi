<!DOCTYPE html>
<html>
<head>
	<title>Editar Perfil</title>
</head>
<body>
	<h1>Editar Perfil</h1>
	<a href="<?= base_url().'index.php/hilos'?>" title="Inicio">  Inicio</a>
	<?php error_reporting(0); ?>
	<?=  $error ?>
	<?= form_open_multipart(base_url().'index.php/usu/editado', array('name'=>'mi_form','id'=>'form'));?>
	<table>
		<tr>
			<th><h2>Usuario: <?= $this->session->userdata('username')?> </h2></th>
		</tr>
		<tr>
			<td><?= form_label('Correo','Correo',array('class'=>'label')); ?><br>
				<?= $this->session->userdata('correo')?>
			</td>
			<td><?= form_input('correo','','class="input"') ?></td>
		</tr>
		<tr>
			<td>
				<?= form_label('Avatar','Avatar',array('class'=>'label')); ?><br>
				<img src="<?= base_url().'uploads/'.$this->session->userdata('avatar') ?>" width="100" height="100"/>
			</td>
			<td>
				<?php echo "<input type='file' name='userfile' size='20' />"; ?>
			</td>
		</tr>
		<tr>
			<td><?= form_label('Estado','Estado',array('class'=>'label')); ?><br>
				<?= $this->session->userdata('estado')?>
			</td>
			<td><?= form_textarea('estado','','class="textarea" row="25px" id="texto"'); ?></td>
		</tr>
	</table>
	
	
	<?= form_submit('submit', 'Guardar','class="submit"');?>
	<?= form_close(); ?>

</body>
</html>