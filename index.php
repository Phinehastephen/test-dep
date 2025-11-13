<?php 
include ('send.php');
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
     <style>
        h1.a {
            color: black;
            text-decoration: none;
        }
           a{
    color: black;
    text-align: center;
    text-decoration: none;
    
}
    </style>
</head>
<body>
     <nav>
        <h1 cl><a href="db.php">Olamide</a></h1>
    </nav>

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

    <footer>
        <a href="#"><h3 class= "text-center">Student's Data</h3></a>
    </footer>
</body>
</html>