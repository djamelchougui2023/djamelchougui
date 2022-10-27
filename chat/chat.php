<?php
session_start();
if(!isset($_SESSION['unique_id'])){
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat App</title>
    <link rel="stylesheet" href="assets/fontawesome/css/all.css" />
    <link rel="stylesheet" href="assets/style.css" />
  </head>
  <body>
  <?php
    include_once "php/config.php";
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id} LIMIT 1");
    if(mysqli_num_rows($sql)>0){
        $row = mysqli_fetch_assoc($sql);
    }
    ?>
    <div class="wrapper">
      <section class="chat-area">
        <header>
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/<?=$row['image']?>" alt="" />
          <div class="details">
            <span><?=$row['fname']. " " .$row['lname'] ?></span>
            <p><?=$row['status']?></p>
          </div>
        </header>
        <div class="chat-box">
           
           
        </div>
        <form class="typing-area" action="" autocomplete="off">
            <input type="hidden" name="outgoing_id" value="<?=$_SESSION['unique_id']?>">
            <input type="hidden" name="incoming_id" value="<?=$user_id?>">
            <input type="text" class="input-field" name="message"  placeholder="Type a message here...">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>
    <script src="assets/js/chat.js"></script>
  </body>
</html>
