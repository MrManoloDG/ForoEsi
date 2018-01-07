<html lang="es">
<head>
 <meta charset="utf-8">
 <title>pruebas varias</title>
 <LINK REL=StyleSheet HREF="<?= base_url().'estilo.css'?>" TYPE="text/css" MEDIA=screen>
</head>
<style type="text/css">
.pa{
		position: absolute;
		/*nos posicionamos en el centro del navegador*/
		left:50%;
		width:380px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-200px;
		/*determinamos una altura*/
		height:200px;
		padding:5px;
	}

.hi{
		border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
         border: 0px solid #000000;
		color:#ed540c;
		background: #2c2926;
		position: absolute;
		/*nos posicionamos en el centro del navegador*/
		top:65%;
		left:50%;
		/*determinamos una anchura*/
		width:380px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-200px;
		/*determinamos una altura*/
		height:90px;
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
<div class="pa" align="center">
	<a href="<?= base_url().'index.php'?>" title="Volver al inicio"> <img src="<?= base_url().'uploads/'. 'gordo.png'?>" width="150" height="150"></a>
</div>
<div class="hi" align="center">
<br>
	 <a href="<?= base_url().'index.php/Usu/Registro'?>" title="Deseo
	registrarme">Registrarme</a>

	 <a href="<?= base_url().'index.php/Usu/logear'?>" title="Deseo Logearme">Identificarme</a>
<br /><br />
Numero usuarios registrados: 
<?php 
echo $registrados; ?>
</div>
</body>
