<?php
include_once 'includes/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('Need Product ID');

$database = new Config();
$db = $database->getConnection();

include_once 'includes/data.inc.php';
$product = new Data($db);

$product->id = $id;
$product->readOne();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorial-06</title>
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
if($_POST){

	$product->name = $_POST['name'];
	$product->gender = $_POST['gender'];
	$product->contactNum = $_POST['contact'];
	$product->address = $_POST['address'];
	
	if($product->update()){
?>
<script>window.location.href='index.php'</script>
<?php
	}else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Fail!</strong>
</div>
<?php
	}
}
?>
<form method="post">
  <div class="form-group">
    <label for="nm">Name</label>
    <input type="text" class="form-control" id="nm" name="name" value='<?php echo $product->name; ?>'>
  </div>
  <div class="form-group">
    <label for="gd">Gender</label>
    <input type="text" class="form-control" id="gd" name="gender" value='<?php echo $product->gender; ?>'>
  </div>
  <div class="form-group">
    <label for="tl">Phone</label>
    <input type="text" class="form-control" id="tl" name="contact" value='<?php echo $product->contactNum; ?>'>
  </div>
  <div class="form-group">
    <label for="ar">Address</label>
    <textarea class="form-control" rows="3" id="ar" name="address"><?php echo $product->address; ?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>