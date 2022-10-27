<?php

while($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_id = {$row['unique_id']} OR outgoing_id = {$row['unique_id']})
                                      AND (incoming_id = {$outgoing_id} OR outgoing_id  = {$outgoing_id})
                                      ORDER BY date DESC LIMIT 1 ";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    $you ='';
    $msg = '';
    if(mysqli_num_rows($query2)>0){
     $result = $row2["message"];
    (strlen($result)>28 ) ? $msg = substr($result,0,28).'...' : $msg = $result;
    ($outgoing_id == $row2['outgoing_id']) ? $you = "You: " : $you ="";
   

    }else{
        $result = "No message available";
    }
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
   
    $output .='<a href="chat.php?id='.$row['unique_id'].'">
                    <div class="content">
                        <img src="php/images/'.$row['image'].'" alt="">
                        <div class="details">
                            <span>'.$row['fname']. " " .$row['lname'].'</span>
                            <p>'.$you . $msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
             </a>';   
            
}
