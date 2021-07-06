
<?php
include "header.php";
include "includes/products.inc.php";

?>

<div class="container">
      <h2>Products</h2>
      <a class="btn btn-primary" href="add_product.php">Add new product</a>
        
    </div>
    <br>

    <table class="table container">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product</th>
          <th scope="col">Model</th>
          <th scope="col">Category</th>
          <th scope="col">Price</th>
          <th scope="col">Stock</th>
          <th scope="col">Sold</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <!-- Display List -->
        <?php
        displayList();
        ?>
      </tbody>
    </table>









<?php
include "footer.php";
?>