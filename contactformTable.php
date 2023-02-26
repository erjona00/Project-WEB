<table id="table">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
    </tr>
    <?php
    include '../CRUD/Model.php';
    if (!empty($contactForm)) {
        foreach ($contactForm as $row) {
    ?>
            <tr>
                <td><?php echo $row['contactName']; ?></td>
                <td><?php echo $row['contactEmail']; ?></td>
                <td><?php echo $row['contactMessage']; ?></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <td colspan="3">No forms submited yet</td>
    <?php
    }
    ?>
</table>