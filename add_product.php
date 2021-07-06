<?php
include 'header.php';
include 'includes/products.inc.php';
?>
<form>
  <div class="container">
  <input type="hidden" name="p-id" value = "<?php echo $id?>" >

      <div class="row mx-3 my-1">
          <div class="col text-right">
            <label class="text-right" for="name"  col-form-label">Product Name </label>
          </div>
          <div class="col-10">            
            <input type="text" class="form-control" name="p-name" value = "<?php echo $name?>" />
          </div>
      </div>

      <div class="row mx-3 my-1">
        <div class="col">
          <label for="Model"  col-form-label">Product Model </label>
        </div>
        <div class="col-10">
          <input type="text" class="form-control" name="p-model" value = "<?php echo $model; ?>"  />
        </div>

      <div class="row  my-1">
        <div class="col">
          <label for="Category"  col-form-label">Select Category </label>
        </div>        
          <div class="col-10">
            <!-- Options -->
            <?php select(); ?>
          </div>
      </div>      
        
      
      
      <div class="row  my-1">
        <div class="col">
          <label for="price"  col-form-label">Price</label>
        </div>
        <div class="col-4">
          <input
            type="number"
            class="form-control"
            name="p-price"
            value = "<?php echo $price; ?>""
            
          />
        </div>
        
        <div class="col">
          <label for="quantity"  col-form-label">Quantity </label>
        </div>
        <div class="col-4">
          <input type="number" class="form-control" name="p-stock" value = "<?php echo $quan ?>"  />
        </div>
      </div>
      <div class="row col-1">
        <?php if($update): ?>
          <button class="btn btn-dark" type="submit" name="update">Update</button>
        <?php else : ?>
        <button class="btn btn-dark" type="submit" name="submit">Add</button>
        <?php endif ;?>
      </div>
      </div>
    </form>
    <?php
    include 'footer.php';
    ?>
    
    