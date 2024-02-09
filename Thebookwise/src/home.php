<?php
	include_once 'header.php';
	require_once 'includes/dbh.php';
?>
<?php

    if(isset($_POST["add"])){
        if(isset($_SESSION["shopping_cart"])){
            $item_array_id = array_column($_SESSION["shopping_cart"],"product_id");
            if(!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'product_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'product_quantity' => $_POST["quantity"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                echo '<script>window.location="checkout.php"</script>';
            }else{
                echo '<script>alert("Product is already in  the cart")</script>';
                echo '<script>window.location="home.html"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'product_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["shopping_cart"] as $keys => $value){
                if($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Product has been removed")</script>';
                    echo '<script>window.location="home.php"</script>';
                }
            }
        }
    }
?>

<div class="slideshow-container">

  <div class="mySlides fade">
    <img src="images/slider1.png">
  </div>

  <div class="mySlides fade">
    <img src="images/slider2.png">
  </div>

  <div class="mySlides fade">
    <img src="images/slider3.png">
  </div>
  
  <div class="mySlides fade">
    <img src="images/slider4.png">
  </div>


  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
</div>

<center><hr class="line"></center>

<div class="shop-content">
        <?php
            $query = "select * from cart order by id asc";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
					<div class="bitems">
                    <div class="col-md-3" style="float: left;">
                    <form method="post" action="<?php
												if(isset($_SESSION["username"]))
												{
													echo 'checkout.php?action=add&id=<?php echo $row["id"];?';
												}
												else if(isset($_SESSION["usernames"]))
												{
													echo 'checkout.php?action=add&id=<?php echo $row["id"];?';
												}
												else
												{
													echo 'login.php';
												}
											?>">
                            <div class="product">
                                <img class="item-img" src="<?php echo $row["image"];?>" width="190px" height="200px" class="img-responsive"><br/>
                                <h3 class="item-title"><?php echo $row["description"];?></h3><br/>
                                <span class="price"><h4>Rs. <?php echo $row["price"];?></span><br/></h4>
                                <br><h4>Quantity : <input type="text" name="quantity" class="form-control" value="1"></h4>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["description"];?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                <button class="addto1" type="submit" name="add" value="Add to cart"><img src="images/scart.png"> Add to Cart</button>
                            </div>
                        </form>
                    </div>
				</div>		
        <?php
                }
            }
        ?>

        
    </div>

	<script src="js/slideshow.js"></script>
<?php
	include_once "footer.php";
?>
