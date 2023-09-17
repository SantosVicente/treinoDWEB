<?php
  ini_set("display_errors", 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $hostname = "localhost"; 
  $user = "root";
  $password = "";
  $database = "cad";

  $conn = mysqli_connect($hostname, $user, $password, $database);

  if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
  }
  echo "Conexão feita com sucesso<br><br>";

  $query = "select * from usuario;";
  $results = mysqli_query($conn, $query);
  $index = 0;
  while ($record = mysqli_fetch_row($results)) {
    $question = array(
        'id' => $record[0],
        'username' => $record[1],
        'email' => $record[2],
        'phoneNo'=> $record[3],
        'pfpImage' => $record[5]
    );
    $questions[$index] = $question;
    $index++;
  }

  echo json_encode($questions);

  mysqli_close($conn);

  echo '<br><br><a href="/index.html">Voltar</a>';
  exit();
  ?>