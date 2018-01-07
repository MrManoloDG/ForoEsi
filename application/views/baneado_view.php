<!DOCTYPE >
<html>

<head>   
    <title>SU CUENTA HA SIDO BANEADA</title>
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
		height:110px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-150px;
		border:1px solid #808080;
		padding:5px;
	}
</style>
<body id="estilo2">
<div class="pa" align="center">
	<a href="<?= base_url().'index.php'?>" title="Volver al inicio"> <img src="<?= base_url().'uploads/'. 'gordo.png'?>" width="150" height="150"></a>
</div>
<div class="hi" align="center">
<h1>SU CUENTA HA SIDO BANEADA</h1>
</div>
</body>
</html>