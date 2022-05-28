<style>
.qwerfg { 
            padding-top: 100px;
            padding-bottom: 10%; 
        }
</style>


<?php
require("includes/common.php");

//update product
if($_GET['id']){                                                
    $product ="SELECT * FROM `items` WHERE `id` = ".$_GET['id'];
    $q = mysqli_query($con,$product)or die(mysqli_error($con));
    $r = mysqli_num_rows($q);
    $product = mysqli_fetch_array($q);
    if (isset($_POST['name'])) {
        $target_file =$product['image_name'];

        if(isset($_FILES)){
            $target_dir = "img/";
             $target_file = $target_dir . basename($_FILES["image_name"]["name"]);
             var_dump($target_file);
             $uploadOk = 1;
             $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
             // Check if image file is a actual image or fake image
             if(isset($_POST["submit"])) {
             $check = getimagesize($_FILES["image_name"]["tmp_name"]);
             if($check !== false) {
                 echo "File is an image - " . $check["mime"] . ".";
                 $uploadOk = 1;
             } else {
                 echo "File is not an image.";
                 $uploadOk = 0;
             }
             }
             if (move_uploaded_file($_FILES["image_name"]["tmp_name"], $target_file)) {
                 echo "The file ". htmlspecialchars( basename( $_FILES["image_name"]["name"])). " has been uploaded.";
               } else {
                 echo "Sorry, there was an error uploading your file.";
             }
        }
         $name = $_POST['name'];
         $price = $_POST['price'];
 
         $query = "UPDATE `items` SET `name` = '$name' ,`price` = '$price' ,`image_name` = '$target_file' WHERE `items`.`id` = ".$product['id'];
         if(mysqli_query($con, $query)){
 
         }else{
             var_dump(mysqli_error($con));
         die(mysqli_error($con));
         }
         header('location: products.php');
         exit;
    }  
}

//create product
if (isset($_POST['name'])) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["image_name"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image_name"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }
        if (move_uploaded_file($_FILES["image_name"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image_name"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
        }
        $name = $_POST['name'];
        $price = $_POST['price'];

        $query = "INSERT INTO items(name, price, image_name) VALUES('$name', '$price', '$target_file')";
        if(mysqli_query($con, $query)){

        }else{
            var_dump(mysqli_error($con));
        die(mysqli_error($con));
        }
        header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login | Life Style Store</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include 'includes/header.php'; ?>
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row qwerfg">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>ADD ITEM</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Add</i><p>
                                <form action="product-add.php?id=<?=$product['id']?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input class="form-control"  placeholder="Name" name="name" required = "true" value = "<?= $product['name']?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Price" name="price" required = "true" value = "<?= $product['price']?>">
                                    </div>
                                    <div class="form-group">
                                        <?php echo $product['image_name'];?>
                                        <input type="file" class="form-control" placeholder="Image" name="image_name">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Add Product</button><br><br>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>
