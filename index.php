<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB And PHP</title>
</head>
<body>
<H1>
FORMULARIO
</H1>

<!-- Formulário HTML -->
<form action="" method="post">
  <label>Nome: </label><br>
  <input type="text" name="nome" placeholder="Nome"><br>
  <label>Sobrenome: </label><br>
  <input type="text" name="sobrenome"><br>
  <label>Turma: </label><br>
  <input type="text" name="turma"><br>

  <input type="submit" value="Gravar">


  







</form>

<?php

    


//variaveis da conexão do banco dados

$servidor = "localhost";
$usuario = "id20479527_skl";
$senha = "+V<28X<jQ*e^A+a=";
$nomedb = "id20479527_db2"; // nome do banco de dados que será usado

// Cria a conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $nomedb);

// Checa a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Conectado ao banco de dados"."<br>";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Coleta os dados do formulário
  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $turma = $_POST["turma"];

  // Insere os dados no banco de dados
  $sql = "INSERT INTO alunos (nome, sobrenome, turma) VALUES ('$nome', '$sobrenome', '$turma')";
  if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso"."<br>";
  } else {
    echo "Erro ao inserir dados: " . $conn->error;
  }
}

//visualiza tabela
$sql = "SELECT nome,  sobrenome,  turma  FROM alunos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "nome: " . $row["nome"]. " - sobrenome: " . $row["sobrenome"]. " turma: " . $row["turma"]. "<br>";
  }
} else {
  echo " 0 resultados tabela vazia ";
}

$conn->close();
?>


  <script src="script.js"></script>  
</body>
</html>