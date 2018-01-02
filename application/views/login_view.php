<!DOCTYPE >
<html>

<head>    
    <title>Jotorres Login Screen | Welcome </title>
</head>
<body>
    <div id='login_form'>
        <form action="<?= base_url().'index.php/usu/validar'?>" method='post' name='process'>
            <h2>User Login</h2>
            <br />            
            <label for='username'>Username</label>
            <input type='text' name='username' id='username' size='25' /><br />
        
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='25' /><br />                            
        
            <input type='Submit' value='Login' />            
        </form>
    </div>
</body>
</html>