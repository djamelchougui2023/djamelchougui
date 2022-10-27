<?php
session_start();
if(isset($_SESSION['unique_id'])){
include_once "config.php";
$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
$output = '';
$query = mysqli_query($conn, "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.incoming_id
                                                        WHERE (incoming_id = {$incoming_id} AND outgoing_id = {$outgoing_id})
                                                        OR (incoming_id = {$outgoing_id} AND outgoing_id = {$incoming_id}) ORDER BY date ASC");
if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){
        if($row['outgoing_id'] === $outgoing_id){
        $output .='<div class="chat outgoing">
                        <div class="details">
                            <p>'.$row['message'].'</p>
                        </div>
                    </div>';
        }else{
            $output .=' <div class="chat incoming">
                            <img src="php/images/'.$row['image'].'" alt="">
                            <div class="details">
                                <p>'.$row['message'].'</p>
                            </div>
                        </div>';   
        }
    }
}else{
    $output .='';
}
echo $output;


}else{
    header('Location : ../login.php');
}
