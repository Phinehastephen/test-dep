<?php 
// Database configuration
$host = getenv('MYSQLHOST') ?: 'localhost';
$user = getenv('MYSQLUSER') ?: 'Stephen';
$pass = getenv('MYSQLPASSWORD') ?: 'M@rtyr18';
$db   = getenv('MYSQLDATABASE') ?: 'project';
$port = getenv('MYSQLPORT') ?: 3306;

// Create connection
$conn = new mysqli($host, $user, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO olamide (Surname, FName, Mname, Mnum, Dept, Sex, Age) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sssssss", $Surname, $FName, $Mname, $Mnum, $Dept, $Sex, $Age);

    // Set parameters from POST data
    $Surname = $_POST['Surname'] ?? '';
    $FName = $_POST['FName'] ?? '';
    $Mname = $_POST['Mname'] ?? '';
    $Mnum = $_POST['Mnum'] ?? '';
    $Dept = $_POST['Dept'] ?? '';
    $Sex = $_POST['Sex'] ?? '';
    $Age = $_POST['Age'] ?? '';

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record added successfully";
        header("Location: db.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

$placed = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        
        $placed = "New data successfully placed 🙂🙂🙂"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olamide</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include('header.php'); ?>

    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <div class="form-group">
                <label for="title"><strong>Surname:</strong></label>
                <input type="text" class="form-control" id="Surname" name="Surname" required>
            </div>
        
            <div class="form-group">
                <label for="ingredients"><strong>First-Name:</strong></label>
                <input type="text" class="form-control" id="FName" name="FName" required>
            </div>

            <div class="form-group">
                <label for="customer"><strong>Middle-name:</strong></label>
                <input type="text" class="form-control" id="Mname" name="Mname" required>
            </div>

            <div class="form-group">
                <label for="house"><strong>Matric-number:</strong></label>
                <input type="text" class="form-control" id="Mnum" name="Mnum" required>
            </div>

            <div class="form-group">
                <label for="house"><strong>Department:</strong></label>
                <input type="text" class="form-control" id="Dept" name="Dept" required>
            </div>

            <div class="form-group">
                <label for="house"><strong>Sex:</strong></label>
                <input type="text" class="form-control" id="Sex" name="Sex" required>
            </div>

            <div class="form-group">
                <label for="house"><strong>Age:</strong></label>
                <input type="text" class="form-control" id="Age" name="Age" required>
            </div>


            <div class="text-center">
                <input type="submit" id="submit" name="submit" value="Add Data" class="btn btn-primary">
            </div><br><br>
        </form>

        <?php if ($placed): ?>
            <div class="alert alert-success text-center">
                <?php echo $placed; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>