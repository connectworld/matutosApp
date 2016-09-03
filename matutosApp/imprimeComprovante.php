<?php
    if(isset($_GET["codigoPedido"])){
        $codigoPedido = $_GET["codigoPedido"];
        include("mpdf60/mpdf.php");
        include_once 'conectaBanco.php';
        $con = abrirConexao();
        mysql_set_charset('UTF8', $con);
        
        $dadosDoComprovante = array();
        $sql = "select * from pedido where codigo_pedido = $codigoPedido";
        $resultado = mysql_query($sql);
        if ($resultado){
            while ($linha = mysql_fetch_array($resultado)) {
                $dadosDoComprovante[]= $linha['cliente'];
                $dadosDoComprovante[] = $linha['data_pedido'];
                $dadosDoComprovante[] = $linha['valor_total'];
            }
        }
        $html = "
			 <fieldset>
			 
			 <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> 
			 <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
			 <title>EPC - Espaço Paula Calado</title>
			 <meta name='description' content='Responsive Retina-Friendly Menu with different, size-dependent layouts' />
			 <meta name='keywords' content='responsive menu, retina-ready, icon font, media queries, css3, transition, mobile' />
			 <meta name='author' content='Codrops' />
			 <link rel='shortcut icon' href='../favicon.ico'> 
			 <link rel='stylesheet' type='text/css' href='css/default.css' />
			 <link rel='stylesheet' type='text/css' href='css/component.css' />
			 <script src='js/modernizr.custom.js'></script>
			 <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen' />
			 <script src='bootstrap/js/bootstrap.min.js'></script>
			 
			
				
      				<div>
      					<img src='img/logo.png' width='500' height='154' alt='logo'>
                                        
      				</div>
      				<br><br>
      				<div>
      					<table border='1' class='table' style='width: 100%;'>
							<tr>
								<th class='th1'>Estabelecimento</th>
								<th class='th2'>Restaurante Matutos</th>
							</tr>
							<tr>
								<th class='th1'>Endereço</th>
								<th class='th2'>Rua Augusto Severo</th>
							</tr>
							<tr>
								<th class='th1'>Cliente</th>
								<th class='th2'>$dadosDoComprovante[0]</th>
							</tr>
							<tr>
								<th class='th1'>Data do Pedido</th>
								<th class='th2'>$dadosDoComprovante[1]</th>
							</tr>
							<tr>
								<th class='th1'>Valor Total</th>
								<th class='th2'>R$ - $dadosDoComprovante[2]</th>
							</tr>
							
                                                       
						</table>
						</div>
						<br><br>
                                                <hr></hr>
                                                <div>
                                                      <img src='img/logo.png' width='500' height='154' alt='logo' longdesc='http://www.espacopaulacalado.com.br'>
                                        
                                                </div>
                                                <br><br>
						<div>
						<table border='1' class='table' style='width: 100%;'>
							<tr>
								<th class='th1'>Estabelecimento</th>
								<th class='th2'>Restaurante Matutos</th>
							</tr>
							<tr>
								<th class='th1'>Endereço</th>
								<th class='th2'>Rua Augusto Severo</th>
							</tr>
							<tr>
								<th class='th1'>Cliente</th>
								<th class='th2'>$dadosDoComprovante[0]</th>
							</tr>
							<tr>
								<th class='th1'>Data do Pedido</th>
								<th class='th2'>$dadosDoComprovante[1]</th>
							</tr>
							<tr>
								<th class='th1'>Valor Total</th>
								<th class='th2'>R$ - $dadosDoComprovante[2]</th>
							</tr>
							
                                                       
						</table>
						<div>
						</div>	
						
			
			 </fieldset>";

	$mpdf=new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("cssTeste.css");
	$teste = file_get_contents("testes.php");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
    }
?>
