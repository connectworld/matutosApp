<?php 
    if (isset($_POST["funcao"])) {
	$funcao = $_POST["funcao"];	
	include_once 'conectaBanco.php';
	$con = abrirConexao();
	mysql_set_charset('UTF8', $con);
	
        if ($funcao == "salvarCardapio") {
            
            $origens = array('"',"'",'/','*','true','false','=','where','drop','delete','from','WHERE','DELETE','FROM','DROP','SELECT');
            $distino = "";

            $dados = array();

            $dados[0] = strtoupper( str_replace($origens, $distino, $_POST['nome']));
            $dados[1] = strtoupper( str_replace($origens, $distino, $_POST['descricao']));
            $dados[2] = strtoupper(str_replace($origens, $distino, $_POST['preco']));


            //RECEBENDO A IMAGEM
            //RECEBENDO A IMAGEM
            $foto = $_FILES['foto']['tmp_name'];
            $tamanho = $_FILES['foto']['size'];
            $tipo = $_FILES['foto']['type'];


            if ($foto == "") {
               
                $insert = "insert into cardapio (nome,descricao,preco,exclusao_logica) values ('$dados[0]','$dados[1]','$dados[2]',1)";

                $result = mysql_query($insert);
                mysql_close($con);

                if ($result) {
                    echo "<script>window.location='listarCardapio.php';alert('CARDAPIO CADASTRADO COM SUCESSO');</script>";
                }
                else{
                    echo "<script>window.location='cadastroCardapios.php';alert('ERRO AO CARDAPIO');</script>";
                }
            }
            elseif ($foto != "") {
                $fp = fopen($foto,"rb");
                $conteudo = fread($fp, $tamanho);	
                $conteudo = addslashes($conteudo);
                fclose($fp);

                $insert = "insert into cardapio (nome,descricao,preco,imagem,exclusao_logica) values ('$dados[0]','$dados[1]','$dados[2]','$conteudo',1)";

                $result = mysql_query($insert);
                mysql_close($con);
                if ($result) {
                    echo "<script>window.location='listarCardapio.php';alert('CARDAPIO CADASTRADO COM SUCESSO');</script>";
                }
                else{
                    echo "<script>window.location='cadastro.php';alert('ERRO AO CADASTRAR CARDAPIO');</script>";
                }
            }

        }
        elseif($funcao == "editarCardapio"){
            
        }
        	
    }
    else{
        header("Location: cadastros.php");
    }
?>