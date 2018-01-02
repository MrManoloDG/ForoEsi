<!DOCTYPE html>
<html>
<head>
	<title>ads</title>
</head>
<body>
<h1>Bienbenido señor <?= $this->session->userdata('username')?></h1>
<a href="<?= base_url().'index.php/hilos'?>" title="Ver Categoria">inicio </a>
</body>
</html>