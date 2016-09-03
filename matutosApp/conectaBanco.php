<?php
function abrirConexao() {
	
	$con = @mysql_connect("u590025855_matut", "u590025855_root","jb141186");
	
	if (! $con) {
		die ("Erro ao abrir a conexao com o MySQL: " . mysql_error ());
	}
	
	mysql_select_db ("matutos", $con);
	
	return $con;
}
?>
