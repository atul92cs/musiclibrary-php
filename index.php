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
          <th>Action</th>
        </tr>

          <?php foreach($artist as $people):?>
             <tr>
            <th ><?=$people->id;?></th>
            <th><?=$people->name;?></th>
            <th><?=$people->picture;?></th>
            <th><button onclick="deleteuser(event)">Delete</button></th>
            <?php endforeach; ?>
            </tr>



      </table>

    </div>
    <script>
    deleteuser=(e)=>{
      let user=e.target.parentElement.parentElement.firstElementChild.innerHTML;
      //console.log(user);
      let url='./deleteArtist.php/?id='+user;
      const xhr=new XMLHttpRequest();
      xhr.open('DELETE',url,true);
      xhr.onload=()=>{
        if(xhr.readyState===4||xhr.status===4)
        {
          alert('artist deleted');
          window.location.reload();
        }
        else {
          alert('error occured');
          window.location.reload();
        }
      }
      xhr.send(null);
    }

    </script>
  </body>
</html>
