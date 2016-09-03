<?php 
	include 'validaAcesso.php';
//session_start();

    if (isset($_SESSION["codigoMesa"])) {
        $codigoMesa = $_SESSION["codigoMesa"];
    }
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

$sql = mysql_query("select * from mesa where codigo_mesa = '$codigoMesa'");
$sql2 = mysql_query("select * from cardapio where exclusao_logica = 1");

?>
  <!-- FORMA PARA ACESSO A DADOS DE FINANCIAS  -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
		<div class="loginmodal-container">
			<h1>Digite O Nome do Cliente</h1><br>
                        <form action="pedidoController.php" method="get">
                            <input type="hidden" value="salvarPedido" name="funcao" id="funcao">
                            <input type="hidden" value="<?php  echo $codigoMesa;?>" name="codigoMesa" id="codigoMesa">
				<label for="Nome">Nome:</label><br>
				<input type="text" name="nomeCliente" placeholder="Nome Cliente">
				<input type="submit" class="login loginmodal-submit" value="Salvar">
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
		while ($linha = mysql_fetch_array($sql)) {
                  //  $cod = $linha['CODIGO'];
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_mesa']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['nome']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['observacao']?></td>
	 	<td>
                    <div style="padding: 3px;">
                        <a  href="pedidoController.php?cod=<?php echo $linha['codigo_mesa']?>&funcao=removeMesa"><button class="btn btn-info" type="submit">Remover</button></a>
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
                <th align="center" style='width: 5%;color : black'><div align="center"> QTD </div></th>
            </tr>
	 </thead>
<?php	
		//$cont =  0;
//$funcao = "addCardapio";
	while ($linha = mysql_fetch_array($sql2)) {
                  //  $cod = $linha['CODIGO'];
?>
         <tr align="center" style="margin-top: 10px;">
	 	<td align="center" style="color : black"><?php echo $linha['codigo_cardapio']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['nome']?></td>
	 	<td align="center" style="color : black"><?php echo $linha['descricao']?></td>
                <td align="center" style="color : black"><?php echo $linha['preco']?></td>
                <td align="center" style="color : black">
                    <form action="pedidoController.php" method="get">
                       <input name="cod" type="hidden" value="<?php echo $linha['codigo_cardapio'];?>"       
                       <input value="addCardapio" type="hidden" name="funcao">&nbsp;
                       <input value="addCardapio" type="hidden" name="funcao">&nbsp;
                       <input  type="number" min="1" max="20" size="2" name="quantidade" id="quantidade" riquired="required">
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
        $arrayQuantidade = $_SESSION['arrayQuantidade'];
        echo "tem array";
    }
    elseif(!isset ($_SESSION["arrayCodigo"]) || $_SESSION["arrayCodigo"] == null ){
        $arrayCodigo = array("Produto Não Selecionado");
        $arrayNome = array("Produto Não Selecionado");
        $arrayDescricao = array("Produto Não Selecionado");
        $arrayPreco = array("Produto Não Selecionado");
         $arrayQuantidade = array("Produto Não Selecionado");
        echo "não tem array";
    }
?>
<table id='tabela3' border='1' style="padding: 10px;">
	<thead>
            <tr align="right" style='background-color: #40FF00;'>
                <th align="right" style='width: 5%; color : black'> <div align="center"> CODIGO </div></th>
		<th align="center" style='width: 10%;color : black'><div align="center"> NOME </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> DESCRIÇÃO </div></th>
                <th align="center" style='width: 10%;color : black'><div align="center"> PREÇO UNI </div></th>
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
                <td align="center" style="color : black"><?php echo $arrayPreco[$i]; $count = $count + ($arrayPreco[$i] * $arrayQuantidade[$i]);?></td>
                <td align="center" style="color : black"><?php echo $arrayQuantidade[$i];?></td>
                <td align="center" style="color : black"><?php echo $arrayQuantidade[$i] * $arrayPreco[$i];?></td>
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
                        <a href="pedidoController.php?codigoCardapio=<?php echo $arrayCodigo[$i];?>&funcao=removeCardapio"><button class="btn btn-info" type="submit">Remover</button></a>
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
     <button class="btn btn-info" type="button" data-toggle="modal" data-target="#login-modal">
           Salvar Pedido
     </button>
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


