<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="<?= base_url().'/js/ckeditor/ckeditor.js'?>"></script>
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
								<td align = "center">
									<img src="<?= base_url().'uploads/'.$this->session->userdata('avatar') ?>" width="35" height="35"/>	
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
img{
	border-radius: 5px;
}
   	a{
	color:#ed540c;
}
</style>
<body id="estilo2">
	 <div align="center">
	<table width = " 80% " align = "center"  cellpadding="5" cellspacing="0">
		<tbody>
			<tr  class="ArribaResp" BGCOLOR= "#fbfaf9">
				<td width="175" style="border-right:0px; font-size: 11px"><?= $alcachofa->fecha; ?>
					
				</td>

				<td align = "right" style="border-left: 0px; font-size: 11px">1
					
				</td>
			</tr>
			<tr valing ="top">
			    <td width="175" BGCOLOR = "#7C7E7C" style="border-top:0px;" >
			    	<div><?php $dusu = $this->Usu_model->nom_usuario($alcachofa->creador);?>
						<a href="<?= base_url().'index.php/Usu/vistaPerfil/'.$alcachofa->creador ?>" title="Ver perfil"><?= $dusu[0]?></a>
					</div><br>
			    	<div>
			    		<?php 
							$dusu = $this->Usu_model->nom_usuario($alcachofa->creador); 
						?>
						<img src="<?= base_url().'uploads/'.$dusu[1] ?>" width="100" height="100"/>
			    	</div><br>
			    	<div><?php 
							$dusu = $this->Usu_model->nom_usuario($alcachofa->creador); 
						?>
						<?= $dusu[2]?>
			    	</div>	
				</td>
				
				<td BGCOLOR = "#C0BDBA" align = "left" style="border-bottom:0px;">
					<div style="font-weight: bold;"><h1><?= $alcachofa->titulo; ?></h1></div>
					<div>-----------------------------------------------------------------------------------------------------------------------------------------</div>
					<div><?= $alcachofa->texto; ?></div>
				</td>
				<tr>
					<td></td><td></td>
				</tr>
				
			</tr>
		</tbody>
	</table>
</div>
<?php

$i=1;
foreach ($respuestas as $fila){ 
$i++;
	?>
 <div align="center">
	<table width = " 80% " align = "center"  cellpadding="5" cellspacing="0">
		<tbody>
			<tr  class="ArribaResp" BGCOLOR= "#fbfaf9">
				<td width="175" style="border-right:0px; font-size: 11px"><?= $fila->fecha; ?>
					
				</td>

				<td align = "right" style="border-left: 0px; font-size: 11px"><?= $i;?>
					
				</td>
			</tr>
			<tr valing ="top">
			    <td width="175" BGCOLOR = "#7C7E7C" style="border-top:0px;" >
			    	<div><?php $dusu = $this->Usu_model->nom_usuario($fila->usuario);?>
						<a href="<?= base_url().'index.php/Usu/vistaPerfil/'.$fila->usuario ?>" title="Ver perfil"><?= $dusu[0]?></a>
					</div>
			    	<div><br>
			    		<?php 
							$dusu = $this->Usu_model->nom_usuario($fila->usuario); 
						?>
						<img src="<?= base_url().'uploads/'.$dusu[1] ?>" width="100" height="100"/>
			    	</div><br>
			    	<div><?php 
							$dusu = $this->Usu_model->nom_usuario($fila->usuario); 
						?>
						<?= $dusu[2]?>
			    	</div>	
				</td>
				
				<td BGCOLOR = "#C0BDBA" align = "left" style="border-bottom:0px;">
					<div><?= $fila->texto; ?></div>
				</td>
				<tr>
					<td></td><td></td>
				</tr>
				
			</tr>
		</tbody>
	</table>
</div>
<br>

	<?php } ?>

<div align="center" style=" width: 80%; margin-left: 10%;">
<?= form_open(base_url().'index.php/respuestas/Guardar',
 array('name'=>'mi_form','id'=>'form'));?>
 <?= form_hidden('hilo',$id);?>
 <?= form_label('Comentario:','Comentario',array('class'=>'label')); ?> <br/>
 <?= form_textarea('texto','','class="textarea" row="25px" id="texto"'); ?> <br />
 <br />
 <script>
					CKEDITOR.replace('texto');
</script>
 <?= form_submit('submit', 'Enviar datos','class="submit"');?>
 <?= form_close(); ?>
</div>
</body>
</html>