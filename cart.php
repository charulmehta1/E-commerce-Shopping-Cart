<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
.asdf { 
            padding-top: 120px;
        }
		.contenttt{ 
    min-height: 700px;
}
		</style>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="content">
            <?php include 'includes/header.php'; ?>
            <div class="row decor_bg asdf contenttt">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
    
                        <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $customerQuery = "SELECT * from users WHERE id=".$user_id;

                        $query = "SELECT count('id') as  `quantity` ,SUM(items.price) as `total`, items.price AS Price, items.id, items.name AS Name , users_items.id as order_id FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Added to cart' GROUP BY users_items.item_id";
                        //echo $query;
						//exit; 
						$result = mysqli_query($con, $query)or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Item Number</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Quantity </th>
                                    <th> Total </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    $sum+= $row["Price"];
                                    $id .= $row["id"] . ", ";
                                    echo "<tr><td>" . "#" . $row["id"]. "</td><td>" . $row["Name"] . "</td><td>&#x20b9; " . $row["Price"] . "</td><td>" .$row['quantity']."</td><td>&#x20b9; " .$row['total']."</td> <td><a href='cart-remove.php?id={$row['order_id']}' class='remove_item_link'> Remove</a></td><td><a href='cart-delete.php?id={$row['id']}' class='remove_item_link'> Delete</a></td></tr>";
                                }
                                $id = rtrim($id, ", ");
                               // echo "<tr><td></td><td>Total</td><td>Rs " . $sum . "</td><td><a href='success.php?itemsid=" . $id . "' class='btn btn-primary'>Confirm Order</a></td></tr>";
                                ?>
                                <tr><td colspan="3">Total</td><td colspan="4">&#x20b9;<?php echo $sum;?></td></tr>
                            </tbody>
                            <?php
                        $customer = mysqli_query($con, $customerQuery)or die($mysqli_error($con));
                        $row1 = mysqli_fetch_array($customer);
                       ?>
                       
                       <?php
                        } else {
                            echo "Add items to the cart first!";
                        }
                        ?>
                        <?php
                        ?>
                    </table>
                    <form action="pay.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control" required name="name" value="<?php echo $row1['name']; ?>" id="" placeholder="name" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" required name="purpose" value="shopping" id="" placeholder="purpose" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" required name="email" value="<?php echo $row1['email']; ?>" id="" placeholder="email" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" required name="amount" value="<?php echo $sum; ?>" id="" placeholder="amount" />
                            <input type="hidden" name="item_id" value="<?php echo $id ?>"/>
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-block">
                            Proceed To Payment
                            </button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
         <!--Footer-->
         <?php
        include 'includes/footer.php';
        ?>
        <!--Footer end-->
    </body>
</html>