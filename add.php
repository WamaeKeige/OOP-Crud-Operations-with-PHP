<?php
include_once 'includes/config.php';

$database = new Config();
$db = $database->getConnection();

include_once 'includes/data.inc.php';
$product = new Data($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorial-06</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body>
<p><br/></p>
<div class="container">
    <p>
        <a class="btn btn-primary" href="index.php" role="button">Back</a>
    </p><br/>
    <?php
    if ($_POST) {

        $product->name = $_POST['name'];
        $product->gender = $_POST['gender'];
        $product->contactNum = $_POST['contact'];
        $product->address = $_POST['address'];

        if ($product->create()) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Success!</strong>  <a href="index.php">View Data</a>.
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Fail!</strong>
            </div>
            <?php
        }
    }
    ?>
    <form method="post">
        <div class="form-group">
            <label for="nm">Name</label>
            <input type="text" class="form-control" id="nm" name="name">
        </div>
        <div class="form-group">
            <label for="gd">Gender</label>
            <input type="text" class="form-control" id="gd" name="gender">
        </div>
        <div class="form-group">
            <label for="tl">Phone</label>
            <input type="text" class="form-control" id="tl" name="contact">
        </div>
        <div class="form-group">
            <label for="ar">Address</label>
            <textarea class="form-control" rows="3" id="ar" name="address"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>