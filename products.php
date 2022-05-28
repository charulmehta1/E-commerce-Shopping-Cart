<?php
require("includes/common.php");
?>
<!DOCTYPE html>
<html lang="en">
<style>
.main { 
            padding-top: 5%;
            
        }
</style>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?>
        <div class="container main" id="content">
            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to our Lifestyle Store!</h1>
                <p>We have the best cameras, watches, shirts and many more items for you. No need to hunt around, we have all in one place.</p>

            </div>

            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] ==1){?>
            <div class= "col-mb-4">
                <a href="product-add.php" name="add_product" value="add" class="btn btn-primary pull-right">Add product</a>
            </div>
            <hr>
            <div class="row text-center" id="cameras">
            <?php
            }
            $user_id = $_SESSION['user_id'];
                        $query = "SELECT * FROM `items`";
						$result = mysqli_query($con, $query)or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>

                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="col-md-3 col-sm-6 home-feature">
                                    <div class="thumbnail">
                                        <img src="<?=$row['image_name'] ?>" alt="">
                                        <div class="caption">
                                            <h3><?= $row['name']?> </h3>
                                            <p>Price: <?= $row['price']?> </p>
                                            <?php if (!isset($_SESSION['email'])) { 
                                                ?>
                                                
                                                <p><a href="login.php?redirect_to=cart-add.php?id=<?= $row['id'] ?>" role="button" class="btn btn-primary btn-block">Buy Now</a>
                                                <p> <a href="login.php?redirect_to=cart-add.php?id=<?= $row['id'] ?>" role="button" class="btn btn-primary btn-block">Add to Cart</a></p>
                                                <?php
                                            } else {
                                                $i =$row['id'];
                                                $user_id = $_SESSION['user_id'];
                                                $qu ="SELECT count(`id`) as total FROM `users_items` WHERE `user_id` = ".$user_id." AND `item_id` = ".$i;
                                                $q = mysqli_query($con,$qu)or die(mysqli_error($con));
                                                $r = mysqli_num_rows($q);
                                                $e = mysqli_fetch_array($q);
                                                // echo 'Quantity'. $e['total'];
                                                //We have created a function to check whether this particular product is added to cart or not.
                                                if (check_if_added_to_cart($row['id'])) { //This is same as if(check_if_added_to_cart != 0)
                                                echo '<a href="cart-add.php?id='.$row['id'] .'" class="btn btn-block btn-success" enabled >Added to cart</a>';
                                                } else { 
                                                    ?>
                                                    <a href="cart-add.php?id=<?=$row['id']?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                                    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_type'] ==1){?>
                                                        <a href="product-add.php?id=<?=$row['id']?>" name="add_product" value="add" class="btn btn-block btn-primary">Update product</a>
                                                    

                                                    <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </tbody>
                            <?php
                        } else {
                            echo "Add items to the cart first!";
                        }
            ?>
            </div>
            <hr>
        </div>

        <?php include("includes/footer.php"); ?>
    </body>

</html>
