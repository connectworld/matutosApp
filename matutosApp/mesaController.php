<?php

if (isset($_POST["funcao"]) || isset($_GET["funcao"])) {
    	$funcao = "";
        if (isset($_POST["funcao"]) {
            $funcao = $_POST["funcao"];
        }
        if (isset($_GET["funcao"])) {
            $funcao = $_GET["funcao"];
        }

	if ($funcao == "salvarMesa") {
		$dados = array();
		$dados[0] = $_POST["nome"];
		$dados[1] = $_POST["observacao"];

		include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		$sql = "insert into mesa (nome,observacao,exclusao_logica) values ('$dados[0]','$dados[1]',1) ";
		$resultado = mysql_query($sql);

		if ($resultado) {
			mysql_close($con);
			echo "<script>window.location='listaMesa.php';alert('MESA CADASTRADA COM SUCESSO');</script>";
		} else {
			mysql_close($con);
			echo "<script>window.location='cadastroMesa.php';alert('MESA NÃO FOI CADASTRADA TENTE NOVAMENTE');</script>";

		}
	} elseif ($funcao == "editarMesa") {
		$dados = array();
		$dados[0] = $_POST["nome"];
		$dados[1] = $_POST["observacao"];
		$dados[2] = $_POST["codigoMesa"];
		include_once 'conectaBanco.php';
		$con = abrirConexao();
		mysql_set_charset('UTF8', $con);
		$update = "update mesa set nome = '$dados[0]', observacao = '$dados[1]' where codigo_mesa = $dados[2]";
		$resultado = mysql_query($update);
		if ($resultado) {
			mysql_close($con);
			echo "<script>window.location='listaMesa.php';alert('MESA ATUALIZADO COM SUECESSO');</script>";
		} else {
			mysql_close($con);
			echo "<script>window.location='cadastroMesa.php';alert('MESA NAO FOI ATUALIZADA TENTE NOVAMENTE');</script>";
		}
	}elseif ($funcao == "deletarMesa") {
        $dados = array();
        $dados[0] = $_GET["codigoMesa"];
        include_once 'conectaBanco.php';
        $con = abrirConexao();
        mysql_set_charset('UTF8', $con);
        $update = "update mesa set exclusao_logica = 0 where codigo_mesa = $dados[0]";
        $resultado = mysql_query($update);
        if ($resultado) {
            mysql_close($con);
            echo "<script>window.location='listaMesa.php';alert('MESA DELETADA COM SUCESSO');</script>";
        } else {
            mysql_close($con);
            echo "<script>window.location='cadastroMesa.php';alert('NAO FOI POSSIVEL DELETAR MESA');</script>";
        }
    }
} else {
	echo "<script>window.location='cadastros.php';alert('ERRO AO TENTAR ACESSAR');</script>";
}
?>