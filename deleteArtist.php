<?php
 include './config/database.php';
 $id=$_GET['id'];
 $table='artist';
 $query='DELETE FROM '.$table.' WHERE id=:id';
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':id',$id);
 if($stmt->execute())
 {
   $response['Message']='Artist deleted';
   echo json_encode($response);
 }
 else {
   $response['Message']='Error oocured';
   echo json_encode($response);
 }
 ?>
