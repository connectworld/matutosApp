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
                <script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
                <script type="text/javascript" src="js_file/jquery.maskMoney.js"></script>
                <script type="text/javascript" src="js_file/jquery.alphanumeric.js"></script>
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

    $sql = mysql_query("select i.codigo_pedidoCardapio,p.data_pedido,i.codigo_itemCardapio,i.nome_cardapio,i.descricao_cardapio,i.valor_unitario,i.quantidade,p.valor_total
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
                            <h2 align="center">Faturamento de Pedido</h2>
                        </div>
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
            </tr>
	 </thead>
<?php	
		$cont =  0;
                $valorTotal = 0;
		while ($linha = mysql_fetch_array($sql)) {
                  //  $cod = $linha['CODIGO'];
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_pedidoCardapio']?></td>
	 	<td align="center" style="color : black"><?php echo date('d/m/Y', strtotime($linha['data_pedido'])); ?></td>
                <td align="center" style="color : black"><?php echo $linha['codigo_itemCardapio']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['nome_cardapio']?></td>
                <td align="center" style="color : black"><?php echo $linha['descricao_cardapio']?></td>
                <td align="center" style="color : black">
                    <?php echo $linha['valor_unitario']; $cont = $cont + ($linha['valor_unitario'] * $linha['quantidade']);?>
                </td>
                 <td align="center" style="color : black"><?php echo $linha['quantidade']?></td>
                 <td align="center" style="color : black"><?php echo $linha['quantidade'] * $linha['valor_unitario'];$valorTotal = $linha['valor_total'];?></td>
                  <?php } mysql_close($con);?>
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
                <div align="center" style="padding: 10%;"> R$  <?php echo $valorTotal;?></div>  
            </th>
        </tr>         
    </table>
    <br>
</div>
<div style="padding: 5%;" align="center">
    <a target="_blank">
        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#login-modal">
            FATURAR PEDIDO
        </button>
    </a>
 </div>



<?php 
	include 'rodape.php';
?>
</div>
</td>
</tr>
</table>
</div>
     
    <!-- FORMA PARA ACESSO A DADOS DE FINANCIAS  -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container" style="width: 100%; color: black; font-family: 20pt;">
                    <table border="1">
                        <tr>
                            <th>
                                <div align="center" style="padding: 10%;"> VALOR TOTAL</div>  
                            </th>
                        </tr>
                        <tr>       
                            <th>
                                <div align="center" style="padding: 10%;"> R$  <?php echo $valorTotal;?></div>  
                            </th>
                        </tr>         
                    </table>
            
			<h1>VALORES</h1><br>             
                        <form action="pedidoController.php" method="post" id="formulario">
                               <input type="hidden" value="faturarPedido" name="funcao" id="funcao"/>
                               <input type="hidden" value="<?php echo $array[0];?>" name="codigoPedido" id="codigoPedido"/>
                                VALOR TOTAL: <input type="text" name="valor_total" riquered="required" value="<?php echo $valorTotal;?>" id="valor_unitario" />
                                VALOR RECEBIDO <input type="text" name="valor_recebido" required="required" id="qnt"/>
                                TROCO: <input type="text" name="total" id="total" required="required" readonly="readonly" />
                                <a href="cadastros.php" target="_blank" onClick="document.getElementById('formulario').submit();">ENVIAR</a>
                           </form>
                        
		</div>
	</div>
</div>
<!-- ############################################################### -->
<script type="text/javascript">
function id(el) {
  return document.getElementById( el );
}
function total( un, qnt ) {
  return parseFloat(qnt.replace(',', '.'), 10) - parseFloat(un.replace(',', '.'), 10);
}
window.onload = function() {
  id('valor_unitario').addEventListener('keyup', function() {
    var result = total( this.value , id('qnt').value );
    id('total').value = String(result.toFixed(2)).formatMoney();
  });

  id('qnt').addEventListener('keyup', function(){
    var result = total( id('valor_unitario').value , this.value );
    id('total').value = String(result.toFixed(2)).formatMoney();
  });
}

String.prototype.formatMoney = function() {
  var v = this;

  if(v.indexOf('.') === -1) {
    v = v.replace(/([\d]+)/, "$1,00");
  }

  v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
  v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
  v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

  return v;
};
</script>
<script type="text/javascript">
    $(document).ready(function(){
	$('#qnt').numeric();
        $('#qnt').maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});		
    });
</script> 
</body>
</html>





