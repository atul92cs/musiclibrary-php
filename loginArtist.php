<?php
 include_once './config/database.php';
 $table='artist';
 $name=$_POST['name'];
 $image=$_POST['image'];
 $query='SELECT * FROM '.$table.' where name =:name and picture =:image';
 if($stmt=$pdo->prepare($query))
 {
   $stmt->bindParam(':name',$name);
   $stmt->bindParam(':image',$image);
   $stmt->execute();
   $result=$stmt->rowCount();
   if($result>0)
   {
     $message['result']='logged in';
     echo json_encode($message);
   }
   else {
     $message['result']='wrong password or username';
     echo json_encode($message);
   }
 }
 ?>
