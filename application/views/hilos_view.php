<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_web ?></title>
</head>
<body>
	<H1>Usuario : <?= $this->session->userdata('username')?></H1>
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
					<a href="<?= base_url().'index.php/hilos/hilo/'.$hilo->id.'/'.$hilo->titulo?>" title="Ver Hilo"><?= $hilo->titulo; ?></a>
					</td>
					<td>
						<?php 
							$dusu = $this->Usu_model->nom_usuario($hilo->creador); 

							print($dusu[0]) ;
							print("<br>");

						?>
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