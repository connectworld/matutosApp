<?php
    include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Cadasro de Mesa</title>
    </head>
    <meta charset="UTF-8" />

    <meta name="description" content="jquery"/>
    <meta name="keywords" content="jquery" />
    <meta name="robots" content="all, index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Cadastro de Mesa</title>
    <meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
    <meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/modernizr.custom.js"></script>
    <link type="text/css" href="jquery/css/base/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
<!--		<script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>-->
<!--		<script type="text/javascript" src="js_file/form.js"></script>-->

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <script type="text/javascript" src="js_file/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js_file/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="js_file/jquery.alphanumeric.js"></script>
    <script type="text/javascript" src="jquery/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="js_file/form.js"></script>

    <body>
         <?php
                if(isset($_GET["codigoMesa"]){
                    include_once 'conectaBanco.php';
                    $codigoMesa = $_GET["codigoMesa"];
                    $con = abrirConexao();
                    mysql_set_charset('UTF8', $con);
                    $select = "select * from mesa where codigo_mesa = $codigoMesa";
                    $result = mysqli_query($select);
            ?>
        <div align="center">
            <table border="1" style="width: 90%;">
                <tr><td>

                        <div class="container">
                            <!-- Codrops top bar -->
                            <?php
                            include 'logo.php';
                            ?>

                            <a href="gerenciadoDePaginas.php?pagina=cadastros" style="text-decoration: none;">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">MENU</button>
                            </a><br><br>
                            <br>
                            <div>
                                <h2 align="center">Tela de Cadastro de Mesa</h2>
                            </div>
                            <br>
                            <?php
                                while ($linha = mysqli_fetch_array($result)) {
                            ?>
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <form method="post" action="mesaController.php">
                                        <input type="hidden" name="funcao" value="editarMesa" id="funcao" />
                                        <input type="hidden" name ="codigoMesa" value="<?php echo $codigoMesa;?>" id="codigoMesa"/>
                                        <div class="form-group">
                                            <label for="validate-text">Nome:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"size="10" name="nome" id="nome" placeholder="Nome" required value="<?php echo $linha['nome'];?>">
                                                <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
                                            </div>
                                        </div>
                                        <label for="validate-text">Observação:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"size="10" name="observacao" id="observacao" placeholder="Observação" required value="<?php echo $linha['observacao'];?>">
                                            <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>

                                        </div>
                                        <br><br><br>
                                        <button type="submit" class="btn btn-primary col-xs-12" disabled>Cadastrar</button>
                                </div>

                                </form>
                                <br><br><br><br>
                            </div>
                        </div>
                        <br><br><br><br>
                        <?php
                            }
                        mysql_close($con);
                        include 'rodape.php';
                        ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <script type="text/javascript">

            $(document).ready(function () {
                $("#dataInicial").mask("");
                $("#dataFinal").mask("99/99/9999");
            });
        </script>
        <?php
            }
            else{
                header("Location: cadastros.php");
            }
        ?>
    </body>
</html>