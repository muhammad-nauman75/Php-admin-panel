<?php
include "database.php";

//------------Product count function------------
// function proCount(){
//   include 'database.php';

//   $sql = "SELECT COUNT(p_id) as numofrows FROM products WHERE p_category ='samsung' ";
//   $result = $conn->query($sql);
//   if($result->num_rows > 0){
//     while($row = $result->fetch_assoc()){
//       echo $row['numofrows'];
//     }
//   }
// }

//--------Stock and sold products-------
function catName(){
  include 'database.php';

$sql = "SELECT * FROM categories";
//$sql2 = "SELECT COUNT(p_id) as numofrows FROM products WHERE p_category = '$row["c_name"]' ";
$result = $conn->query($sql);
if($result->num_rows > 0){  
  while($row = $result->fetch_assoc()){
    
    $cat = $row["c_name"];
    
    
    $sql2 = "SELECT COUNT(p_id) as numofrows2 FROM products WHERE p_category = '$cat' ";
    

    $result2 = $conn->query($sql2);
    if($result2->num_rows > 0){
      while($row2 = $result2->fetch_assoc()){
        $products= $row2['numofrows2'];
      }
    }
    echo '    
        <tr>
          
          <td>'. $cat .'</td>
          <td>'. $products .'</td>
                 
          
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

//------------Category count function------------
function catCount(){
  include 'database.php'; 

  $sql = 'SELECT COUNT(c_id) as numofrows FROM categories';
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      echo $row['numofrows'];
    }
  }
}