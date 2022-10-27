<?php
session_start();
if (isset($_SESSION['unique_id'])) {
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
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-text"></div>

                <div class="field input">
                    <label for="">Email Adress</label>
                    <input type="email" name="email" id="" placeholder="Enter your email" autocomplete="false">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" placeholder="Enter your password" autocomplete="false">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>

            </form>
            <div class="link">
                Not yet signed up? <a href="index.php">Signup now</a>
            </div>
        </section>
    </div>
    <script src="assets/js/login.js"></script>
    <script src="assets/js/pass-show-hide.js"></script>
</body>

</html>