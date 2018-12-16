<?php
  include 'db.php';

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
