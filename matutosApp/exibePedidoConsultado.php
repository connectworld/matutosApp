<?php 
	include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>PEDIDOS CONSULTADOS</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>PEDIDOS DE HOJE</title>
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
if (isset($_GET["dataInicial"])) {
    $dataInicial = $_GET["dataInicial"];
    $dataFinal = $_GET["dataFinal"];
    $situacao = $_GET["situacao"];
    include_once 'conectaBanco.php';
    $con = abrirConexao();
    mysql_set_charset('UTF8', $con);
    $sql = "";
    
    switch ($situacao) {
        
        case "todos":
            $sql = mysql_query("select p.codigo_pedido,p.data_pedido,p.cliente, m.nome, p.valor_total, p.sitaucao
                from pedido p
                left join mesa m
                on p.codigo_refMesa = m.codigo_mesa
                where p.data_pedido BETWEEN ('$dataInicial') and ('$dataFinal')
                and p.codigo_refMesa = m.codigo_mesa");
        break;
        case "F" || "C" || "B" || "A":
            $sql = mysql_query("select p.codigo_pedido,p.data_pedido,p.cliente, m.nome, p.valor_total, p.sitaucao
                from pedido p
                left join mesa m
                on p.codigo_refMesa = m.codigo_mesa
                where p.data_pedido BETWEEN ('$dataInicial') and ('$dataFinal')
                and p.codigo_refMesa = m.codigo_mesa and p.sitaucao = '$situacao'");
            break;
    }
    
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
                        <div>
                            <h2 align="center">Consulta de Pedidos <?php  echo "($situacao)"?></h2>
                        </div>
                        <table id='tabela' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #0080FF;'>
                <th align="right" style='width: 1%; color : black'> <div align="center"> CODIGO </div></th>
                <th align="right" style='width: 8%; color : black'> <div align="center"> DATA </div></th>
		<th align="center" style='width: 10%;color : black'><div align="center"> MESA </div></th>
                <th align="center" style='width: 15%;color : black'><div align="center"> CLIENTE</div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> TOTAL</div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> ITENS </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> SITUACAO </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> AÇOES </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> OUTRAS AÇÕES </div></th>
                
            </tr>
	 </thead>
<?php	
		//$cont =  0;
		while ($linha = mysql_fetch_array($sql)) {
                  //  $cod = $linha['CODIGO'];
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_pedido']?></td>
	 	<td align="center" style="color : black"><?php echo date('d/m/Y', strtotime($linha['data_pedido'])); ?></td>
                <td align="center" style="color : black"><?php echo $linha['nome']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['cliente']?></td>
                <td align="center" style="color : black"><?php echo $linha['valor_total']?></td>
                 <td align="center" style="color : black"><?php echo $linha['sitaucao']?></td>
	 	<td>
                    <div style="padding: 3px;">
                        <a href="verItemPedidoConsultado.php?codigoPedido=<?php echo $linha['codigo_pedido']?>&nomeMesa=<?php echo $linha['nome'];?>"><button class="btn btn-info" type="submit">VER</button></a>
                    </div>
                </td>
                <?php
                    if ($linha['sitaucao'] == "F"){
                ?>
                <td>
                    <div style="padding: 3px; ">
                        <a><button class="btn btn-info" type="submit">-----------</button></a>
                    </div>
                </td>
                <td>
                    <div style="padding: 3px; ">
                        <a><button class="btn btn-info" type="submit">-----------</button></a>
                    </div>
                </td>
                <?php 
                    }
                    elseif($linha['sitaucao'] == "A"){
                ?>
                <td>
                    <div style="padding: 3px;">
                        <a href="telaDeFaturamento.php?codigoPedido=<?php echo $linha['codigo_pedido']?>&nomeMesa=<?php echo $linha['nome'];?>"><button class="btn btn-info" type="submit">FATURAR PEDIDO</button></a>
                    </div>
                </td>
                <td>
                    <div style="padding: 3px;">
                        <a href="pedidoController.php?codigoPedido=<?php echo $linha['codigo_pedido']?>&funcao=cancelarPedido"><button class="btn btn-info" type="submit">CANCELAR PEDIDO</button></a>
                    </div>
                </td>
                <?php 
                    }
                    elseif($linha['sitaucao'] == "C"){
                ?>
                <td>
                    <div style="padding: 3px;">
                        <a><button class="btn btn-info" type="submit">-----------</button></a>
                    </div>
                </td>
                <td>
                    <div style="padding: 3px;">
                        <a><button class="btn btn-info" type="submit">-----------</button></a>
                    </div>
                </td>
                <?php }} mysql_close($con);?>
	 </tr>
	
</table>
<br><br>
<div style="padding: 3px;">
    <a href="gerenciadoDePaginas.php?pagina=consultaPedidos"><button class="btn btn-info" type="submit">Voltar</button></a>
</div>
<br><br>
<?php 
	include 'rodape.php';
?>
</div>
</td>
</tr>
</table>
</div>
 <?php
}
else{
    header("Location: cadastros.php");
}
 ?>   
</body>
</html>




