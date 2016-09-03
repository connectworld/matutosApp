<?php 
	include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Ver itens pedido</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Ver itens Pedido</title>
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

if (isset($_GET["codigoPedido"]) && isset($_GET["nomeMesa"])){
    
    $array = array($_GET["codigoPedido"],$_GET["nomeMesa"]);
    include_once 'conectaBanco.php';
    $con = abrirConexao();
    mysql_set_charset('UTF8', $con);

    $sql = mysql_query("select i.atendimento_cozinha,i.codigo_pedidoCardapio,p.data_pedido,i.codigo_itemCardapio,i.nome_cardapio,i.descricao_cardapio,i.valor_unitario,i.quantidade
                        from item_pedido i
                        left join pedido p
                        on p.codigo_pedido = i.codigo_pedidoCardapio
                        where i.codigo_pedidoCardapio = '$array[0]' and i.flag_situacao = 'A'");
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
                           <h2 align="center">Ver Itens do Pedido</h2>
                       </div>
                        <br>
                        <div>
                            <table border="1" style="width: 30%;">
                                <tr>
                                    <th>
                                        <div align="center" style="padding: 5%; width: 30%;"> PEDIDO</div>  
                                    </th>
                                    <th>
                                        <div align="center" style="padding: 5%;width: 30%"> MESA</div>  
                                    </th>
                                </tr>
                                <tr>       
                                    <th>
                                        <div align="center" style="padding: 5%;width: 30%;"><?php echo $array[0];?></div>  
                                    </th>
                                    <th>
                                        <div align="center" style="padding: 5%;width: 30%;"><?php echo $array[1];?></div>  
                                    </th>
                                </tr>         
                            </table>
                            <br>
                        </div>
                        <div>
                            <table border="1" style="padding: 10px; width: 400px;" align="center">
                                <tr style="padding: 10px;" align="center">
                                    <th align="center" style="background-color: yellow;color:yellow;">AMARELO</th>
                                    <th> ITEM NÃO FEITO</th>
                                </tr>
                                <tr style="padding: 10px">
                                    <th style="background-color: #7FFF00;color:#7FFF00">VERDE</th>
                                    <th> ITEM FEITO</th>
                                </tr>
                            </table>
                        </div>
                        <div align="center">
                            <h3> ITENS DO PEDIDO</h3>
                        </div>
     <table id='tabela' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #0080FF;'>
                <th align="right" style='width: 1%; color : black'> <div align="center"> CODIGO PEDIDO</div></th>
                <th align="right" style='width: 8%; color : black'> <div align="center"> DATA PEDIDO </div></th>
		<th align="center" style='width: 5%;color : black'><div align="center"> CODIGO ITEM </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> NOME ITEM</div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> DESCRICAO ITEM</div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> VALOR UNITARIO </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> QTD </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> SUB TOTAL </div></th>
                <th align="center" style='width: 5%;color : black'><div align="center"> AÇÃO </div></th>
            </tr>
	 </thead>
<?php	
		$cont =  0;
                
		while ($linha = mysql_fetch_array($sql)) {
                  //  $cod = $linha['CODIGO'];
                  if ($linha['atendimento_cozinha'] == 1) {   
?>
         <tr align="center" style="margin-top: 10px; background-color: #7FFF00;" id="linhaMudaCor">
         
 <?php }
       else{
           
 ?>
              <tr align="center" style="margin-top: 10px; background-color:yellow;" id="linhaMudaCor">
                 
  <?php
       }
  ?>
	 	<td align="center" style="color : black"><?php echo $linha['codigo_pedidoCardapio']?></td>
	 	<td align="center" style="color : black"><?php echo date('d/m/Y', strtotime($linha['data_pedido'])); ?></td>
                <td align="center" style="color : black"><?php echo $linha['codigo_itemCardapio']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['nome_cardapio']?></td>
                <td align="center" style="color : black"><?php echo $linha['descricao_cardapio']?></td>
                <td align="center" style="color : black">
                    <?php echo $linha['valor_unitario']; $cont = $cont + ($linha['valor_unitario'] * $linha['quantidade']);?>
                </td>
                 <td align="center" style="color : black"><?php echo $linha['quantidade']?></td>
                 <td align="center" style="color : black"><?php echo $linha['quantidade'] * $linha['valor_unitario'];?></td>
                 <?php
                    if ($linha['atendimento_cozinha']== 1){
                 ?>
                 <td align="center" style="color : black">
                     <a href="pedidoController.php?funcao=atualizaAtendimentoItem&flag_atm=0&codigoItem=<?php echo $linha['codigo_itemCardapio'];?>&codigoPedido=<?php echo $linha['codigo_pedidoCardapio'];?>&nomeMesa=<?php echo $array[1];?>">
                        <input type="button" class="btn btn-info" name="btItemFeito" id="btItemFeito" value="DESFAZER" />
                    </a>
                 </td>
                 <?php
                    }
                    else {
                 ?>
                 <td align="center" style="color : black">
                     <a href="pedidoController.php?funcao=atualizaAtendimentoItem&flag_atm=1&codigoItem=<?php echo $linha['codigo_itemCardapio'];?>&codigoPedido=<?php echo $linha['codigo_pedidoCardapio'];?>&nomeMesa=<?php echo $array[1];?>">
                        <input type="button" class="btn btn-info" name="btItemFeito" id="btItemFeito" value="FAZER" />
                    </a>
                 </td>
                <?php }} mysql_close($con);?>
	 </tr>
	
</table>
<br><br>
<div>
    <table border="1">
        <tr>
            <th>
                <div align="center" style="padding: 10%;"> VALOR PARCIAL</div>  
            </th>
        </tr>
        <tr>       
            <th>
                <div align="center" style="padding: 10%;"> R$  <?php echo $cont;?></div>  
            </th>
        </tr>         
    </table>
    <br>
</div>

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





