<?php
  include 'db.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="styles.css" media="all">
  </head>
  <body>
    <div class="container">
      <div class="chat_box">

        <?php
          $query = "SELECT * FROM chat ORDER BY id DESC";
          $run = $conn->query($query);

          while($row = $run-> fetch_array()) :
         ?>

        <div class="chat_data">
          <span id="chatName"><?php echo $row['name']; ?></span> :
          <span id="chatMessage"><?php echo $row['message']; ?></span>
          <span id="chatTime"><?php echo formatDate($row['date']); ?></span>
        </div>

      <?php endwhile; ?>

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
