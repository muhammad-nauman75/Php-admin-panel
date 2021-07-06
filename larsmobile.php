<?php
include "header.php";
include "includes/larsmobile.inc.php";

?>
<div class="container">
<h2>Total Categores Found: <?php echo catCount();?></h2>
<table class="table container">
      <thead class="table-dark">
        <tr>
          
          <th scope="col">Category Name</th>
          <th scope="col">Total Products</th>
          <th scope="col">Avaliable Stock</th>
          <th scope="col">Sold Products</th>
        </tr>
      </thead>
      <tbody>
      <tbody>
        <tr>
         
          <td><?php echo catName(); ?></td>
          <td></td>
          
        </tr>
      </tbody>
    </table>
   
    </div>
  </body>
</html>
