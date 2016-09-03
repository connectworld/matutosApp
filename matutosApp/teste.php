<?php 
	include("mpdf60/mpdf.php");
	include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		
		$codigo = $_GET['cod'];
                $realizacao = "";
		$disciplina = "";
		$professor = "";
		$data = "";
		$aluno = "";
		$local = "";
		$dissertacao = "";
		$dificuldades = "";
		$foto = "";
                $foto2 = "";
		$recebeFoto = "";
                $nivelAjuda = "";
                $grauAjuda = "";
                $repetajuda = "";
                
		//$sql2 = mysql_query("select FOTO1 from esc_agenda_diaria where codigo = 5 ");
		
		$sql = mysql_query("select d.FOTO1,d.FOTO2,d.FLAG_REALIZOU,d.NIVEL_AJUDA,d.GRAU_AJUDA,d.NRO_REPET_AJUDA,d.CODIGO,d.DATA,d.LOCAL,d.DISSERTACAO,d.DIFICULDADES, p.DESCRICAO AS 'DISCIPLINA', 
							f.NOME as 'ALUNO', s.NOME as 'PROFESSOR' 
							from esc_agenda_diaria d 
							left join esc_cad_disciplina p on d.COD_DISCIPLINA = p.CODIGO 
							left join esc_cad_aluno_capa f on d.COD_ALUNO = f.CODIGO 
							left join cad_funcionario s on d.COD_PROFESSOR = s.CODIGO
							where d.CODIGO = '$codigo'");
		
		while ($linha = mysql_fetch_object($sql)){
			$foto = base64_encode($linha->FOTO1);
                        $recebeFoto = base64_encode($linha ->FOTO1);
                        $foto2 = base64_encode($linha->FOTO2);
                        $realizacao = $linha->FLAG_REALIZOU;
                        $nivelAjuda = $linha->NIVEL_AJUDA;
                        $grauAjuda = $linha->GRAU_AJUDA;
                        $repetajuda = $linha->NRO_REPET_AJUDA;
			$data = date('d/m/Y', strtotime($linha->DATA));
			$local = $linha->LOCAL;
			$dissertacao = $linha->DISSERTACAO;
			$dificuldades = $linha->DIFICULDADES;
			$disciplina = $linha->DISCIPLINA;
			$aluno = $linha->ALUNO;
			$professor = $linha->PROFESSOR;
			
//			$data = $linha->DATA;
//			$local = $linha->LOCAL;
//			$dissertacao = $linha->DISSERTACAO;
//			$dificuldades = $linha->DIFICULDADES;
//			$disciplina = $linha->DISCIPLINA;
//			$aluno = $linha->ALUNO;
//			$professor = $linha->PROFESSOR;
			break;
		}
		//date('d/m/Y', strtotime($data));
		
                switch ($realizacao) {
                 case 0:
                    $realizacao = "NÃO CONSEGUIU REALIZAR";
                     break;
                 case 1:
                    $realizacao = "REALIZOU COM AJUDA TOTAL";
                     break;
                 case 2:
                     $realizacao = "REALIZOU COM AJUDA PARCIAL";
                     break;
                  case 3:
                     $realizacao = "REALIZOU INDEPENDENTE";
                      break;
            }
                
		
		if ($foto == null && $foto2 == null) {
                   echo"1";

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
      					<img src='images/LOGO_EPC.jpg' width='321' height='154' alt='logo' longdesc='http://www.espacopaulacalado.com.br'>
                                        numero1
      				</div>
      				
      				<div>
      					<table border='1' class='table'>
							<tr>
								<th class='th1'>Documento</th>
								<th class='th2'>Agenda Di&aacute;ria</th>
							</tr>
							<tr>
								<th class='th1'>Data</th>
								<th class='th2'>$data</th>
							</tr>
							<tr>
								<th class='th1'>Local</th>
								<th class='th2'>$local</th>
							</tr>
							<tr>
								<th class='th1'>Tem&aacute;tica</th>
								<th class='th2'>$disciplina</th>
							</tr>
							<tr>
								<th class='th1'>Aluno</th>
								<th class='th2'>$aluno</th>
							</tr>
							<tr>
								<th class='th1'>Professor</th>
								<th class='th2'>$professor</th>
							</tr>
                                                        <tr>
								<th class='th1'>Realização</th>
								<th class='th2'>$realizacao - GRAU AJUDA: $grauAjuda - NIVEL AJUDA: $nivelAjuda - Nº REPETIÇOES : $repetajuda</th>
							</tr>
						</table>
						</div>
						<br><br>
						<div>
						<table class='table' border='1'>
							<tr>
								<th>Aspectos Positivos</th>
								<th>Dificuldades</th>
							</tr>
							<tr>
								<td><textarea rows='10' cols='40' class='textoArea'>$dissertacao</textarea></td>
								<td><textarea rows='10' cols='40' class='textoArea'>$dificuldades</textarea></td>
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

	exit;
	} elseif ($foto =! null && $foto2 != null) {
            echo "2";
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
      					<img src='images/LOGO_EPC.jpg' width='321' height='154' alt='logo' longdesc='http://www.espacopaulacalado.com.br'>
                                        numero 2
      				</div>
      				
      				<div>
      					<table border='1' class='table'>
							<tr>
								<th class='th1'>Documento</th>
								<th class='th2'>Agenda Di&aacute;ria</th>
							</tr>
							<tr>
								<th class='th1'>Data</th>
								<th class='th2'>$data</th>
							</tr>
							<tr>
								<th class='th1'>Local</th>
								<th class='th2'>$local</th>
							</tr>
							<tr>
								<th class='th1'>Tem&aacute;tica</th>
								<th class='th2'>$disciplina</th>
							</tr>
							<tr>
								<th class='th1'>Aluno</th>
								<th class='th2'>$aluno</th>
							</tr>
							<tr>
								<th class='th1'>Professor</th>
								<th class='th2'>$professor</th>
							</tr>
                                                         <tr>
								<th class='th1'>Realização</th>
								<th class='th2'>$realizacao - GRAU AJUDA: $grauAjuda - NIVEL AJUDA: $nivelAjuda - Nº REPETIÇOES : $repetajuda</th>
							</tr>
						</table>
						</div>
						<br>
						<div>
						<table class='table' border='1'>
							<tr>
								<th>Aspectos Positivos</th>
								<th>Dificuldades</th>
							</tr>
							<tr>
								<td><textarea rows='10' cols='40' class='textoArea'>$dissertacao</textarea></td>
								<td><textarea rows='10' cols='40' class='textoArea'>$dificuldades</textarea></td>
							</tr>
						</table>
						<div>
						<br>
						<table class='table' border='1'>
							<tr>
								<th>Foto1</th>
								<th>Foto2</th>
							</tr>
						</div>
			 				
							<tr>
								<td height='50px'><img style='width:40%; heigth: 5%;;' src='data:image/jpeg;base64,$recebeFoto'/></td></td>
								<td height='50px'><img style='width:40%; heigth: 5%;' src='data:image/jpeg;base64,$foto2'/></td>
							</tr>
							
						</table>
						</div>	
						
			
			 </fieldset>";

	$mpdf=new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("cssTeste.css");
	$teste = file_get_contents("testes.php");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}elseif ($foto == null && $foto2 != null) {
        echo "3";
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
      					<img src='images/LOGO_EPC.jpg' width='321' height='154' alt='logo' longdesc='http://www.espacopaulacalado.com.br'>
                                        numero 3
      				</div>
      				
      				<div>
      					<table border='1' class='table'>
							<tr>
								<th class='th1'>Documento</th>
								<th class='th2'>Agenda Di&aacute;ria</th>
							</tr>
							<tr>
								<th class='th1'>Data</th>
								<th class='th2'>$data</th>
							</tr>
							<tr>
								<th class='th1'>Local</th>
								<th class='th2'>$local</th>
							</tr>
							<tr>
								<th class='th1'>Tem&aacute;tica</th>
								<th class='th2'>$disciplina</th>
							</tr>
							<tr>
								<th class='th1'>Aluno</th>
								<th class='th2'>$aluno</th>
							</tr>
							<tr>
								<th class='th1'>Professor</th>
								<th class='th2'>$professor</th>
							</tr>
                                                         <tr>
								<th class='th1'>Realização</th>
								<th class='th2'>$realizacao - GRAU AJUDA: $grauAjuda - NIVEL AJUDA: $nivelAjuda - Nº REPETIÇOES : $repetajuda</th>
							</tr>
						</table>
						</div>
						<br>
						<div>
						<table class='table' border='1'>
							<tr>
								<th>Aspectos Positivos</th>
								<th>Dificuldades</th>
							</tr>
							<tr>
								<td><textarea rows='10' cols='40' class='textoArea'>$dissertacao</textarea></td>
								<td><textarea rows='10' cols='40' class='textoArea'>$dificuldades</textarea></td>
							</tr>
						</table>
						<div>
						<br>
                                                <h3>OBS: SÓ TEVE UMA FOTO</h3>
						<table class='table' border='1'>
							<tr>
								<th>Foto</th>
							</tr>
						</div>
			 				
							<tr>
								<td height='50px'><img style='width:45%; heigth: 5%;' src='data:image/jpeg;base64,$foto2'/></td>
							</tr>
							
						</table>
						</div>	
						
			
			 </fieldset>";

	$mpdf=new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("cssTeste.css");
	$teste = file_get_contents("testes.php");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}elseif ($foto != null && $foto2 == null) {
        echo "4";
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
      					<img src='images/LOGO_EPC.jpg' width='321' height='154' alt='logo' longdesc='http://www.espacopaulacalado.com.br'>
                                        numero 3
      				</div>
      				
      				<div>
      					<table border='1' class='table'>
							<tr>
								<th class='th1'>Documento</th>
								<th class='th2'>Agenda Di&aacute;ria</th>
							</tr>
							<tr>
								<th class='th1'>Data</th>
								<th class='th2'>$data</th>
							</tr>
							<tr>
								<th class='th1'>Local</th>
								<th class='th2'>$local</th>
							</tr>
							<tr>
								<th class='th1'>Tem&aacute;tica</th>
								<th class='th2'>$disciplina</th>
							</tr>
							<tr>
								<th class='th1'>Aluno</th>
								<th class='th2'>$aluno</th>
							</tr>
							<tr>
								<th class='th1'>Professor</th>
								<th class='th2'>$professor</th>
							</tr>
                                                         <tr>
								<th class='th1'>Realização</th>
								<th class='th2'>$realizacao - GRAU AJUDA: $grauAjuda - NIVEL AJUDA: $nivelAjuda - Nº REPETIÇOES : $repetajuda</th>
							</tr>
						</table>
						</div>
						<br>
						<div>
						<table class='table' border='1'>
							<tr>
								<th>Aspectos Positivos</th>
								<th>Dificuldades</th>
							</tr>
							<tr>
								<td><textarea rows='10' cols='40' class='textoArea'>$dissertacao</textarea></td>
								<td><textarea rows='10' cols='40' class='textoArea'>$dificuldades</textarea></td>
							</tr>
						</table>
						<div>
						<br>
                                                <h3>OBS: SÓ TEVE UMA FOTO</h3>
						<table class='table' border='1'>
							<tr>
								<th>Foto</th>
							</tr>
						</div>
			 				
							<tr>
								<td ><img style='width:45%; heigth: 5%;' src='data:image/jpeg;base64,$recebeFoto'/></td>
							</tr>
							
						</table>
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