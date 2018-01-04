<html lang="es">
<head>
 <meta charset="utf-8">
 <title>pruebas varias</title>
</head>
<a href="<?= base_url().'index.php/hilos'?>" title="Inicio">  Inicio</a><br>
<b>Usuario: <?= $this->session->userdata('username')?></b>
<a href="<?= base_url().'index.php/Usu/logout'?>" title="Deslogearme">  Cerrar sesión</a>
<br /><br />

<a href="<?= base_url().'index.php/Usu/cpass'?>" title="CambiarPass">  Cambiar la contraseña</a>
<br /><br />



<a href="<?= base_url().'index.php/Usu/banear'?>" title="Banear"> Banear/Desbanear usuario</a><br><br>

<a href="<?= base_url().'index.php/Usu/editarPerfil'?>" title="EditarPerfil"> Editar Perfil</a><br>


<h2>numero usuarios registrados</h2><br>
<?php 

echo $registrados; ?>
