<?php

 // ISERINDO DADOS COM PREPARED STATEMENT
$mysqli = new mysqli('localhost', 'root', '', 'matutos');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = $mysqli->prepare("INSERT INTO mesa (nome, observacao) VALUES (?,?)");
$stmt->bind_param("ss",$nome,$observacao);

$nome = 'leandro';
$observacao = 'brito';

//$code = 'DEU';


/* execute prepared statement */
$stmt->execute();

printf("%d Row inserted.\n", $stmt->affected_rows);

/* close statement and connection */
$stmt->close();

/* Clean up table CountryLanguage */
$mysqli->query("DELETE FROM mesa WHERE nome='lego'");
printf("%d Row deleted.\n", $mysqli->affected_rows);

/* close connection */
$mysqli->close();
?>