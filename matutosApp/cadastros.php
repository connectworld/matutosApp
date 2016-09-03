<?php 
	include './validaAcesso.php';

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Matutos</title>
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
            <?php 
                include_once 'conectaBanco.php';
                $con = abrirConexao();
                mysql_set_charset('UTF8', $con);        
            ?>
	<br><br>
	<div align="center">
	<table border="1" style="width: 90%;">
		<tr><td>
		<div class="container">	
			<!-- Codrops top bar -->
			<?php 
				include 'logo.php';
			?>
			<a href="home.php" style="text-decoration: none;">
				<button class="btn btn-lg btn-primary btn-block" type="submit">MENU PRINCIPAL</button>
			</a>
			<div class="main clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-6">
                                                    <a href="gerenciadoDePaginas.php?pagina=cadastroCardapio" style="text-decoration: none;">
                                                            <img class="img-responsive" src="img/cardapio.png"/>
							</a>
							<a href="gerenciadoDePaginas.php?pagina=cadastroCardapio" style="text-decoration: none;" class="links">CADASTRO DE CARDÁPIO</a>
						</div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=listarCardapio" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/listagem.png"/>
				        	</a>
                                            <a href="gerenciadoDePaginas.php?pagina=listarCardapio" style="text-decoration: none;" class="links"><div align="center">LISTAR CARDAPIO</div></a>
				        </div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=cadastroMesa" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/mesa.jpg"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=cadastroMesa" style="text-decoration: none;"><div align="center">CADASTRO DE MESA</div></a>
				        </div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=listaMesa" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/listaMesa.png"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=listaMesa" style="text-decoration: none;"><div align="center">LISTAR MESA</div></a>
				        </div>      
				    </div>
				    <br><br>
				   <div class="row">
				    	<div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=cadastroPedido" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/pedido.png"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=selecao" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FAZER seleção PEDIDO</a>
				        </div>
                                       <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=selecao
                                                   " style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/pedido.png"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=selecao" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FAZER PEDIDO APP</a>
				        </div>
				        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <a href="gerenciadoDePaginas.php?pagina=consultaPedidos" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/listaPedido.png"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=consultaPedidos" style="text-decoration: none;"><div align="center">CONSULTAR PEDIDOS</div></a>
				        </div>
                                       <div class="col-md-3 col-sm-4 col-xs-6">
                                           <a href="gerenciadoDePaginas.php?pagina=exibePedidosDoDia" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/listaPedido.png"/>
                                                </a>
                                           <a class="links" href="gerenciadoDePaginas.php?pagina=exibePedidosDoDia" style="text-decoration: none;"><div align="center">PEDIDOS EM ABERTO</div></a>
				        </div>
                                       <div class="col-md-3 col-sm-4 col-xs-6">
                                           <a href="gerenciadoDePaginas.php?pagina=atendimentoCozinha" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/listaPedido.png"/>
                                                </a>
                                           <a class="links" href="gerenciadoDePaginas.php?pagina=atendimentoCozinha" style="text-decoration: none;"><div align="center">ATENDIMENTO COZINHA</div></a>
				        </div>
				    </div>
                                    <br><br>
                                    <div class="row">
				    	<div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=cadastraUsuario" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/cadastroUsuario.png"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=cadastraUsuario" style="text-decoration: none;">CADASTRO DE USUÁRIOS</a>
				        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=listarUsuario" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/listaUsuario.png"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=listarUsuario" style="text-decoration: none;"><div align="center">LISTAR USUÁRIO</div></a>
				        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
				        	<a href="gerenciadoDePaginas.php?pagina=lucratividade" style="text-decoration: none;">
                                                    <img class="img-responsive" src="img/lucro.png"/>
				        	</a>
                                            <a class="links" href="gerenciadoDePaginas.php?pagina=lucratividade" style="text-decoration: none;"><div align="center">LUCRATIVIDADE</div></a>
				        </div>
				</div>
			</div>
                            <BR><BR>
			<?php 
                                                mysql_close($con);
			include 'rodape.php';
		?>
		</div><!-- /container -->
		</td></tr>
		</table>
		</div>
		<br><br><br>
		<script>
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}
		</script>
	</body>
</html>
