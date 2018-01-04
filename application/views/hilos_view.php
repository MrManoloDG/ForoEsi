<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_web ?></title>
</head>
<body>
	<H1>Usuario : <a href="<?= base_url().'index.php/Usu/vistaPerfil/'.$this->session->userdata('id') ?>" title="Ver perfil"><?= $this->session->userdata('username')?></a></H1>
	<img src="<?= base_url().'uploads/'.$this->session->userdata('avatar') ?>" width="80" height="80"/><br>
	<?= $this->session->userdata('estado')?><br>
	<a href="<?= base_url().'index.php'?>" title="Editar Perfil">  Editar Perfil</a><br>
	<a href="<?= base_url().'index.php/Usu/logout'?>" title="Deslogearme">  Cerrar sesión</a><br><br>

	<a href="<?= base_url().'index.php/hilos/nuevo' ?>" title="Crear Hilo">Nuevo hilo</a>
	<table>
		<tr>
			<th>Categorias</th>
			<th>
				
				<?= form_open(base_url().'index.php/hilos/buscar',
 					array('name'=>'mi_form','id'=>'form'));?>
 				<?= form_input('parametro','','class="input"') ?>
 				<?= form_submit('submit', 'Buscar','class="submit"');?>
 				<?= form_close(); ?>
			</th>
		</tr>
		<tr>
			<?php 
				foreach ($categorias as $fila) { ?>
					<td>
					<a href="<?= base_url().'index.php/hilos/categorias/'.$fila->id.'/'.$fila->nombre?>" title="Ver Categoria"><?= $fila->nombre; ?></a>
					</td>
					
			<?php	}
			?>
		</tr>
	
	</table>
	
	<table>
		<tr>
			<th>Hilos Recientes</th>
		</tr>
		<tr>
			<th>Hilo</th>
			<th>Creador</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<?php 
				foreach ($hilos as $hilo) { ?>
					<td>
					<a href="<?= base_url().'index.php/respuestas/vistaHilo/'.$hilo->id ?>" title="Ver Hilo"><?= $hilo->titulo; ?></a>
					</td>
					<td>
						<?php 
							$dusu = $this->Usu_model->nom_usuario($hilo->creador); 
						?>
						<a href="<?= base_url().'index.php/Usu/vistaPerfil/'.$hilo->creador ?>" title="Ver perfil"><?= $dusu[0]?></a><br>
						<img src="<?= base_url().'uploads/'.$dusu[1] ?>" width="80" height="80"/>
						
						
					</td>
					<td>
						<?= $hilo->fecha; ?>
					</td>
			<?php	}
			 ?>
		</tr>
	</table>
</body>
</html>