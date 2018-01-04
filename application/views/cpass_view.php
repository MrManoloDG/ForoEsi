<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Cambiar contraseña</title>
</head>
<body>
 <h1>Cambiar contraseña</h1>
 <br />
 <?= $mensaje ?>
 <!--formulario-->
<form name="form_iniciar" action="<?= base_url().'index.php/Usu/cambiar_pass'?>" method="POST">
 <label for="contraseñaAntigua"> Contraseña antigua</label>
 <input type="password" name="password" /> <br/>
  <label for="nuevaContraseña"> Nueva contraseña</label>
 <input type="password" name="nueva_password" /> <br/>
 <input type="submit" value="Entrar" name="submit" /> <br/>
 <a href="<?= base_url().'index.php'?>" title="volver">Atrás</a>
 </form>
</body>
</html>