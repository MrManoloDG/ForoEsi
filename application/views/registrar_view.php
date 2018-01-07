<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Registro de usuario</title>
     <LINK REL=StyleSheet HREF="<?= base_url().'estilo.css'?>" TYPE="text/css" MEDIA=screen>

</head>
<style type="text/css">
	.hijo{
		border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        border: 0px solid #000000;
		color:#ed540c;
		background: #2c2926;
		position: absolute;
		/*nos posicionamos en el centro del navegador*/
		top:60%;
		left:50%;
		/*determinamos una anchura*/
		width:400px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-200px;
		/*determinamos una altura*/
		height:340px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-150px;
		border:1px solid #808080;
		padding:5px;
	}
a{
	color:#ed540c;
}
</style>
<body id="estilo2">
<div class="padre" align="center">
	<a href="<?= base_url().'index.php'?>" title="Volver al inicio"> <img src="<?= base_url().'uploads/'. 'gordo.png'?>" width="120" height="120"></a>
</div>	
<div class="hijo" align="center">
 <h1>Registrar usuario</h1>
 <?php if(isset($mensaje)):?>
 <?= $mensaje?>
 <?php endif;?>
 <!--formulario-->
 <!--@set_value en los inputs para que recuerde los datos introducidos-->
 <?= form_open(base_url().'index.php/Usu/verify_registro',
array('name'=>'form_reg'));?>
 <?= form_label('Usuario','Usuario'); ?>
 <?= form_input('usuario',@set_value('usuario')) ?> <br /> <br />
 <?= form_label('Correo','Correo'); ?>
 <?= form_input('correo',@set_value('correo')) ?> <br /> <br />
 <?= form_label('Contraseña','Contraseña'); ?>
 <?= form_password('pass'); ?> <br /> <br />
 <?= form_label('Repetir contraseña','Repetir_contraseña'); ?>
 <?= form_password('pass2'); ?> <br /> <br />
 <?= form_submit('submit_reg', 'Registrar');?>
 <a href="<?= base_url().'index.php/usu/logear'?>" title="Iniciar Sesión">
Iniciar Sesión</a>
 <?= form_close(); ?>
 <?= validation_errors(); ?>
 </div>
</body>


</html>