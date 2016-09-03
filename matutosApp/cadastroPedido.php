<?php 
	include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Pedido</title>
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
                <script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
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

$sql = mysql_query("select * from mesa where exclusao_logica = 1");
//$sql2 = mysql_query("select * from cardapio");

?>
<div align="center">
    <table border="1" style="width: 90%;">
	<tr>
            <td>
		<div class="container">
                    <?php 
			include 'logo.php';
                    ?>
                    <a href="gerenciadoDePaginas.php?pagina=cadastros">
			<button class="btn btn-lg btn-primary btn-block" type="submit">MENU</button>
                    </a>
                    <br><br>
                    <div>
                        <h2 align="center">Tela inicial de Pedido</h2>
                    </div>
                    <br><br>
                    <div align="center">
                        <h3> Selecione a Mesa do Pedido </h3>                 
                    </div>
                    <table id='tabela' border='1' style="padding: 10px;">
                        <thead>
                            <tr align="right" style='background-color: #848484;'>
                                <th align="right" style='width: 5%; color : black'>
                                    <div align="center"> CODIGO </div>
                                </th>
                                <th align="center" style='width: 10%;color : black'>
                                    <div align="center"> NOME </div>
                                </th>
                                <th align="center" style='width: 10%;color : black'>
                                    <div align="center"> OBSERVAÇÃO </div>
                                </th>
                                <th align="center" style='width: 5%;color : black'>
                                    <div align="center"> EDITAR </div>
                                </th>
                            </tr>   
                        </thead>
                    <?php	
                        while ($linha = mysql_fetch_array($sql)) {                  
                    ?>
                      <tr align="center" style="margin-top: 10px;">
                        <td align="center" style="color : black">
                            <?php echo $linha['codigo_mesa']?>
                        </td>
                        <td align="center" style="color : black">
                            <?php echo $linha['nome']?>
                        </td>
                        <td align="center" style="color : black">
                            <?php echo $linha['observacao']?>
                        </td>
                        <td>
                            <div style="padding: 3px;">
                                <a href="pedidoController.php?cod=<?php echo $linha['codigo_mesa']?>&funcao=addPedido">
                                    <button class="btn btn-info">Add</button>
                                </a>
                            </div>
                        </td>
                  <?php 
                        } mysql_close($con);
                  ?>
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
