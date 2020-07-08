<?php

  $txt = $_REQUEST["q"];
  $conn = new mysqli("localhost", "root", "root", "testdb");
  if($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
  }

  $answerFile = fopen("answer.txt", "w") or die("Unable to open file");
  fwrite($answerFile, $txt);
  fclose($answerFile);

  $conn->close();
  echo $txt;

 ?>
