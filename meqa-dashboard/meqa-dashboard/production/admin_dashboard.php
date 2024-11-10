<?php
if (isset($_GET['message'])) {
    echo "<div class='alert alert-success'>" . htmlspecialchars($_GET['message']) . "</div>";
}
if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['error']) . "</div>";
}
?>


<!-- Order Status Update Form -->
<form action="update_status.php" method="POST" class="d-inline">
    <select name="order_status" class="form-select form-select-sm" style="width: 120px;">
        <option value="Pending" <?php if($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="Processing" <?php if($row['status'] == 'Processing') echo 'selected'; ?>>Processing</option>
        <option value="Completed" <?php if($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
    </select>
    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
    <button type="submit" class="btn btn-sm btn-success mt-1"><i class="fas fa-sync-alt"></i> Update</button>
</form>
