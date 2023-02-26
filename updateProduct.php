<?php
include '../components/header.php';
include '../CRUD/Model.php';
$model = new Model();
$id = $_GET['id'];
$row = $model->editProduct($id);
$data = [];
if (isset($_POST['productSubmit'])) {
    $data['id'] = $id;
    $data['image'] = "../images/" .  $_FILES['image']['name'];
    $data['price'] = $_POST['price'];
    $data['modifikuarNga'] = $_SESSION['name'];
    
    $update_article = $model->updateProduct($data);

    if ($update_article) {
        echo "<script>alert('Product updated successfully');</script>";
        echo "<script>window.location.href = '../pages/dashboard.php';</script>";
    } else {
        echo "<script>alert('Product update failed');</script>";
        echo "<script>window.location.href = '../pages/dashboard.php';</script>";
    }
}
?>
    <div>
        <h2>Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="image">Product Image:</label><br>
            <input type="file" id="image" name="image" class="file-upload-button"><br>
            <label for="price">Product Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>"><br>
            <input class="button" name="productSubmit" type="submit" value="Update Product">
        </form>
    </div>
<?php
include '../components/footer.php';
?>