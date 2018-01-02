<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_web ?></title>
	<h1><?= $titulo_web ?></h1>
</head>
<body>
	
	<table>
		<tr>
			<th>Hilos</th>
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
						<?= $hilo->creador; ?>
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