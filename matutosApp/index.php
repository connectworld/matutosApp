<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
                <link rel="stylesheet" type="text/css" href="css/login_1.css" />
    </head>
        <body> 
            <div class="jumbotron">
                <div class="container">
                  <img src="img/logo.png" width="70%;"/><br>
                  <h3> Acesso Para o Sitema do Restaurante</h3>
                  <div class="box">
                      <form action="usuarioController.php" method="post">
                          <input type="hidden" name="funcao" id="funcao" value="validaUsuario" />
                            <label for="login">Usuario</label><br>
                            <input type="usuario" placeholder="Usuário" name="usuario" id="usuario" required="required">
                            <label for="senha">Senha: </label> <br>
                            <input type="password" placeholder="password" name="senha" id="senha" required="required">
                            <button class="btn btn-default full-width"><span class="glyphicon glyphicon-ok"></span></button>
                            <input type="submit" value="ENTRAR"/>
                      </form>
                  </div>
                </div>
            </div>
        </body>
</html>