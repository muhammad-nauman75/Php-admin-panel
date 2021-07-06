<?php
$server = 'localhost';
$user = 'root';
$pwd = '';
$dbName = 'larsmobile';

$conn = new mysqli($server, $user, $pwd, $dbName);

// if($conn->connect_error){
//   echo 'Not connected '. $conn->connect_error;
// }else {
//   echo 'connected success';
// }

//--------create category---------------
$name = '';
$update = '';



if(isset($_GET['submit'])){


  $addCate = $_GET['add-cate'];
  //$addPro = $_GET['add-pro'];

  //--------------empty check ----------
  if(empty($addCate)){
    echo '<div class="alert alert-warning" role="alert">
    Please fill the field.
  </div>';
  } else {

  //--------------Unique Check-------
  $sql1 = "SELECT * FROM categories WHERE c_name = '$addCate'";
  $result2 = $conn->query($sql1);
    if($result2->num_rows > 0){
      echo '<div class="alert alert-warning" role="alert">
      Category already exist.
    </div>';
    } else {
     
  
//-------------insert data into database--------
  $stmt = $conn->prepare("INSERT INTO categories (c_name) VALUES (?)");
  $stmt->bind_param("s", $addCate);
  $stmt->execute();
  echo '<div class="alert alert-success" role="alert">
  Category has been added.
</div>';
    }
}
}


//--------display data on page-------
function displayList(){
  include 'database.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
if($result->num_rows > 0){
  echo '
  <table class="table container">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Categories</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
  ' ;
  while($row = $result->fetch_assoc()){
    echo '    
        <tr>
          <td>' .$row["c_id"]. '</td>
          <td>'.$row["c_name"].'</td>
          <td><a href="categories.php?edit='.$row["c_id"].'" class="btn btn-dark">Edit</a>
          
          <td><a href="categories.php?delete='.$row["c_id"].'" class="btn btn-danger">Delete</a>
        </tr>      
    ';
  }
  echo "</tbody>
  </table>";
}else {
  echo '<div class="alert alert-warning" role="alert">
  Something went wrong.
</div>';
}
}




//------------Category sum function------------
// function catSum(){
//   include 'database.php';

//   $sql = 'SELECT sum(p_quantity) as numofrows FROM categories';
//   $result = $conn->query($sql);
//   if($result->num_rows > 0){
//     while($row = $result->fetch_assoc()){
//       echo $row['numofrows'];
//     }
//   }
// }
//catCount();

//--------detete category--------
if(isset($_GET['delete'])){

  $id = $_GET['delete'];
  $sql = "DELETE FROM categories WHERE c_id=$id";

  if($conn->query($sql)){
    echo '<div class="alert alert-danger" role="alert">
    Category has been deleted.
  </div>';
  //header('Location: products.php');
  }else {
    echo 'somehing went wrong'.$conn->error;
  }

}

//----------edit category-------
if(isset($_GET['edit'])){
  include "database.php";
  
  $id = $_GET['edit'];
  $update = true;
  

    $sql = "SELECT * FROM categories WHERE c_id=$id";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      
      $row = $result->fetch_assoc();

      //$id = $row['c_id'];
      $name = $row['c_name'];
      
      
      //echo $name. $cat.$model.$quan.$price;
      
    }
}

//-----------update category-------
if(isset($_GET["update"])){
  include 'database.php';

  $id = $_GET['c-id'];
  $name = $_GET['add-cate'];
  



  $sql = "UPDATE categories SET c_name='$name' WHERE c_id=$id;";
  // echo $sql;
  // exit();

  if($conn->query($sql)){
    echo '<div class="alert alert-info" role="alert">
    Category has been updated.
  </div>';
  }else {
    echo '<div class="alert alert-warning" role="alert">
    Something went wrong.
  </div>'.$conn->error;
  }

}




