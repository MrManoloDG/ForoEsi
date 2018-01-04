<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<div id="estilo1" align="center">
	<table width = " 80% " align = "center" cellpadding="5" cellspacing="0">
			<tr  BGCOLOR= "#2c2926">
				<td align="center" width="25%" style="border-right:0px; font-size: 11px"><img src="gordo.png" width="80" height="80">
					
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
						<table width = " 80% " align = "center" border= 1 bordercolor="#8B846C" cellpadding="5" cellspacing="0">
							<tr>
								<td>
									<img src="gordo.png" width="35" height="35">	
								</td>
								<td>
									<div>Dmr2910</div>
									<div>no por mas madrugar amanece mas temprano</div>
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
	</table>
</div>
<div id="estilo3">
<table width = " 80% " align = "center"  cellpadding="5" cellspacing="0">
			<tr  BGCOLOR= "#ff9300 ">
				<td align="center" width="25%">General
				</td>
				<td align="center" width="25%">Grados
				</td>
				<td  align="center" width="25%">Apuntes
				</td>
				<td  align="center" width="25%">Comentarios
				</td>
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
</style>
<body id="estilo2">
<?php

$i=0;
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
			    	<div><?= $fila->usuario; ?></div>
			    	<div>wichiju</div>
			    	<div>grwabrbrberberbre</div>
			    	<div>brwb</div>	
				</td>
				
				<td BGCOLOR = "#C0BDBA" align = "left" style="border-bottom:0px;">
					<div><?= $fila->texto; ?></div>
				</td>
				
			</tr>
			<tr>
				<td width="175" BGCOLOR= "#7C7E7C"  style="border-top:0px;">Hoy, 11:54</td>
				<td align = "right" BGCOLOR = "#C0BDBA" style="border-top: 0px;">#1Vhhbj</td>
			</tr>
		</tbody>
	</table>
</div>
<br>

	<?php } ?>
<div align="center">
<?= form_open(base_url().'index.php/respuestas/Guardar',
 array('name'=>'mi_form','id'=>'form'));?>
 <?= form_hidden('my_array', array('id' => '$hilo')); ?>
 <?= form_label('Comentario:','Comentario',array('class'=>'label')); ?> <br/>
 <?= form_textarea('Comentario','','class="textarea" row="35px"'); ?> <br />
 <br />
 <?= form_submit('submit', 'Enviar datos','class="submit"');?>
 <?= form_close(); ?>
</div>
</body>
</html>