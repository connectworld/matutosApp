<?php 
	include 'validaAcesso.php';
//session_start();

    if (isset($_GET['codigoPedido'])) {
        $codigoPedido = $_GET['codigoPedido'];
        $_SESSION["codigoDoPedido"] = $codigoPedido;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Ediar Pedido</title>
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
                <script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
                <script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
                <script type="text/javascript" src="js_file/jquery.maskMoney.js"></script>
                <script type="text/javascript" src="js_file/jquery.alphanumeric.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<script src="bootstrap/js/bootstrap.min.js"></script>
                <!--
                <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
                <script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>-->

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
$array = array();
$query = mysql_query("select cliente,codigo_pedido from pedido where codigo_pedido = $codigoPedido");
while ($linha = mysql_fetch_array($query)) {
    $array[] = $linha['cliente'];
    $array[] = $linha['codigo_pedido'];
}
$sql = "select * from mesa where codigo_mesa = (select codigo_refMesa from pedido where codigo_pedido = $codigoPedido)";
$resultado = mysql_query($sql);
$sql2 = mysql_query("select * from cardapio where exclusao_logica = 1");

?>
    <!-- FORMA PARA ACESSO A DADOS DE FINANCIAS  -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
		<div class="loginmodal-container">
			<h1>Digite o Nome do Cliente Ou o Codigo da Mesa</h1><br>
                        <form action="pedidoController.php" method="get">
                            <input type="hidden" value="troca" name="funcao" id="funcao">
                            <input type="hidden" value="<?php  echo $codigoMesa;?>" name="codigoMesa" id="codigoMesa">
                            <input type="hidden" value="<?php  echo $codigoPedido;?>" name="codigoPedido" id="codigoPedido">
				<label for="Nome">Nome OU Código</label><br>
				<input type="text" name="nomeCodigo" placeholder="Nome OU Código" riquired="riquired">
				<input type="submit" class="login loginmodal-submit" value="Trocar">
                                <div class="radio">
                                    <label><input type="radio" value="0" name="troca">Trocar Cliente</label>
                                   </div>
                                <div class="radio">
                                    <label><input type="radio" value="1" name="troca">Trocar Mesa</label>
                                </div>                       
			</form>	
		</div>
	</div>
</div>
<!-- ############################################################### -->
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
                            <h2 align="center">Tela para Editar Pedido</h2>
                        </div>
                        <br />
                        <div>
                            <table border="1" style="width: 50%;">
                                <tr>
                                    <th>
                                        <div align="center" style="padding: 5%; width: 30%;"> PEDIDO</div>  
                                    </th>
                                    <th>
                                        <div align="center" style="padding: 5%;width: 30%"> CLIENTE</div>  
                                    </th>
                                    <th>
                                        <div align="center" style="padding: 5%;width: 30%"> TROCAR CLIENTE</div>  
                                    </th>
                                </tr>
                                <tr>       
                                    <th>
                                        <div align="center" style="padding: 5%;"><?php echo $array[1];?></div>  
                                    </th>
                                    <th>
                                        <div style="padding: 5%;"><?php echo $array[0];?></div>  
                                    </th>
                                    <th>
                                        <div style="padding: 5%;">
                                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#login-modal">
                                                TROCAR
                                            </button>
                                        </div>  
                                    </th>
                                </tr>         
                            </table>
                            <br>
                        </div>
                        <div align="center">
                            <h3> Mesa Seleionada</h3>
                        </div>
      <table id='tabela' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #848484;'>
                <th align="right" style='width: 5%; color : black'> <div align="center"> CODIGO </div></th>
		<th align="center" style='width: 10%;color : black'><div align="center"> NOME </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> OBSERVAÇÃO </div></th>
		<th align="center" style='width: 5%;color : black'><div align="center"> REMOVER</div></th>
            </tr>
	 </thead>
<?php	
		//$cont =  0;
		while ($linha = mysql_fetch_array($resultado)) {
                  //  $cod = $linha['CODIGO'];
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_mesa']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['nome']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['observacao']?></td>
	 	<td>
                    <div align="center" style="padding: 1%;">
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#login-modal">
                            TROCAR
                        </button>
                    </div>
                </td>
                  <?php } ?>
	 </tr>
	
</table>                      
<br><br>
<div align="center">
    <h3> Selecione o Produto do Cardapio</h3>
</div>
<table id='tabela2' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #0080FF;'>
                <th align="right" style='width: 5%; color : black'> <div align="center"> CODIGO </div></th>
		<th align="center" style='width: 10%;color : black'><div align="center"> NOME </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> DESCRIÇÃO </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> PREÇO </div></th>
		<th align="center" style='width: 5%;color : black'><div align="center"> ADICIONAR</div></th>
            </tr>
	 </thead>
<?php	
		//$cont =  0;

$codigoPedido = $array[1];
echo $codigoPedido;
	while ($linha = mysql_fetch_array($sql2)) {
                  //  $cod = $linha['CODIGO'];
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_cardapio'];?></td>
	 	<td align="center" style="color : black"><?php echo $linha['nome'];?></td>
	 	<td align="center" style="color : black"><?php echo $linha['descricao'];?></td>
                <td align="center" style="color : black"><?php echo $linha['preco'];?></td>
	 	<td>
                    <form action="pedidoController.php" method="get">
                       <input name="codigoCardapio" type="hidden" value="<?php echo $linha['codigo_cardapio'];?>"
                       <input value="alteraCardapioPedidoAdd" type="hidden" name="funcao">&nbsp;
                       <input value="alteraCardapioPedidoAdd" type="hidden" name="funcao">
                       <input  type="number" min="1" riquired="required" max="20" size="4" name="quantidade" id="quantidade">
                       <button class="btn btn-info" type="submit">Add</button> 
                   </form>
                </td>
                  <?php } mysql_close($con);?>
	 </tr>
	
</table> 
<div align="center">
    <h3> Produtos Selecionados</h3>
</div>
<?php 
    
//session_start();
    if (isset($_SESSION["arrayCodigo"]) && $_SESSION["arrayCodigo"] != null) {
        $arrayCodigo = $_SESSION["arrayCodigo"];
        $arrayNome = $_SESSION["arrayNome"];
        $arrayDescricao = $_SESSION["arrayDescricao"];
        $arrayPreco = $_SESSION["arrayPreco"];
        $arraQuantidade = $_SESSION["arrayQuantidade"];
        echo "tem array";
    }
    elseif(!isset ($_SESSION["arrayCodigo"]) || $_SESSION["arrayCodigo"] == null ){
        $arrayCodigo = array("Produto Não Selecionado");
        $arrayNome = array("Produto Não Selecionado");
        $arrayDescricao = array("Produto Não Selecionado");
        $arrayPreco = array("Produto Não Selecionado");
        $arraQuantidade = array("Produto Não Selecionado");
        //echo "não tem array";
    }
?>
<table id='tabela3' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #40FF00;'>
                <th align="right" style='width: 5%; color : black'> <div align="center"> CODIGO </div></th>
		<th align="center" style='width: 10%;color : black'><div align="center"> NOME </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> DESCRIÇÃO </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> PREÇO UNITÁRIO </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> QUANTIDADE </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> SUB TOTAL </div></th>
		<th align="center" style='width: 5%;color : black'><div align="center"> REMOVER</div></th>
            </tr>
	 </thead>
<?php	
    //foreach ($arrayCodigo as $i => $value) {
    $count = 0;
    echo $quantidado = count($arrayCodigo);
    for($i = 0; $i < $quantidado ; $i++) {
    
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $arrayCodigo[$i];?></td>
	 	<td align="center" style="color : black"><?php echo $arrayNome[$i];?></td>
	 	<td align="center" style="color : black"><?php echo $arrayDescricao[$i];?></td>
                <td align="center" style="color : black"><?php echo $arrayPreco[$i];?></td>
                <td align="center" style="color : black">
                    <?php echo $arraQuantidade[$i]; $count = $count + ($arraQuantidade[$i] * $arrayPreco[$i]);?>
                </td>
                 <td align="center" style="color : black"><?php echo $arraQuantidade[$i] * $arrayPreco[$i];?></td>
        <?php
           if ($arrayCodigo[$i] == "Produto Não Selecionado") {
        ?>
	 	<td>
                    <div style="padding: 3px;">
                        <a><button class="btn btn-info" type="submit">Produto Não Selecionado</button></a>
                    </div>
                </td>
        <?php
           }
           else {
        ?>
                <td>
                    <div style="padding: 3px;">
                        <a href="pedidoController.php?codigoCardapio=<?php echo $arrayCodigo[$i];?>&funcao=editaPedidoRemoveItem"><button class="btn btn-info" type="submit">Remover</button></a>
                    </div>
                </td> 
         
    <?php
           }
     }
    ?>
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
                <div align="center" style="padding: 10%;"> R$  <?php echo $count;?></div>  
            </th>
        </tr>         
    </table>
</div>
<div align="center">
    <a href="pedidoController.php?funcao=atualizarPedido"><button class="btn btn-info" type="submit">Atualizar Pedido</button></a>
</div>
<br>
<br>
<?php 
	include 'rodape.php';
?>
</div>
</td>
</tr>
</table>
</div>
   <script type="text/javascript">
    $(document).ready(function(){
        $('#quantidade').numeric();		
    });
</script>  
</body>
</html>


