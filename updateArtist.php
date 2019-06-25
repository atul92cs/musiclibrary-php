<?php
 include_once './config/database.php';
 $table='artist';
 $id=$_GET['id'];
 $name=$_POST['name'];
 $image=$_POST['image'];

 $query='UPDATE artist SET name=:name,picture=:image WHERE id=:id';
 $stmt=$pdo->prepare($query);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':image',$image);
 $stmt->bindParam(':id',$id);
  if($stmt->execute())
  {
    $response['Message']='Artist updated';
    echo json_encode($response);
  }
  else {
    $response['Message']='Error occured';
    echo json_encode($response);
  }
   ?>
