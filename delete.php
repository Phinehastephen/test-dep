<?php
$conn = new mysqli('localhost', 'Stephen', 'M@rtyr18', 'project');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $stmt = $conn->prepare('DELETE FROM olamide WHERE id = ?');
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header('Location: db.php');
        exit;
    } else {
        $err = $stmt->error;
        $stmt->close();
        $conn->close();
        die('Delete failed: ' . $err);
    }
} else {
    $conn->close();

}
?>