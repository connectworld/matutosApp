<!--<div class="codrops-top clearfix">
	<a class="codrops-icon codrops-icon-prev" href="home.php"><span>EPC</span></a>
    <span class="right"><a class="codrops-icon codrops-icon-drop" href="http://www.newbird.com.br"><span>New Bird Tecnologia</span></a></span>	
</div>
--><br><br>
<div style="width: 100%; background-color:blue;">&nbsp;</div>
<div class="container" style="padding-right: 2%;" align="center">
	<div align="right">
	<table class="table" style="width:25%;">
	<tr>
		<th>Usu&aacute;rio</th>
		<th>Sair</th>
	</tr>
	<tr>
		<td><?php echo $nome;?></td>
		<td>
                    <a href="usuarioController.php?funcao=<?php echo "sair";?>">
				<button type="button" class="btn btn-labeled btn-danger">
	             	<span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>Sair
	           	</button>
	        </a>
		</td>
	</tr>
</table>	
</div>
    <div align="left">
        <?php
            $dataIni = date("Y-m-d 00:00:00");
            $dataFin = date("Y-m-d 23:59:59");
            $instrucao = "select SUM(p.valor_totalPedido) as lucro from pedidos_faturados p where p.data_horaFaturamento BETWEEN ('$dataIni')
                          and ('$dataFin');";
            $resultado = mysql_query($instrucao);
            $lucro = 0;
            while ($row = mysql_fetch_array($resultado)) {
                $lucro = $lucro + $row['lucro'];
            }
            
        ?>
	<table class="table" style="width:25%;">
            <tr style="font-family: arial; font-size: 17pt">
		<th>Lucro do Dia</th>
		<th><?php echo "R$ ". $lucro?></th>
        </tr>
</table>	
</div>
</div>
<header>
    <div><img src="img/logo.png" width="321" height="154" alt="logo" longdesc="#"></div> 
	<h1>Matutos Sistema WEb<span>Comida Regionais e Lanches</span></h1>	
</header>