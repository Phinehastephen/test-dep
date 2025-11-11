<?php
$conn = mysqli_connect('localhost', 'Stephen', 'M@rtyr18', 'project');
if (!$conn) {
    die('Connection error: ' . mysqli_connect_error());
}

// Select id plus other columns (required for delete)
$sql = 'SELECT id, Surname, FName, Mname, Mnum, Dept, Sex, Age FROM olamide';
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Query error: ' . mysqli_error($conn));
}

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>olamide</title>
    <style>
        body { font-family: Arial, sans-serif; padding:20px; background:#f5f5f5;}
        .grid { display:flex; flex-wrap:wrap; gap:16px;}
        .card { background:#fff; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,.1); padding:16px; width:260px; position:relative;}
        .card h3 { margin:0 0 8px; font-size:18px;}
        .card p { margin:4px 0; font-size:14px; color:#333;}
        .meta { font-size:13px; color:#666; margin-top:8px;}
        .delete-form { position:absolute; top:10px; right:10px; }
        .delete-btn { background:#e74c3c; color:#fff; border:none; padding:6px 8px; border-radius:4px; cursor:pointer; font-size:12px;}
        .delete-btn:hover { background:#c0392b; }
    </style>
    <script>
        function confirmDelete(form) {
            return confirm('Delete this record? This action cannot be undone.');
        }
    </script>
</head>
<body>
    <h2>olamide records</h2>

    <?php if (!empty($rows)): ?>
    <div class="grid">
        <?php foreach ($rows as $row): ?>
            <div class="card">

                <h3><?php echo htmlspecialchars($row['Surname'] . ' ' . $row['FName'] . ' ' . $row['Mname']); ?></h3>
                <p><strong>Contact:</strong> <?php echo htmlspecialchars($row['Mnum']); ?></p>
                <p class="meta">
                    <strong>Dept:</strong> <?php echo htmlspecialchars($row['Dept']); ?><br>
                    <strong>Sex:</strong> <?php echo htmlspecialchars($row['Sex']); ?><br>
                    <strong>Age:</strong> <?php echo htmlspecialchars($row['Age']); ?>
                </p> <br>
                <form class="delete-form" method="post" action="delete.php" onsubmit="return confirmDelete(this);">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</body>
</html>
<?php require('delete.php') ?>