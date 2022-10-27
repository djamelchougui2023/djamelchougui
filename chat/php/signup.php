<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email= '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo  "$email - This email already exist!";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extentions = ['jpeg', 'jpg', 'png'];
                if (in_array($img_ext, $extentions)) {

                    $time = time();
                    $new_img_name = $time . $img_name;

                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = "Active now";
                        $random_id = rand(time(), 10000000);
                        $password_Hash = password_hash($password, PASSWORD_DEFAULT);
                        // INSERT DATA IN TABLE USERS
                        $query = mysqli_query($conn, "INSERT INTO users (fname, lname, email, password, image, unique_id, status)
                                                                 VALUES ('{$fname}', '{$lname}', '{$email}', '{$password_Hash}', '{$new_img_name}', {$random_id}, '{$status}')");
                          if($query){
                              $query2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' LIMIT 1");
                              if(mysqli_num_rows($query2)> 0){
                                $row = mysqli_fetch_assoc($query2);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                              }
                          } else{
                            echo "Something went wrong!";
                          }                                      
                    }
                } else {
                    echo "Please select an image file - jpg, jpeg, png!";
                }
            } else {
                echo "Please select an image file!";
            }
        }
    } else {
        echo  "$email - This is not valide email!";
    }
} else {
    echo "All input fields are required !";
}
