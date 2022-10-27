<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password)){
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' LIMIT 1");
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
        if(password_verify($password,$row['password'])){
        $status = "Active now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']} LIMIT 1");
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        }else{
            echo "Email or Password is incorrect!";
        }
    }else{
        echo "Email or Password is incorrect!";
    }

}else{
    echo "All input fields are required !";
}
