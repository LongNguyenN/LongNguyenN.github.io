<?php
  $conn = new mysqli("localhost", "root", "root", "testdb");
  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //This is the questiont that the player inputs
  $questionFile = fopen("question.txt", "r") or die("cannot find file");
  $questionTxt = fread($questionFile, filesize("question.txt"));
  fclose($questionFile);

  //This is the answer that the player inputs
  $answerFile = fopen("answer.txt", "r") or die("cannot read file");
  $answerTxt = fread($answerFile, filesize("answer.txt"));
  fclose($answerFile);

  //Grab the largest current id to make new id's
  $sql = "SELECT id FROM questions ORDER BY id DESC LIMIT 1";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $largestId = $row["id"];

  $newYESID = (int)$largestId + 1;
  $newNOID = (int)$largestId + 2;

  //grab the id of the last question asked, which is the answer
  $questionFile = fopen("../questions.json", "r") or die("could not open file");
  $txt = fread($questionFile, filesize("../questions.json"));
  $myJSON = json_decode($txt, true);
  fclose($questionFile);

  //ID of the question that was last asked by genie (WATCH OUT ITS CASE SENSITIVE)
  $currentID = $myJSON["Id"];
  //last question asked by genie
  $lastAsked = $myJSON["question"];

  //change id back to one so that player can restart game
  $questionFile = fopen("../questions.json", "w") or die("could not open file");
  $newJSONTXT = array("Id"=>1, "question"=>"Do you want to start?");
  $newJSONJSON = json_encode($newJSONTXT);
  fwrite($questionFile, $newJSONJSON);
  fclose($questionFile);

  //first is to insert the question given by the player
  $sql = "UPDATE questions SET question=\""
  . $questionTxt . "\", accept=" . $newYESID
  . ", refute=" . $newNOID . " WHERE " . "id=" . $currentID;
  $conn->query($sql);

  //next step is to add the new questions
  $sql = "INSERT INTO questions VALUES("
    . $newNOID . ", \"" . $lastAsked . "\", NULL, NULL)" .
    ", (" . $newYESID . ", \"" . $answerTxt . "\", NULL, NULL)";
  $conn->query($sql);

  $conn -> close();
  echo "You can add a node to the tree";
?>
