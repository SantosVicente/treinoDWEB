<?php
  ini_set("display_errors", 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $username = $_GET["username"];
  $email = $_GET["email"];
  $phoneNo = $_GET["phoneNo"];
  $pass = $_GET["pass"];

  $hostname = "localhost"; 
  $user = "root";
  $password = "";
  $database = "cad";

  $conn = mysqli_connect($hostname, $user, $password, $database);

  if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
  }
  echo "Conexão feita com sucesso";

  $query = "insert into usuario (username, email, phoneNo, pass) values ('$username', '$email', '$phoneNo', '$pass')";

  $res = mysqli_query($conn, $query);
  if($res){
      echo '<h2>Cadastro feito com sucesso!!!</h2>';
      mysqli_close($conn);
      header("Location: /index.html");
  } else {
      echo '<h2>O Cadastro falhou!!!</h2>';
      var_dump(mysqli_error($conn));
      mysqli_close($conn);
      echo '<a href="/index.html">Voltar</a>';
    }
  exit();
?>