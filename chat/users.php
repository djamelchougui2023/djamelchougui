<?php
session_start();
if(!isset($_SESSION['unique_id'])){
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<?php
include_once "php/config.php";
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']} LIMIT 1");
if(mysqli_num_rows($sql)>0){
    $row = mysqli_fetch_assoc($sql);
}
?>
    
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                <img src="php/images/<?=$row['image']?>" alt="">
                <div class="details">
                    <span><?=$row['fname']. " " .$row['lname'] ?></span>
                    <p><?=$row['status']?></p>
                </div>
                </div>
                <a href="php/logout.php?logout_id='<?=$row['unique_id']?>'" class="logout">Logout</a>
            </header>
            <div class="search">
               <span class="text">Select an user to star chat</span> 
               <input type="text" name="" id="" placeholder="Enter name to search...">
               <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
               
            </div>
        </section>
    </div>
    <script src="assets/js/users.js"></script>
</body>
</html>