<?php
    
if (isset($_GET["funcao"]) || isset($_POST["funcao"])){
    if (isset($_POST["funcao"])){
        $funcao = $_POST['funcao'];
    }
    elseif (isset ($_GET["funcao"])) {
     $funcao = $_GET["funcao"];
}
        include_once 'conectaBanco.php';
        $con = abrirConexao();
        mysql_set_charset('UTF8', $con);
        
	session_start();
        
        $dadosCardapioCodigo = array();
        $dadosCardapioNome = array();
        $dadosCardapioDescricao = array();
        $dadosCardapioPreco = array();
        $dadosCardapioQuantidade = array();
       
        $cont = 0;
        if (isset($_SESSION["arrayCodigo"]) && $funcao == "addCardapio1"){
            
            $dadosCardapioCodigo = $_SESSION["arrayCodigo"];
            $dadosCardapioNome = $_SESSION["arrayNome"];
            $dadosCardapioDescricao = $_SESSION["arrayDescricao"];
            $dadosCardapioPreco = $_SESSION["arrayPreco"];
            $dadosCardapioQuantidade = $_SESSION["arrayQuantidade"];
            
            
        }
              if (isset($_POST["mesaCodigo"])) {
        
            $codigo = $_POST["mesaCodigo"];
            $sql = "select * from mesa where codigo_mesa = '$codigo'";
            $resultado = mysql_query($sql);
            if ($resultado){
                 while ($linha = mysql_fetch_array($resultado)){
                        echo 'teste4';
                        $_SESSION["codigoMesa"] = $linha['codigo_mesa'];
                        $_SESSION["nomeMesa"] = $linha['nome'];
                        echo $linha['codigo_mesa'];
                           
                        mysql_close($con);
                        header("Location: fazerPedido.php");
                        
                      
               // session_start();   
            }
           
            }
           echo "<script>window.location='selecao.php';alert('MESA NÃO EXISTENTE');</script>";
        }
       //ADICIONA MESA AO PEDIDO
        
        if ($funcao== "addPedido") {
           
            $codigo = $_GET["cod"];
            $sql = "select * from mesa where codigo_mesa = '$codigo'";
            $resultado = mysql_query($sql);
            while ($linha = mysql_fetch_array($resultado)){
               // session_start();
		$_SESSION["codigoMesa"] = $linha['codigo_mesa'];
                $_SESSION["nomeMesa"] = $linha['nome'];
                mysql_close($con);
                header("Location: selecionaCardapio.php");
                //echo 'deu certo';
            }
				
        }
          if ($funcao== "addPedido") {
           
            $codigo = $_GET["cod"];
            $sql = "select * from mesa where codigo_mesa = '$codigo'";
            $resultado = mysql_query($sql);
            while ($linha = mysql_fetch_array($resultado)){
               // session_start();
		$_SESSION["codigoMesa"] = $linha['codigo_mesa'];
                $_SESSION["nomeMesa"] = $linha['nome'];
                mysql_close($con);
                header("Location: selecionaCardapio.php");
                //echo 'deu certo';
            }
				
        }
        //ADICIONA PRODUTO AO PEDIDO
        elseif ($funcao == "addCardapio1") {
            $codigo = $_GET["cod"];
            $dadosCardapioQuantidade[] = $_GET['quantidade'];
            $dadosCardapioCodigo[] = $codigo;
            $sql = "select nome,descricao,preco from  cardapio where codigo_cardapio = '$codigo'";
            $resultado = mysql_query($sql);
            while ($row = mysql_fetch_array($resultado)) {
                $dadosCardapioNome[] = $row['nome'];
                $dadosCardapioDescricao[] = $row['descricao'];
                $dadosCardapioPreco[] = $row['preco'];
                 
            }
            
            //session_start();
            $_SESSION["arrayCodigo"] = $dadosCardapioCodigo;
            $_SESSION["arrayNome"] = $dadosCardapioNome;
            $_SESSION["arrayPreco"] = $dadosCardapioPreco;
            $_SESSION["arrayDescricao"] = $dadosCardapioDescricao;
            $_SESSION['arrayQuantidade'] = $dadosCardapioQuantidade;
            mysql_close($con);
            header("Location: selecaoCardapioApp.php");
            echo '2';
        }
        
          elseif ($funcao == "addCardapio") {
            $codigo = $_GET["cod"];
            $dadosCardapioQuantidade[] = $_GET['quantidade'];
            $dadosCardapioCodigo[] = $codigo;
            $sql = "select nome,descricao,preco from  cardapio where codigo_cardapio = '$codigo'";
            $resultado = mysql_query($sql);
            while ($row = mysql_fetch_array($resultado)) {
                $dadosCardapioNome[] = $row['nome'];
                $dadosCardapioDescricao[] = $row['descricao'];
                $dadosCardapioPreco[] = $row['preco'];
                 
            }
            
            
            
            //session_start();
            $_SESSION["arrayCodigo"] = $dadosCardapioCodigo;
            $_SESSION["arrayNome"] = $dadosCardapioNome;
            $_SESSION["arrayPreco"] = $dadosCardapioPreco;
            $_SESSION["arrayDescricao"] = $dadosCardapioDescricao;
            $_SESSION['arrayQuantidade'] = $dadosCardapioQuantidade;
            mysql_close($con);
            header("Location: selecionaCardapio.php");
            echo '2';
        }
        
        elseif ($funcao == "addCardapio1") {
            $codigo = $_GET["cod"];
            $dadosCardapioQuantidade[] = $_GET['quantidade'];
            $dadosCardapioCodigo[] = $codigo;
            $sql = "select nome,descricao,preco from  cardapio where codigo_cardapio = '$codigo'";
            $resultado = mysql_query($sql);
            while ($row = mysql_fetch_array($resultado)) {
                $dadosCardapioNome[] = $row['nome'];
                $dadosCardapioDescricao[] = $row['descricao'];
                $dadosCardapioPreco[] = $row['preco'];
                 
            }
            
            
            
            //session_start();
            $_SESSION["arrayCodigo"] = $dadosCardapioCodigo;
            $_SESSION["arrayNome"] = $dadosCardapioNome;
            $_SESSION["arrayPreco"] = $dadosCardapioPreco;
            $_SESSION["arrayDescricao"] = $dadosCardapioDescricao;
            $_SESSION['arrayQuantidade'] = $dadosCardapioQuantidade;
            mysql_close($con);
            header("Location: selecaoCardapioApp.php");
            echo '2';
        }
        elseif ($funcao == "removeMesa") {
            $_SESSION["arrayCodigo"] = null;
            $_SESSION["arrayNome"] = null;
            $_SESSION["arrayPreco"] = null;
            $_SESSION["arrayDescricao"] = null;
            $_SESSION['arrayQuantidade'] = null;
            mysql_close($con);
            header("Location: cadastroPedido.php");
        }
        elseif ($funcao == "removeCardapio") {
            
            echo "remover cardapi";
            $codigoCardapio = $_GET["codigoCardapio"];
            
            $dadosCardapioCodigo = $_SESSION["arrayCodigo"];
            $dadosCardapioNome = $_SESSION["arrayNome"];
            $dadosCardapioDescricao = $_SESSION["arrayDescricao"];
            $dadosCardapioPreco = $_SESSION["arrayPreco"];
            $dadosCardapioQuantidade = $_SESSION['arrayQuantidade'];
            
            $quantidade = count($dadosCardapioCodigo);
            
            if ($quantidade == 1 && $dadosCardapioCodigo[0] != null){
                
                echo "if numero 1";
                
                unset($dadosCardapioCodigo[0]);
                unset($dadosCardapioNome[0]);
                unset($dadosCardapioDescricao[0]);
                unset($dadosCardapioPreco[0]);
                unset($dadosCardapioQuantidade[0]);
                
                $_SESSION["arrayCodigo"] = null;
                $_SESSION["arrayNome"] = null;
                $_SESSION["arrayPreco"] = null;
                $_SESSION["arrayDescricao"] = null;
                $_SESSION["arrayQuantidade"] = null;
                
                mysql_close($con);
                header("Location: selecionaCardapio.php");
                
            }
            elseif($quantidade > 1) {
                for($i = 0; $i < $quantidade ; $i++) {
                    echo "for 1";
                    if ($dadosCardapioCodigo[$i] == $codigoCardapio) {

                        echo "if / for 1";
                        unset($dadosCardapioCodigo[$i]);
                        unset($dadosCardapioNome[$i]);
                        unset($dadosCardapioDescricao[$i]);
                        unset($dadosCardapioPreco[$i]);
                        unset($dadosCardapioQuantidade[0]);
                        
                        $_SESSION["arrayCodigo"] = array_values($dadosCardapioCodigo);
                        $_SESSION["arrayNome"] = array_values($dadosCardapioNome);
                        $_SESSION["arrayPreco"] = array_values($dadosCardapioPreco);
                        $_SESSION["arrayDescricao"] = array_values($dadosCardapioDescricao);
                        $_SESSION["arrayQuantidade"] = array_values($dadosCardapioQuantidade);
                        mysql_close($con);
                        header("Location: selecionaCardapio.php");
                        
                        break;
                    }
                }
            }
        }
        elseif (isset($_SESSION["arrayCodigo"]) && $funcao == "salvarPedido" && $_SESSION["arrayCodigo"] != null) {
            echo "salvaPedido";
            $dadosCardapioCodigo = $_SESSION["arrayCodigo"];
            $dadosCardapioNome = $_SESSION["arrayNome"];
            $dadosCardapioDescricao = $_SESSION["arrayDescricao"];
            $dadosCardapioPreco = $_SESSION["arrayPreco"];
            $dadosCardapioQuantidade = $_SESSION["arrayQuantidade"];
            
            $codigoMesa = $_GET['codigoMesa'];
            $nomeCliente = $_GET['nomeCliente'];
            
            $quantidade = count($dadosCardapioCodigo);
  
            $sql = mysql_query("insert into pedido (data_pedido,cliente,sitaucao,valor_total,codigo_refMesa) values (CURRENT_DATE(),'$nomeCliente','A',0,'$codigoMesa')");
            
            if ($sql) {
                $ultimoPedido = "";
                $sql = mysql_query("select codigo_pedido from pedido order by codigo_pedido desc limit 1");
                while ($linha = mysql_fetch_array($sql)) {
                    $ultimoPedido = $linha['codigo_pedido'];
                }
                for($i = 0; $i < $quantidade ; $i++) {
                  //echo $sql = mysql_query("insert into item_pedido (codigo_pedidoCardapio,codigo_itemCardapio,nome_cardapio,descricao_cardapio,valor_unitario) values ('$ultimoPedido','$dadosCardapioCodigo[$i]','$dadosCardapioNome[$i]','$dadosCardapioDescricao[$i]','$dadosCardapioPreco[$i]')");
                    $sql = "insert into item_pedido (codigo_pedidoCardapio,codigo_itemCardapio,nome_cardapio,descricao_cardapio,valor_unitario,quantidade,flag_situacao) values ('$ultimoPedido','$dadosCardapioCodigo[$i]','$dadosCardapioNome[$i]','$dadosCardapioDescricao[$i]','$dadosCardapioPreco[$i]','$dadosCardapioQuantidade[$i]','A')";
                    $resultado = mysql_query($sql);
                }
                if ($resultado){
                    mysql_close($con);
                    echo "<script>window.location='exibePedidosDoDia.php';alert('PEDIDO SALVO COM SUCESSO');</script>";
                }
                
            }
            else{
               echo "<script>window.location='cadastros.php';alert('ERRO AO SALVAR PEDIDO');</script>";
            }
  
        }
        elseif($funcao == "editarPedido"){
            $codigoPedido = $_GET['codigoPedido'];
            
            $_SESSION["arrayCodigo"] = null;
            $_SESSION["arrayNome"] = null;
            $_SESSION["arrayPreco"] = null;
            $_SESSION["arrayDescricao"] = null;
            $_SESSION["arrayQuantidade"] = null;
            
            $sql = mysql_query ("select * from item_pedido where codigo_pedidoCardapio = '$codigoPedido' and flag_situacao = 'A'");
            while ($linha = mysql_fetch_array($sql)) {
                $dadosCardapioCodigo[] = $linha['codigo_itemCardapio'];
                $dadosCardapioNome[] = $linha['nome_cardapio'];
                $dadosCardapioDescricao[] = $linha['descricao_cardapio'];
                $dadosCardapioPreco[] = $linha['valor_unitario'];
                $dadosCardapioQuantidade[] = $linha['quantidade'];
            }
            $_SESSION["arrayCodigo"] = $dadosCardapioCodigo;
            $_SESSION["arrayNome"] = $dadosCardapioNome;
            $_SESSION["arrayPreco"] = $dadosCardapioPreco;
            $_SESSION["arrayDescricao"] = $dadosCardapioDescricao;
            $_SESSION["arrayQuantidade"] = $dadosCardapioQuantidade;
            
            mysql_close($con);
            header("Location: editarPedido.php?codigoPedido='$codigoPedido'");
        }
        elseif($funcao == "troca"){
            $nomeCodigo = $_GET['nomeCodigo'];
            $troca = $_GET['troca'];
            $codigoMesa = $_GET['codigoMesa'];
            $codigoPedido = $_GET['codigoPedido'];
            //echo $troca;
            //echo $nomeCodigo;
            //bool is_int($nomeCodigo);
            $count = 0;
            if ($troca == 1 && is_numeric($nomeCodigo)) {
                $sql = mysql_query("select * from mesa where codigo_mesa = '$nomeCodigo'");
                while ($linha = mysql_fetch_array($sql)) {
                    $count = $count + 1;
                }
                if($count != 0){
                    echo "teste";
                    echo $codigoPedido;
                    $sql ="update pedido set codigo_refMesa = '$nomeCodigo' where codigo_pedido = $codigoPedido";
                    $resulado = mysql_query($sql);

                        mysql_close($con);
                        header("Location: editarPedido.php?codigoPedido=$codigoPedido");
                }
            }
            elseif ($troca == 0) {
                $sql = "update pedido set cliente = '$nomeCodigo' where codigo_pedido = $codigoPedido";
                $resultado = mysql_query($sql);
                if($resultado){
                    
                        mysql_close($con);
                        header("Location: editarPedido.php?codigoPedido=$codigoPedido");
                }
            }
            elseif ($troca == 1 && is_string($nomeCodigo)) {
                
                mysql_close($con);
                
                echo "<script>;alert('CPF INVÁLIDO PARA ESSE USUÁRIO');</script>";
                
                header("Location: editarPedido.php?codigoPedido=$codigoPedido");
            }
        }
        elseif($funcao == "alteraCardapioPedidoAdd" && isset($_SESSION['codigoDoPedido'])){
            echo $codigoCardapio = $_GET['codigoCardapio'];
            echo $codigoPedido = $_SESSION['codigoDoPedido'];
            echo $quantidade = $_GET['quantidade'];
            
            //ECHO "ENTROU AQUI";
            
            //ARRAY RECEBE A LISTA DE CARDAPIO DA SESSÃO
            $dadosCardapioCodigo = $_SESSION["arrayCodigo"];
            $dadosCardapioNome = $_SESSION["arrayNome"];
            $dadosCardapioDescricao = $_SESSION["arrayDescricao"];
            $dadosCardapioPreco = $_SESSION["arrayPreco"];
            $dadosCardapioQuantidade = $_SESSION["arrayQuantidade"];
            
            // LIMPO A LISTA EXISTENTE NA SESSÃO
            $_SESSION["arrayCodigo"] = null;
            $_SESSION["arrayNome"] = null;
            $_SESSION["arrayPreco"] = null;
            $_SESSION["arrayDescricao"] = null;
            $_SESSION["arrayQuantidade"] = null;
            
            $dadosCardapioCodigo[] = $codigoCardapio;
            $dadosCardapioQuantidade[] = $quantidade;
            $sql = "select nome,descricao,preco from  cardapio where codigo_cardapio = '$codigoCardapio'";
            $resultado = mysql_query($sql);
            while ($row = mysql_fetch_array($resultado)) {
                $dadosCardapioNome[] = $row['nome'];
                $dadosCardapioDescricao[] = $row['descricao'];
                $dadosCardapioPreco[] = $row['preco'];
                
            }
            
            //session_start();
            $_SESSION["arrayCodigo"] = $dadosCardapioCodigo;
            $_SESSION["arrayNome"] = $dadosCardapioNome;
            $_SESSION["arrayPreco"] = $dadosCardapioPreco;
            $_SESSION["arrayDescricao"] = $dadosCardapioDescricao;
            $_SESSION["arrayQuantidade"] = $dadosCardapioQuantidade;
            mysql_close($con);
            header("Location: editarPedido.php?codigoPedido=$codigoPedido");
        }
        elseif ($funcao == "editaPedidoRemoveItem" && isset ($_SESSION["arrayCodigo"]) && isset ($_SESSION["codigoDoPedido"])) {
            echo $codigoPedido = $_SESSION['codigoDoPedido'];
            $codigoCardapio = $_GET["codigoCardapio"];
            
            $dadosCardapioCodigo = $_SESSION["arrayCodigo"];
            $dadosCardapioNome = $_SESSION["arrayNome"];
            $dadosCardapioDescricao = $_SESSION["arrayDescricao"];
            $dadosCardapioPreco = $_SESSION["arrayPreco"];
            $dadosCardapioQuantidade = $_SESSION['arrayQuantidade'];
            
            $quantidade = count($dadosCardapioCodigo);
            
            if ($quantidade == 1 && $dadosCardapioCodigo[0] != null){
                
                
                
                unset($dadosCardapioCodigo[0]);
                unset($dadosCardapioNome[0]);
                unset($dadosCardapioDescricao[0]);
                unset($dadosCardapioPreco[0]);
                unset($dadosCardapioQuantidade[0]);
                
                $_SESSION["arrayCodigo"] = null;
                $_SESSION["arrayNome"] = null;
                $_SESSION["arrayPreco"] = null;
                $_SESSION["arrayDescricao"] = null;
                $_SESSION["arrayQuantidade"] = null;
                
                mysql_close($con);
                header("Location: editarPedido.php?codigoPedido=$codigoPedido");
                
            }
            elseif($quantidade > 1) {
                for($i = 0; $i < $quantidade ; $i++) {
                    
                    if ($dadosCardapioCodigo[$i] == $codigoCardapio) {

                        echo "if / for 1";
                        unset($dadosCardapioCodigo[$i]);
                        unset($dadosCardapioNome[$i]);
                        unset($dadosCardapioDescricao[$i]);
                        unset($dadosCardapioPreco[$i]);
                        unset($dadosCardapioQuantidade[0]);
                        
                        $_SESSION["arrayCodigo"] = array_values($dadosCardapioCodigo);
                        $_SESSION["arrayNome"] = array_values($dadosCardapioNome);
                        $_SESSION["arrayPreco"] = array_values($dadosCardapioPreco);
                        $_SESSION["arrayDescricao"] = array_values($dadosCardapioDescricao);
                        $_SESSION["arrayQuantidade"] = array_values($dadosCardapioQuantidade);
                        mysql_close($con);
                       header("Location: editarPedido.php?codigoPedido=$codigoPedido");
                        
                        break;
                    }
                }
            }
        }
        elseif ($funcao == "atualizarPedido" && isset ($_SESSION["codigoDoPedido"]) && isset ($_SESSION["arrayCodigo"])) {
            $codigoPedido = $_SESSION["codigoDoPedido"];
           
            $sql = "delete from item_pedido where codigo_pedidoCardapio = $codigoPedido";
            $resultado = mysql_query($sql);
           if ($resultado){
                $sql = "update pedido set valor_total = 0 where codigo_pedido = $codigoPedido";
                $resultado = mysql_query($sql);
                if ($resultado){
                    $dadosCardapioCodigo = $_SESSION["arrayCodigo"];
                    $dadosCardapioNome = $_SESSION["arrayNome"];
                    $dadosCardapioDescricao = $_SESSION["arrayDescricao"];
                    $dadosCardapioPreco = $_SESSION["arrayPreco"];
                    $dadosCardapioQuantidade = $_SESSION["arrayQuantidade"];
                    
                    $quantidade = count($dadosCardapioCodigo);
  
                    for($i = 0; $i < $quantidade ; $i++) {
                    
                       echo $sql = "insert into item_pedido (codigo_pedidoCardapio,codigo_itemCardapio,nome_cardapio,descricao_cardapio,valor_unitario,quantidade,flag_situacao) values ($codigoPedido,'$dadosCardapioCodigo[$i]','$dadosCardapioNome[$i]','$dadosCardapioDescricao[$i]','$dadosCardapioPreco[$i]','$dadosCardapioQuantidade[$i]','A')";
                       $resultado = mysql_query($sql);
                    }
                    if ($resultado){
                        $_SESSION["arrayCodigo"] = null;
                        $_SESSION["arrayNome"] = null;
                        $_SESSION["arrayPreco"] = null;
                        $_SESSION["arrayDescricao"] = null;
                        $_SESSION["arrayQuantidade"] = null;
                        $_SESSION["codigoDoPedido"] = null;
                        mysql_close($con);
                        echo "<script>window.location='cadastros.php';alert('PEDIDO ATUALIZADO COM SUCESSO');</script>";
                    }
                    else{
                        echo "<script>window.location='cadastros.php';alert('ERRO AO ATUALIZAR PEDIDO');</script>";
                    }    
                }
                    
            }
            
        }
        elseif($funcao == "faturarPedido"){
            $valorTotalPedido = $_POST['valor_total'];
            $codigoPedido = $_POST['codigoPedido'];
            $usuario = $_SESSION["CODIGO"];
            $cliente = "";
            $sql = "select * from pedido where codigo_pedido = $codigoPedido";
            $resultado = mysql_query($sql);
            if ($resultado){
                while ($linha = mysql_fetch_array($resultado)) {
                    $cliente = $linha['cliente'];
                }
               $sql = "insert into pedidos_faturados (data_horaFaturamento,codigo_pedidofaturado,cliente_pedido,valor_totalPedido,flag_estorno,usuario_faturador) values (CURRENT_TIMESTAMP(),'$codigoPedido','$cliente','$valorTotalPedido',0,'$usuario')";
               $resultado = mysql_query($sql);
               if ($resultado){
                   mysql_close($con);
                  header("Location: imprimeComprovante.php?codigoPedido=$codigoPedido");
               }
               else{
                   mysql_close($con);
                   echo "deu merda";
               }
            }
            else{
                mysql_close($con);
                echo "erro de comunicação com o Banco";
            }
        }
        elseif($funcao == "cancelarPedido"){
            $codigoPedido = $_GET['codigoPedido'];
            $sql = "update pedido set sitaucao = 'C' where codigo_pedido = $codigoPedido";
            $resultado = mysql_query($sql);
            if ($resultado){
                mysql_close($con);
                echo "<script>window.location='cadastros.php';alert('PEDIDO CANCELADO');</script>";
            }
            else {
                echo "<script>window.location='cadastros.php';alert('ERRO AO CANCELAR PEDIDO');</script>";
            }
        }
        elseif($funcao == "consultarPedido"){
            //FUNCAO QUE CONVERTE DATA BRASILEIRA EM DATA UNIVERSAL
             function date_converter($_date = null) {
                $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
                if ($_date != null && preg_match($format, $_date, $partes)) {
                    return $partes[3].'-'.$partes[2].'-'.$partes[1];
                }
                return false;
            }
            $dataInicial = date_converter($_POST['dataInicial']);
            $dataFinal = date_converter($_POST['dataFinal']);
            $situacao = $_POST['situacao'];
            $cont = 0;
            
            if ($situacao != "todos"){
            
                $sql = "select * from pedido where data_pedido between ('$dataInicial')and ('$dataFinal') and sitaucao = '$situacao'";

                $resultado = mysql_query($sql);
                if ($resultado){
                    while ($linha = mysql_fetch_array($resultado)) {
                        $cont = $cont + 1;
                    }
                    if ($cont != 0){
                        mysql_close($con);
                        header("Location: exibePedidoConsultado.php?dataInicial=$dataInicial&dataFinal=$dataFinal&situacao=$situacao");
                    }
                    else{
                        mysql_close($con);
                         echo "<script>window.location='consultaPedidos.php';alert('NAO HA REGISTROS');</script>";
                    }
                }
            }
            elseif($situacao == "todos"){
                echo "entrou";
                echo $sql = "select * from pedido where data_pedido between ('$dataInicial')and ('$dataFinal')";
                $resultado = mysql_query($sql);
                if ($resultado){
                    echo "1";
                    while ($linha = mysql_fetch_array($resultado)) {
                        $cont = $cont + 1;
                        
                    }
                    if ($cont != 0){
                        
                        mysql_close($con);
                        header("Location: exibePedidoConsultado.php?dataInicial=$dataInicial&dataFinal=$dataFinal&situacao=$situacao");
                    }
                    else{
                        mysql_close($con);
                        echo "<script>window.location='consultaPedidos.php';alert('NAO HA REGISTROS');</script>";
                    }
                }
            }
        }
        elseif($funcao == "atualizaAtendimentoItem"){
          echo $codigoPedido = $_GET['codigoPedido'];
          echo $codigoItem = $_GET['codigoItem'];
          echo $flag_atm = $_GET['flag_atm'];
          echo $nomeMesa = $_GET['nomeMesa'];
          switch ($flag_atm) {
                case 0:
                    echo $sql = "update item_pedido set atendimento_cozinha = 0 where codigo_pedidoCardapio = $codigoPedido and codigo_itemCardapio = $codigoItem";
                    $resultado = mysql_query($sql);
                    if ($resultado){
                        mysql_close($con);
                        header("Location: verItensParaAtendimento.php?codigoPedido=$codigoPedido&nomeMesa=$nomeMesa");
                    }    
                    break;
                case 1:
                    $sql = "update item_pedido set atendimento_cozinha = 1 where codigo_pedidoCardapio = $codigoPedido and codigo_itemCardapio = $codigoItem";
                    $resultado = mysql_query($sql);
                    if ($resultado) {
                        mysql_close($con);
                        header("Location: verItensParaAtendimento.php?codigoPedido=$codigoPedido&nomeMesa=$nomeMesa");
                    }
            }
        }
        
        elseif ($funcao == "estornarPedido") {
            $codigoPedido = $_GET["codigoPedido"];
            $usuario = $_SESSION["CODIGO"];
            $update = "update pedidos_faturados set data_horaEstorno = CURRENT_TIMESTAMP(), flag_estorno = 1, usuario_estornador = $usuario where codigo_pedidoFaturado = $codigoPedido";
            $resultado = mysql_query($update);
            if ($resultado) {
                $update = "update pedido set sitaucao = 'C' where codigo_pedido = $codigoPedido";
                $resultado = mysql_query($update);
                if ($resultado) {
                    
                   echo "<script>window.location='lucratividade.php';alert('FATURA ESTORNADA COM SUCESSO');</script>";
                }
                else{
                    echo "<script>window.location='lucratividade.php';alert('ERRO AO ESTORNAR FATURA');</script>";
                }
            }
            else {
                echo "<script>window.location='lucratividade.php';alert('OCORREU UM ERRO INESPERADO, TENTE NOVAMENTE');</script>";
            }
            
        }
        elseif ($funcao == "consultaFatura") {
            //FUNCAO QUE CONVERTE DATA BRASILEIRA EM DATA UNIVERSAL
             function date_converter($_date = null) {
                $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
                if ($_date != null && preg_match($format, $_date, $partes)) {
                    return $partes[3].'-'.$partes[2].'-'.$partes[1];
                }
                return false;
            }
            $dataInicial = date_converter($_POST['dataInicial']);
            $dataFinal = date_converter($_POST['dataFinal']);
            $situacao = $_POST['situacao'];
            $horaInicial = ' 00:00:00';
            $horaFinal = ' 23:59:59';
            $dataInicial = $dataInicial.$horaInicial;
            $dataFinal = $dataFinal.$horaFinal;
            $cont = 0;
            
            if($situacao == 1){
               $sql = "select * from pedidos_faturados where flag_estorno = 1 and data_horaFaturamento BETWEEN ('$dataInicial') and ('$dataFinal')";
                $resultado = mysql_query($sql);
                if($resultado){
                    while ($linha = mysql_fetch_array($resultado)) {
                        $cont = 1;
                    }
                    switch ($cont) {
                        case 0:
                            mysql_close($con);
                            echo "<script>window.location='lucratividade.php';alert('NAO HA REGISTROS');</script>";
                            break;
                        case 1:
                            mysql_close($con);
                            header("Location: exibeFaturaEstorno.php?dataInicial=$dataInicial&dataFinal=$dataFinal&situacao=$situacao");
                            break;
                    }
                }
                else{
                    mysql_close($con);
                    echo "<script>window.location='lucratividade.php';alert('OCORREU UM ERRO INESPERADO, TENTE NOVAMENTE');</script>";
                }
            }
            elseif($situacao == 0){
                $sql = "select * from pedidos_faturados where flag_estorno = 0 and data_horaFaturamento BETWEEN ('$dataInicial') and ('$dataFinal')";
                $resultado = mysql_query($sql);
                if ($resultado) {
                     while ($linha = mysql_fetch_array($resultado)) {
                    $cont = 1;
                    }
                    switch ($cont) {
                        case 0:
                            mysql_close($con);
                            echo "<script>window.location='lucratividade.php';alert('NAO HA REGISTROS');</script>";
                            
                            break;
                        case 1:
                            mysql_close($con);
                            header("Location: exibeFaturaEstorno.php?dataInicial=$dataInicial&dataFinal=$dataFinal&situacao=$situacao");
                            break;
                    }
                }
                else{
                    mysql_close($con);
                    echo "<script>window.location='lucratividade.php';alert('UM ERRO INESPERADO ACONTECEU, TENTE NOVAMENTE!');</script>";
                }
            }
        }
   }

   else{
       header("Location: cadastros.php");
   }
        
?>

