<?php
include '../components/header.php';
include '../CRUD/Model.php';
$model = new Model();
$model->createProduct();
?>
  <div>
    <h2>Create Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="image">Product Image:</label><br>
      <input type="file" id="image" name="image"><br>
      <label for="price">Product Price:</label><br>
      <input type="text" id="price" name="price"><br>
      <input class="button" name="productSubmit" type="submit" value="Create Product">
    </form>
  </div>
<?php
include '../components/footer.php';
?>