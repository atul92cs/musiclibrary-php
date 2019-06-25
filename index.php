<?php
 include_once './config/database.php';
 $table='artist';
 $query='SELECT * FROM '.$table.'';
 $stmt=$pdo->prepare($query);
 $result=$stmt->execute();
 if($result)
 {
   $artist=$stmt->fetchAll(PDO::FETCH_OBJ);
  // echo json_encode($artist);
 }
 else {
   $response['Message']='No data found';
   echo json_encode($response);
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <table>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>NickName</th>
        </tr>

          <?php foreach($artist as $people):?>
             <tr>
            <th><?=$people->id;?></th>
            <th><?=$people->name;?></th>
            <th><?=$people->picture;?></th>
            </tr>
          <?php endforeach; ?>


      </table>

    </div>
  </body>
</html>
