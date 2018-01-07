<!DOCTYPE html>
<html>
<head>
	<div id="estilo1" align="center">
	<table width = " 80% " align = "center" cellpadding="5" cellspacing="0">
			<tr  BGCOLOR= "#2c2926">
				<td align="center" width="25%" style="border-right:0px; font-size: 11px"><a href="<?= base_url().'index.php/hilos'?>" title="Inicio"><img src="<?= base_url().'uploads/'. 'gordo.png'?>" width="80" height="80"></a>
					
				</td>

				<td align="center" width="45%" style="border-right:0px;border-left: 0px; font-size: 11px">
								<div style=" font-size: 35px">FOROESI</div>
								<br>	
								<div><?= form_open(base_url().'index.php/hilos/buscar',
										array('name'=>'mi_form','id'=>'form'));?>
 										<?= form_input('parametro','','class="input"') ?>
 										<?= form_submit('submit', 'Buscar','class="submit"');?>
 										<?= form_close(); ?></div>
				</td>


				<td  align="center" width="30%" style="border-left: 0px; font-size: 11px">
					<div>
						<table class="ta" width = " 80% " align = "center" border= 1 bordercolor="#8B846C" cellpadding="5" cellspacing="0">
							<tr>
								<td align="center">
									<img src="<?= base_url().'uploads/'.$this->session->userdata('avatar') ?>" width="50" height="50"/>	
								</td>
								<td>
									<div><a href="<?= base_url().'index.php/Usu/vistaPerfil/'.$this->session->userdata('id') ?>" title="Ver perfil"><?= $this->session->userdata('username')?></a></div>
									<div><?= $this->session->userdata('estado')?></div>
									<div><a href="<?= base_url().'index.php'?>" title="Editar Perfil">  Editar Perfil</a></div>
									<div><a href="<?= base_url().'index.php/Usu/logout'?>" title="Deslogearme">  Cerrar sesión</a></div>
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
	</table>
</div>
<div id="estilo3">
<table width = " 80% " align = "center" border= 0 bordercolor="#8B846C" cellpadding="5" cellspacing="0">
	<tr  BGCOLOR= "#ff9300 ">
			<?php 
				foreach ($categorias as $fila) { ?>
					<td align="center" width="25%">
					<a href="<?= base_url().'index.php/hilos/categorias/'.$fila->id.'/'.$fila->nombre?>" title="Ver Categoria" style="color:#fff;" align="center"><?= $fila->nombre; ?></a>
					</td>
					
			<?php	}
			?>
	</tr>
	</table>
	
</div>
<br>
</head>
<style type="text/css">
#estilo1{
	background:#2c2926;
	color:#ed540c;
}
#estilo3{
	background:#ff9300;
	color:#fff;
}
#estilo2{
	background:#ebe8e5;
}
.ta{
		border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
       
    }
     	a{
	color:#ed540c;
}
img{
	border-radius: 5px;
}
</style>
<body id="estilo2">
	<?php error_reporting(0); ?>
	<div align="center">
	<table align = "center" width = "80%" >
		<tr BGCOLOR= "#fbfaf9">
		<td align="center" width="33%">Hilo</td>
		<td align="center" width="33%">Creador</td>
		<td align="center" width="33%">Fecha</td>
		</tr>
			<?php 
				foreach ($hilos as $hilo) { ?>
					<tr BGCOLOR = "#C0BDBA">
					<td align="center" width="33%">
					<a href="<?= base_url().'index.php/respuestas/vistaHilo/'.$hilo->id ?>" title="Ver Hilo"><?= $hilo->titulo; ?></a>
					</td>
					<td align="center" width="33%">
						<?php 
							$dusu = $this->Usu_model->nom_usuario($hilo->creador); 
						?>
						<a href="<?= base_url().'index.php/Usu/vistaPerfil/'.$hilo->creador ?>" title="Ver perfil"><?= $dusu[0]?></a><br>
					</td>
					<td align="center" width="33%">
						<?= $hilo->fecha; ?>
					</td>
					</tr>
			<?php	}
			 ?>
		</tr>
		<tr BGCOLOR = "#C0BDBA">
			<td align="center">	<a href="<?= base_url().'index.php/hilos/nuevo' ?>" title="Crear Hilo">Nuevo hilo</a>

		</tr>
	</table>
	</div>
	<div class="paginacion">
		<?php echo $paginacion; ?>
	</div>
</body>
</html>