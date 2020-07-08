<!--
  Name: Danhiel Vu & Long Nguyen
  Date: 12/22/2019

  This is the Akinator HTML.
-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="akinator.css" />
    <script src="akinator.js"></script>
    <style>
      #newNodeBox {
        display: none;
      }
    </style>
    <title>Akinator</title>
  </head>

  <body>
    <section>
      <h1 id="title">Binary Decision Tree</h1>
      <div id="back-view" class="hidden">
        <button id="back-btn"><</button>
        <h2 id="sub-title">temp</h2>
        <div class="temp">></div>
      </div>
      <hr>
      <div id="main-view">
        <button id="start-btn">start</button>
        <button id="about-btn">about</button>
        <button id="sources-btn">sources</button>
      </div>

      <div id="game-view" class="hidden">
        <pre>
          <p id="questionText">some test text</p>
          <form>
            <button type="button" onclick="acceptClick()">Accept</button>
            <button type="button" onclick="refuteClick()">Refute</button>
          </form>
          <div id="newNodeBox">
            <p id="nodeBoxPara">Enter your question and answer</p>
            <form>
              question:<input type="text" onkeyup="recordQuestion(this.value)" value="What is life?">
              answer:<input type="text" onkeyup="recordAnswer(this.value)" value="It is meaningless">
              <button type="button" onclick="makeNewNode()">Submit</button>
            </form>
        </div>
          <script>
            function acceptClick() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                  //There are no more question nodes, the player must now input a new question
                  var response = this.responseText;
                  if(response == "KAIBA SUMMONS BLUE EYES WHITE DRAGON^^") {
                    document.getElementById("questionText").innerHTML = "You now have 0 lp";
                    endQuestions();
                  } else {
                    var response = JSON.parse(this.responseText);
                    document.getElementById("questionText").innerHTML = response.question;
                  }
                }
              };
              xhttp.open("GET","accept.php",true);
              xhttp.send();
            }
            function refuteClick() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                  var response = this.responseText;
                  if(response == "KAIBA SUMMONS BLUE EYES WHITE DRAGON^^") {
                    document.getElementById("questionText").innerHTML = "You now have 0 lp";
                    endQuestions();
                  } else {
                    var response = JSON.parse(this.responseText);
                    document.getElementById("questionText").innerHTML = response.question;
                  }
                }
              };
              xhttp.open("GET","refute.php",true);
              xhttp.send();
            }
            function endQuestions() {
              var endBox = document.getElementById("newNodeBox");
              if(endBox.style.display === "none") {
                endBox.style.display = "block";
              } else {
                endBox.style.display = "none";
              }
            }
            function recordQuestion(str) {
              if(str.length == 0) {
                document.getElementById("nodeBoxPara").innerHTML = " ";
                return;
              } else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if(this.readyState == 4 && this.status == 200) {
                    document.getElementById("nodeBoxPara").innerHTML = this.responseText;
                  }
                };
                xhttp.open("GET", "add.php?q="+str, true);
                xhttp.send();
              }
            }
            function recordAnswer(str) {
              if(str.length == 0) {
                document.getElementById("nodeBoxPara").innerHTML = " ";
                return;
              } else {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if(this.readyState == 4 && this.status == 200) {
                    document.getElementById("nodeBoxPara").innerHTML = this.responseText;
                  }
                };
                xhttp.open("GET", "addd.php?q="+str, true);
                xhttp.send();
              }
            }
            function makeNewNode() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                  document.getElementById("nodeBoxPara").innerHTML = this.responseText;
                  endQuestions();
                }
              };
              xhttp.open("GET", "sendQ.php", true);
              xhttp.send();
            }
          </script>
        </pre>
      </div>

      <div id="about-view" class="hidden">
        <p>
          -Written Danhiel Vu and Long Nguyen
          -This is inspired by Akinator https://en.akinator.com/ with the main difference being that
          users can add new leaf nodes if they do not find their desired answer
          -This program uses a binary decision tree that can be traversed to find the answers
          -To play the game, think up some idea and continue to answer the questions until you reach
          an end node. If you are unsatisfied with the answer, then add your own question and answer
          to the existing tree!
        </p>
      </div>

      <div id="sources-view" class="hidden">
        <ul>
          <li><a href="https://icons8.com/icon/467/github">GitHub icon by Icons8</a></li>
          <li><a href="https://icons8.com/icon/48841/instagram">Instagram icon by Icons8</a></li>
          <li><a href="https://icons8.com/icon/3869/linkedin">LinkedIn icon by Icons8</a></li>
        </ul>
      </div>
      <hr>
      <div id="contacts">
        <img src="https://img.icons8.com/metro/20/000000/github.png" alt="Github Icon">
        <img src="https://img.icons8.com/metro/20/000000/instagram-new.png" alt="Instagram Icon">
        <img src="https://img.icons8.com/android/20/000000/linkedin.png" alt="Linkedin Icon">
      </div>
    </section>
  </body>
</html>
