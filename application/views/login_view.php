<!DOCTYPE >
<html>

<head>    
    <title>Login ForoESI</title>
</head>
<body>
    <center>
    <div id='login_form'>
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
    
     <a href="<?= base_url().'index.php'?>" title="Volver al inicio">Volver al inicio</a>
 </center>
</body>
</html>