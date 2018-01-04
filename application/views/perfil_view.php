<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_web ?></title>
</head>
<body>
	<h1>Usuario: <?= $usuario->usuario ?></h1>
	<table>
		<tr>
			<td>
				<img src="<?= base_url().'uploads/'.$usuario->avatar ?>" width="200" height="200"/>
			</td>
			<td>
				<tr>
					<td>
						Fecha de Creacion:
					</td>
					<td>
						<?= $usuario->fechaCreacion ?>
					</td>
				</tr>
				<tr>
					<td>
						Cuenta:
					</td>
					<td>
						<?php
							if($usuario->reportado) echo "Reportada";
							else echo "Activa";
						?>
					</td>
				</tr>
				<tr>
					<td>
						Correo: 
					</td>
					<td>
						<?= $usuario->correo ?>
					</td>
				</tr>
				<tr>
					<td>
						Estado:<br>
						<?= $usuario->estado ?>
					</td>
				</tr>
				<tr>
					<td>
						Numero Mensajes:
					</td>
					<td>
						<?= $nmensajes->nmensajes ?>
					</td>
				</tr>
			</td>
		</tr>
	</table>
	
	
</body>
</html>