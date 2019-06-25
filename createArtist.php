<?php
include_once './config/database.php';
 $table='artist';
$name=$_POST['name'];
$image=$_POST['image'];
$query='INSERT INTO '.$table.' (name,picture) VALUES(:name,:image)';
if($stmt=$pdo->prepare($query))
{
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':image',$image);
  if($stmt->execute())
  {
    $response['Message']='Artist created';
    echo json_encode($response);
  }
  else
  {
    $response['Message']='Error occured';
    echo json_encode($response);
  }
}
 ?>
