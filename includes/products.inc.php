<?php
$name = "";
$cat = "";
$model = "";
$quan = "";
$price = "";
$id = 0;


$update = false;

//---------Dropdown options function
function select(){
  include 'database.php';
$sql = "SELECT c_name FROM categories";
$result = $conn->query($sql);
if($result->num_rows > 0){
  echo '
      <select class="form-select col" name="p-select" aria-label="Categories">
      <option >Select Category</option>
    ' ;
  while($row = $result->fetch_assoc()){
    echo '    
    <option value="'.$row['c_name'].'">'.$row['c_name'].'</option>
   ' ;
  }
  echo '</select>';
}
}

//--------------Add Product-------------

if(isset($_GET['submit'])){



  include_once 'database.php';
  $name = $_GET['p-name'];
  $model = $_GET['p-model'];
  $select = $_GET['p-select'];
  $price = $_GET['p-price'];
  $quantity = $_GET['p-stock'];

  if(empty($name) || empty($model) || empty($select) || empty($price) || empty($quantity)){
    echo '<div class="alert alert-warning" role="alert">
    Please fill all the fields.
  </div>';
  }else {

  $stmt = $conn->prepare("INSERT INTO products (p_name, p_model, p_quantity, p_category, p_price) VALUES (?,?,?,?,?)");
  $stmt->bind_param('sssss', $name, $model,$quantity, $select, $price );
  $stmt->execute();
  
  echo '<div class="alert alert-success" role="alert">
  Product has been added.
</div>';

  
}
}

//----------------Display list function---------------

function displayList(){
  include 'database.php';
  $sql = 'SELECT p_id, p_name, p_model, p_quantity, p_sold, p_category, p_price FROM products';
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
      echo 
      '<tr>
          <th scope="row">'.$row['p_id'].'</th>
          <td>' .$row['p_name']. '</td>
          <td>' .$row['p_model']. '</td>
          <td>' .$row['p_category']. '</td>
          <td>' .$row['p_price']. '</td>
          <td>' .$row['p_quantity']. '</td>
          <td>' .$row['p_sold']. '</td>
          <td><a href="products.php?sell='.$row["p_id"].'" class="btn btn-success">Sell</a> </td>
          
          <td>
          <a href="add_product.php?edit='.$row["p_id"].'" class="btn btn-dark">Edit</a> 
          <a href="products.php?delete='.$row["p_id"].'" class="btn btn-danger">Delete</a> </td>
        </tr>';
    }


  }
}

//------------Product count function------------
function proCount(){
  include 'database.php';

  $sql = "SELECT COUNT(p_id) as numofrows FROM products WHERE p_category ='Samsung' ";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      echo $row['numofrows'];
    }
  }
}

//------------Product sum function------------
function proSum(){
  include 'database.php';

  $sql = 'SELECT sum(p_quantity) as numofrows FROM products';
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      echo $row['numofrows'];
    }
  }
}

//---------Product delete -----------------

if(isset($_GET['delete'])){
  include 'database.php';

  $id = $_GET['delete'];
  
  
 
  $sql = "DELETE FROM products WHERE p_id=$id"; 

  if($conn->query($sql)){
    echo '<div class="alert alert-danger" role="alert">
    Product has been deleted.
  </div>';
  //header('Location: products.php');
  }else {
    echo 'somehing went wrong'.$conn->error;
  }

}

//-------------Edit product----------------

if(isset($_GET['edit'])){
  include 'database.php';
  $id = $_GET['edit'];
  $update = true;
  

    $sql = "SELECT * FROM products WHERE p_id=$id";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      
      $row = $result->fetch_assoc();

      $id = $row['p_id'];
      $name = $row['p_name'];
      $cat = $row['p_category'];
      $model = $row['p_model'];
      $quan = $row['p_quantity'];
      $price = $row['p_price'];
      //echo $name. $cat.$model.$quan.$price;
      
    }
}

//-----------update product-------
if(isset($_GET["update"])){
  include 'database.php';

  $id = $_GET['p-id'];
  $name = $_GET['p-name'];
  $model = $_GET['p-model'];
  $select = $_GET['p-select'];
  $price = $_GET['p-price'];
  $quantity = $_GET['p-stock'];


  $sql = "UPDATE products SET p_name='$name', p_model='$model', p_category='$select', p_price='$price', p_quantity='$quantity'   WHERE p_id=$id;";
  // echo $sql;
  // exit();

  if($conn->query($sql)){
    echo '<div class="alert alert-info" role="alert">
    Product has been updated.
  </div>';
  }else {
    echo '<div class="alert alert-warning" role="alert">
    Something went wrong.
  </div>'.$conn->error;
  }

}

//------------Sell product---------
if(isset($_GET["sell"])){
  include 'database.php';

  $id = $_GET['sell'];
  
 


  $sql = "UPDATE products SET p_quantity=(p_quantity-1)   WHERE p_id=$id;";
  // echo $sql;
  // exit();

  if($conn->query($sql)){
    echo '<div class="alert alert-info" role="alert">
    Product sold.
    </div>';

      $sql2 = "UPDATE products SET p_sold=(p_sold + 1)   WHERE p_id=$id;";
      if($conn->query($sql2)){
        echo "inventory updated";
      }else {
        echo "somehing is wroing with inventory";
      }
  
  }else {
    echo '<div class="alert alert-warning" role="alert">
    Something went wrong.
  </div>'.$conn->error;
  }

}

