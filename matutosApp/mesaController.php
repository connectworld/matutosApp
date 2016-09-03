<?php

if (isset($_POST["funcao"])) {

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
            ;
        }
    }
} 
else {
    echo "<script>window.location='cadastros.php';alert('ERRO AO TENTAR ACESSAR');</script>";
}
?>