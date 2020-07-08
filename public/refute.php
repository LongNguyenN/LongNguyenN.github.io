<?php
  $conn = new mysqli("localhost", "root", "root", "testdb");
/*
+------+----------------------+--------+--------+
| Id   | Question             | Accept | Refute |
+------+----------------------+--------+--------+
|    1 | Conintue or decline? |      2 |      3 |
|    2 | Animal?              |      4 |      5 |
|    3 | Food?                |      6 |      7 |
|    4 | Squirrel             |   NULL |   NULL |
|    5 | Robot                |   NULL |   NULL |
|    6 | Spaghetti            |   NULL |   NULL |
|    7 | Dirt                 |   NULL |   NULL |
 +------+----------------------+--------+--------+
*/

  if($conn -> connect_error) {
    die("connection failed " . $conn -> connect_error);
  }

  $myFile = fopen("../questions.json","r") or die("Unable to open file");
  $txt = fread($myFile, filesize("../questions.json"));
  fclose($myFile);

  $myJSON = json_decode($txt, true);
  $id = $myJSON["Id"];
  #$id = (int)$id + 1;
  $sql = "SELECT refute FROM questions WHERE Id=" . $id;
  $result = $conn -> query($sql);
  if($result -> num_rows > 0) {
    $row = $result ->fetch_assoc();
    $id = $row["refute"];
  }

  $sql = "SELECT question FROM questions WHERE Id=" . $id;
  $result = $conn -> query($sql);
  if($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
      $answer = $row["question"];
    }
    $question = array("Id"=>$id, "question"=>$answer);
    $myFile = fopen("../questions.json", "w") or die("unable to open file");
    $questionTxt = json_encode($question);
    fwrite($myFile, $questionTxt);
    fclose($myFile);

    echo $questionTxt;
  } else {
    echo "KAIBA SUMMONS BLUE EYES WHITE DRAGON^^";
  }

  $conn -> close();

 ?>
