<?php 
	include 'validaAcesso.php';
//session_start();

    if (isset($_SESSION["codigoMesa"])) {
        $codigoMesa = $_SESSION["codigoMesa"];
    }
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Fazer pedido</title>
</head>
	<meta charset="UTF-8" />
        
        <meta name="description" content="jquery"/>
        <meta name="keywords" content="jquery" />
	<meta name="robots" content="all, index, follow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Fazer Pedido</title>
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
               <link type="text/css" href="jquery/css/base/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
<!--		<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>-->
<!--		<script type="text/javascript" src="js_file/form.js"></script>-->
        
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js_file/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="js_file/jquery.alphanumeric.js"></script>
	<script type="text/javascript" src="jquery/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script type="text/javascript" src="js_file/form.js"></script>
        
        <body>
            <?php 

include_once 'conectaBanco.php';
$con = abrirConexao();
mysql_set_charset('UTF8', $con);

$sql = mysql_query("select * from mesa where codigo_mesa = '$codigoMesa'");
$sql2 = mysql_query("select * from cardapio where exclusao_logica = 1");

            ?>
<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
                   
<div class="container">	
			<!-- Codrops top bar -->
                      
                        
                        
                       
<!--    <a href="gerenciadoDePaginas.php?pagina=codigoPedido" style="text-decoration: none;">
	<button class="btn btn-lg btn-primary btn-block" type="submit">MENU</button>
    </a>-->

	<br>
	<div>
		<h2 align="center">Digite o código do Cardápio</h2>
                <div align="center"><img src="img/cardapio.png" width="321" height="154" alt="logo" longdesc="#"></div> 
	</div>
	<br>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <form method="get" action="pedidoController.php" enctype="multipart/form-data">
		<div class="form-group">
                    <label for="validate-text">Código do Cardápio:</label>
			<div class="input-group">
                            <input type="number" class="form-control"size="10" name="cod" id="cardapio" placeholder="cardápio" required>
                            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
                        </div>
                    <div class="input-group">
                        <input type="hidden" class="form-control"size="10" name="funcao" value="addCardapio" id="cardapoio" >
                           
                        </div>
		</div>
                <div class="form-group">
                    <label for="validate-text">Quantidade de item:</label>
			<div class="input-group">
                            <input type="number" class="form-control"size="10" name="quantidade" id="quantidade" placeholder="quantidade" required>
                            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
                        </div>
                    <div class="input-group">
                        <input type="hidden" class="form-control"size="10" name="funcao" value="addCardapio1" id="cardapoio" >
                           
                        </div>
		</div>

<!--                <div class="form-group">
                    <label for="validate-text">Preço:</label>
                        <div class="input-group">
                            <input type="text" class="form-control"size="10" name="preco" id="preco" placeholder="Preço" required>
                            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>                                
                        </div>
                </div>-->
                
                <br>
                <a href="pedidoController.php?funcao=addCardapio1"><button type="submit"class="btn btn-info">OK</button></a>
              
            </form>
        </div>
      
    </div>
</div>
   
    <?php 
	include 'rodape.php';
    ?>
</td>
</tr>
</table>
</div>
<!--
<script type="text/javascript">
	
	$(document).ready(function(){
		//$("#dataInicial").mask("");
		//$("#dataFinal").mask("99/99/9999");	
	});
</script> 
-->
<!--<script type="text/javascript">
    $(document).ready(function(){
	$('#preco').numeric();
        $('#preco').maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:"."});		
    });
</script> -->
</body>
</html>
