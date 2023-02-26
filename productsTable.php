<table id="table">
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Price</th>
        <th>Modifikuar Nga</th>
        <th>
            <a href="../CRUD/createProduct.php" style="color: white; "> Add product </a>
        </th>
    </tr>
    <?php
    if (!empty($products)) {
        foreach ($products as $row) {
    ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['image']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['modifikuarNga']; ?></td>
                <td>
                    <a href="../CRUD/updateProduct.php?id=<?php echo $row['id']; ?>">Edit</a>
                </td>
                <td>
                    <a style="color: red;" href="../CRUD/deleteProduct.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <td colspan="4">No products submited yet</td>
    <?php
    }
    ?>
</table>