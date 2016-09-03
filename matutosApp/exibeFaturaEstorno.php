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
        
        case 0:
            $sql = mysql_query("select p.codigo_faturamento,p.data_horaFaturamento,p.data_horaEstorno, p.codigo_pedidoFaturado, d.data_pedido,
                    p.cliente_pedido, p.valor_totalPedido,u.nome, m.nome as mesa
                    from pedidos_faturados p
                    left join pedido d
                    on p.codigo_pedidoFaturado = d.codigo_pedido
                    left join usuarios u
                    on p.usuario_faturador = u.codigo_usuario
                    left join mesa m
                    on d.codigo_refMesa = m.codigo_mesa
                    where p.data_horaFaturamento BETWEEN ('$dataInicial') and ('$dataFinal')
                    and p.flag_estorno = 0
                    and p.codigo_pedidoFaturado = d.codigo_pedido
                    and p.usuario_faturador = u.codigo_usuario;");
        break;
        case 1:
           echo $sql = mysql_query("select p.codigo_faturamento,p.data_horaFaturamento,p.data_horaEstorno, p.codigo_pedidoFaturado, d.data_pedido,
                    p.cliente_pedido, p.valor_totalPedido,u.nome, m.nome as mesa
                    from pedidos_faturados p
                    left join pedido d
                    on p.codigo_pedidoFaturado = d.codigo_pedido
                    left join usuarios u
                    on p.usuario_faturador = u.codigo_usuario
                    left join mesa m
                    on d.codigo_refMesa = m.codigo_mesa
                    where p.data_horaFaturamento BETWEEN ('$dataInicial') and ('$dataFinal')
                    and p.flag_estorno = 1
                    and p.codigo_pedidoFaturado = d.codigo_pedido
                    and p.usuario_faturador = u.codigo_usuario;");
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
                            <h2 align="center">Consulta de Faturas</h2>
                        </div>
                        <table id='tabela' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #0080FF;'>
                <th align="right" style='width: 1%; color : black'> <div align="center"> CODIGO </div></th>
                <th align="right" style='width: 8%; color : black'> <div align="center"> DATA FATURAMENTO </div></th>
		<th align="center" style='width: 5%;color : black'><div align="center"> DATA ESTORNO </div></th>
                <th align="center" style='width: 1%;color : black'><div align="center"> PEDIDO</div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> DATA PEDIDO</div></th>
                <th align="center" style='width: 20%;color : black'><div align="center"> CLIENTE </div></th>
                <th align="center" style='width: 3%;color : black'><div align="center"> VALOR TOTAL </div></th>
                <th align="center" style='width: 15%;color : black'><div align="center"> USUARIO </div></th>
                <th align="center" style='width: 3%;color : black'><div align="center"> VER </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> ESTORNAR</div></th>
                <th align="center" style='width: 3%;color : black'><div align="center"> IMPRIMIR</div></th>
                
            </tr>
	 </thead>
<?php	
		//$cont =  0;
		while ($linha = mysql_fetch_array($sql)) {
                  //  $cod = $linha['CODIGO'];
                    
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_faturamento']?></td>
	 	<td align="center" style="color : black"><?php echo date('d/m/Y H:i:s', strtotime($linha['data_horaFaturamento'])); ?></td>
                <?php 
                    if($linha['data_horaEstorno'] == '0000-00-00 00:00:00'){
                ?>
                <td align="center" style="color : black">Não teve Estorno</td>
                <?php 
                    }
                    else{
                ?>
                <td align="center" style="color : black"><?php echo date('d/m/Y H:i:s', strtotime($linha['data_horaEstorno'])); ?></td>
                <?php
                    }
                ?>
                <td align="center" style="color : black"><?php echo $linha['codigo_pedidoFaturado']?></td>
                <td align="center" style="color : black"><?php echo date('d/m/Y', strtotime($linha['data_pedido'])); ?></td>
                <td align="center" style="color : black"><?php echo $linha['cliente_pedido']?></td>
                <td align="center" style="color : black"><?php echo $linha['valor_totalPedido']?></td>
                <td align="center" style="color : black"><?php echo $linha['nome']?></td>
	 	<td>
                    <div style="padding: 3px;">
                        <a  href="verItemPedidoConsultado.php?codigoPedido=<?php echo $linha['codigo_pedidoFaturado']?>&nomeMesa=<?php echo $linha['mesa'];?>"><button class="btn btn-info" type="submit">VER</button></a>
                    </div>
                </td>
                <?php
                    if ($situacao == 0){
                ?>
                <td>
                    <div style="padding: 3px; ">
                       <a href="pedidoController.php?codigoPedido=<?php echo $linha['codigo_pedidoFaturado']?>&funcao=estornarPedido">
                           <button class="btn btn-info" type="submit">ESTORNAR</button>
                       </a>
                    </div>
                </td>
                
                <?php 
                    }
                    elseif($situacao == 1){
                ?>
                
                <td>
                    <div style="padding: 3px;">
                        <button class="btn btn-info" type="submit">-----------</button>
                    </div>
                </td>
               <?php
                    }
               ?>
                <td>
                    <div style="padding: 3px;">
                        <a target="_blank" href="imprimeComprovante.php?codigoPedido=<?php echo $linha['codigo_pedidoFaturado']?>"><button class="btn btn-info" type="submit">IMPRIMIR</button></a>
                    </div>
                </td>
                <?php } mysql_close($con);?>
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






