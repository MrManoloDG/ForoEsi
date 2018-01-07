<!DOCTYPE >
<html>
<head>    
    <title>Login ForoESI</title>
    <LINK REL=StyleSheet HREF="<?= base_url().'estilo.css'?>" TYPE="text/css" MEDIA=screen>
</head>
<body id="estilo2">
	<div class="padre" align="center">
       <a href="<?= base_url().'index.php'?>" title="Volver al inicio"> <img src="<?= base_url().'uploads/'. 'gordo.png'?>" width="150" height="150"></a>
     </div>
	  <div class="hijo" id='login_form' align="center">
        <form action="<?= base_url().'index.php/usu/validar'?>" method='post' name='process'>
            <h2>Identificación</h2>
            <br />            
            <label for='username'>Usuario</label>
            <input type='text' name='username' id='username' size='25' /><br />
        
            <label for='password'>Contraseña</label>
            <input type='password' name='password' id='password' size='25' /><br /> <br />                           
        
            <input type='Submit' value='Login' />            
        </form>
       </div>

</body>
</html>