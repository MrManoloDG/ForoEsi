<!DOCTYPE >
<html>

<head>    
    <title>Banear usuario</title>
</head>
<body>
    <center>
    <?= $mensaje ?>
    <div id='login_form'>
        <form action="<?= base_url().'index.php/usu/banearUsu'?>" method='post' name='process'>
            <br />            
            <label for='baneado'>Banear usuario: </label>
            <input type='text' name='baneado' id='baneado' size='25' /><br />
            <input type='Submit' value='Banear' />
            <br />
            </form>
             <form action="<?= base_url().'index.php/usu/desbanearUsu'?>" method='post' name='process'>           
            <label for='desbaneado'>Desbanear usuario: </label>
            <input type='text' name='desbaneado' id='desbaneado' size='25' /><br />                          
        
            <input type='Submit' value='Desbanear' />            
        </form>
    </div>
    
     <a href="<?= base_url().'index.php'?>" title="Volver al inicio">Volver al inicio</a>
 </center>
</body>
</html>