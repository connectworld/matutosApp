<?php
include 'validaAcesso.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Consulta de Pedidos</title>
    </head>
    <meta charset="UTF-8" />

    <meta name="description" content="jquery"/>
    <meta name="keywords" content="jquery" />
    <meta name="robots" content="all, index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Restaurante Matutos</title>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $("#dataInicial").datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
            $("#dataFinal").datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        });
    </script>

    <body>
         <?php 
                include_once 'conectaBanco.php';
                $con = abrirConexao();
                mysql_set_charset('UTF8', $con);        
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
                                <h2 align="center">Consulta de Pedido</h2>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <form method="post" action="pedidoController.php">
                                        <input type="hidden" value="consultarPedido" name="funcao" id="funcao"/>
                                        <div class="form-group">
                                            <label for="validate-text">De:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"size="10" name="dataInicial" id="dataInicial" placeholder="De" required>
                                                <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validate-text">A:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="dataFinal" id="dataFinal" placeholder="De" required>
                                                <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="disciplina" class="col-md-3 control-label">Disciplina:</label>
                                            <div class="col-md-9">
                                                <select name="situacao" class="form-control">
                                                    <option value="todos">Selecione</option>
                                                    <option value="A">Abertos - A</option>
                                                    <option value="F">Faturados - F</option>
                                                    <option value="C">Cancelados - C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br><br><br>
                                            <div>
                                                <button type="submit" class="btn btn-primary col-xs-12" disabled>Pesquisar</button>
                                           </div>
                                    </form>
                                    <br><br><br><br>
                                </div>
                            </div>
                            <?php
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
                $("#dataInicial").mask("99/99/9999");
                $("#dataFinal").mask("99/99/9999");
            });
        </script> 
    </body>
</html>
