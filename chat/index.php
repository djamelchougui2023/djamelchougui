<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header("Location: users.php");
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
    
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form enctype="multipart/form-data" action="#">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First name</label>
                        <input type="text" name="fname" id="" placeholder="Enter your First name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text" name="lname" id="" placeholder="Enter your Last name" required>
                    </div>
                </div>
                    <div class="field input">
                        <label for="">Email Adress</label>
                        <input type="email" name="email" id="" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" placeholder="Enter new password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field input image">
                        <label for="">Select Image</label>
                        <input type="file" name="image" >
                        
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chat" >
                    </div>
               
            </form>
            <div class="link">
              Already signed up? <a href="login.php">Login now</a>  
            </div>
        </section>
    </div>

  <script src="assets/js/signup.js"></script>
    <script src="assets/js/pass-show-hide.js"></script>
  
</body>

</html>