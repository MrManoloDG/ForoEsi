<html lang="es">
<head>
 <meta charset="utf-8">
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
								<td>
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
				foreach ($categoria as $fila) { ?>
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
.hijo{
		border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
         border: 0px solid #000000;
		color: black;
		background: #C0BDBA;
		position: absolute;
		/*nos posicionamos en el centro del navegador*/
		top:70%;
		left:47%;
		/*determinamos una anchura*/
		width:430px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-200px;
		/*determinamos una altura*/
		height:100px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-150px;
		border:1px solid #808080;
		padding:5px;
	}
.ta{
		border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
       
    }
   	a{
	color:#ed540c;
}
</style>
<body>
<body id="estilo2">
	<div class="hijo" align="center">
	<a href="<?= base_url().'index.php/Usu/logout'?>" title="Deslogearme">  Cerrar sesión</a>
	<br><br>
		<a href="<?= base_url().'index.php/Usu/cpass'?>" title="CambiarPass">  Cambiar la contraseña</a>
		<a href="<?= base_url().'index.php/Usu/editarPerfil'?>" title="EditarPerfil"> Editar Perfil</a><br>
	<br>
		<a href="<?= base_url().'index.php/Usu/banear'?>" title="Banear"> Banear/Desbanear usuario</a><br><br>
	</div>
</body>
