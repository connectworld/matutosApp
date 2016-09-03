<?php
    if (isset($_GET["pagina"]) || isset($_POST["pagina"])){
        $pagina = "";
        if (isset($_GET["pagina"])) {
            $pagina = $_GET["pagina"];
        }
        elseif (isset($_POST["pagina"])) {
            $pagina = $_POST["pagina"];
        }
        function limpaSessao(){
            session_start();
                $_SESSION["arrayCodigo"] = null;
                $_SESSION["arrayNome"] = null;
                $_SESSION["arrayPreco"] = null;
                $_SESSION["arrayDescricao"] = null;
                $_SESSION['arrayQuantidade'] = null;
        }
        switch ($pagina) {
            case "cadastros":
                limpaSessao();
                header("Location: cadastros.php");
                break;
            case "consultaPedidos":
                limpaSessao();
                header("Location: consultaPedidos.php");
                break;
            case "exibePedidosDoDia":
                limpaSessao();
                header("Location: exibePedidosDoDia.php");
                break;
             case "atendimentoCozinha":
                limpaSessao();
                header("Location: atendimentoCozinha.php");
                break;
             case "cadastroPedido":
                limpaSessao();
                header("Location: cadastroPedido.php");
                break;
                break;
             case "fazerPedido":
                limpaSessao();
                header("Location: fazerPedido.php");
                break;
             case "selecao":
//                limpaSessao();
                header("Location: selecao.php");
                break;
            case "listaMesa":
                limpaSessao();
                header("Location: listaMesa.php");
                break;
             case "cadastroMesa":
                limpaSessao();
                header("Location: cadastroMesa.php");
                break;
            case "listarCardapio":
                limpaSessao();
                header("Location: listarCardapio.php");
                break;
            case "cadastroCardapio":
                limpaSessao();
                header("Location: cadastroCardapio.php");
                break;
            case "cadastraUsuario":
                limpaSessao();
                header("Location: cadastraUsuario.php");
                break;
             case "listarUsuario":
                limpaSessao();
                header("Location: listarUsuario.php");
                break;
            case "lucratividade":
                limpaSessao();
                header("Location: lucratividade.php");
                break;
        }
    }
?>
