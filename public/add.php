<?php

  $txt = $_REQUEST["q"];
  $conn = new mysqli("localhost", "root", "root", "testdb");
  if($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
  }

  $questionFile = fopen("question.txt", "w") or die("Unable to open file");
  fwrite($questionFile, $txt);
  fclose($questionFile);

  $conn->close();
  echo $txt;

 ?>
