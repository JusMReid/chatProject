<?php
  include 'db.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="styles.css" media="all">

    <script type="text/javascript">
      function ajax(){
        var req = new XMLHttpRequest();

        req.onreadystatechange = function(){
          if(req.readyState == 4 && req.status == 200){
            document.getElementById('chat').innerHTML = req.responseText;
          }
        }

        req.open('GET','chat.php',true);
        req.send();
      }

      setInterval(function(){ajax()},1000);

    </script>
  </head>
  <body onload="ajax();">

    <div class="container">
      <div class="chat_box">
        <div id="chat"></div>
      </div>

      <form class="" action="index.php" method="post">
        <input type="text" name="name" placeholder="enter name" value="">

        <textarea name="msg" placeholder="enter message"></textarea>

        <input type="submit" name="submit" value="Send it">

      </form>
      <?php
      if (isset($_POST['submit'])) {
        // code...
        $name = $_POST['name'];
        $message = $_POST['msg'];

        $query = "INSERT INTO chat(name, message) values ('$name', '$message')";

        $run = $conn->query($query);

        if($run){
          echo "<embed loop='false' src='chat.way' hidden='true' autoplay='true' />";
        }

      }

        ?>

    </div>
  </body>
</html>
