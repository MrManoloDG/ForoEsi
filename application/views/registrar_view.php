<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Registro de usuario</title>
</head>
<body>
 <h1>Registrar usuario</h1>
 <?php if(isset($mensaje)):?>
 <h2><?= $mensaje?></h2>
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
 <hr />
 <?= validation_errors(); ?>
 <br />
      <a href="<?= base_url().'index.php'?>" title="Volver al inicio">Volver al inicio</a>
</body>


</html>