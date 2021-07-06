
<?php
include "header.php";
include "includes/dbh.inc.php";

?>

<div class="container">
      <h2>Categories</h2>
      <form class="form-inline" action="" method="GET">
        <input type="hidden" name="c-id" value = "<?php echo $id?>">
        <div class="form-group">
          <label for="category">Add new category</label>
          <input
            type="text"
            class="form-control"
            value="<?php echo $name;?>";
            placeholder="Enter Category Name here"
            name="add-cate"
          />
        </div>
        <?php if($update): ?>
          <button class="btn btn-dark" type="submit" name="update">Update</button>
        <?php else : ?>

        <button type="submit" name="submit" class="btn btn-primary">Add</button>
        <?php endif ;?>
      </form>
      <br>
    </div>
    <?php
    
displayList();
?>










<?php
include "footer.php";
?>