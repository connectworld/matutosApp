<?php 
	include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Listar Usuários</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Restaurante Matuto's</title>
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js_file/teste.js"></script>
</head>
<body>
<?php 

include_once 'conectaBanco.php';
$con = abrirConexao();
mysql_set_charset('UTF8', $con);

$sql = mysql_query("select * from usuarios where exclusao_logica = 1");

?>
<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
                        <a href="gerenciadoDePaginas.php?pagina=cadastros">
				<button class="btn btn-lg btn-primary btn-block" type="submit">MENU</button>
			</a><br><br>
                        <table id='tabela' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #0080FF;'>
                <th align="right" style='width: 5%; color : black'> <div align="center"> CODIGO </div></th>
		<th align="center" style='width: 10%;color : black'><div align="center"> NOME </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> LOGIN </div></th>
		<th align="center" style='width: 5%;color : black'><div align="center"> EDITAR </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> EXCLUIR </div></th>
            </tr>
	 </thead>
<?php	
		//$cont =  0;
		while ($linha = mysql_fetch_array($sql)) {
                  //  $cod = $linha['CODIGO'];
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_usuario']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['nome']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['login']?></td>
	 	<td>
                    <div style="padding: 3px;">
                        <a target="_blanck" href="controllerMesa.php?cod=<?php echo $linha['codigo_usuario']?>&funcao=editar"><button class="btn btn-info" type="submit">Editar</button></a>
                    </div>
                </td>
                <td>
                    <div style="padding: 3px;">
                        <a target="_blanck" href="controllerMesa.php?cod=<?php echo $linha['codigo_usuario']?>&funcao=deletar"><button class="btn btn-info" type="submit">Excluir</button></a>
                    </div>
                </td>
                  <?php } mysql_close($con);?>
	 </tr>
	
</table>
<br><br>
<?php 
	include 'rodape.php';
?>
</div>
</td>
</tr>
</table>
</div>
    
</body>
</html>

