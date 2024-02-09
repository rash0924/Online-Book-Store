<?php
	include_once 'header.php';
	require_once 'includes/dbh.php';
?>
<hr class="line1">
<div class="fullpage">
<div class="Dhanuka1">
    <br><br><h2><b><u>Check Out</u></b></h2></div>
        <div class="check"><center>
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Description</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>
            <?php
                if(!empty($_SESSION["shopping_cart"])){
                    $total=0;
                    foreach($_SESSION["shopping_cart"] as $key => $value){
                    ?>
                <tr>
                        <td><?php echo $value["product_name"];?></td>
                        <td><?php echo $value["product_quantity"];?></td>
                        <td><?php echo $value["product_price"];?></td>
                        <td><?php echo number_format($value["product_quantity"]*$value["product_price"],2);?></td>
                        <td><a href="home.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>
                </tr>
                <?php
                    $total = $total + ($value["product_quantity"]*$value["product_price"]);
                    }
                ?>
                <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right"><?php echo number_format($total,2);?></td>
                        <td></td>
                </tr>
                <?php
                }
                ?>
				</center>
            </table>
        </div>
		<br>
		<div class="methods">
			<h3 class="p">Pay Now</h3>
			<button class="pay"><a href="cardinfo.php" style="text-decoration:none">Credit Card</a></button>
			<button class="pay"><a href="delivery.php" style="text-decoration:none">Cash On Delivery</a></button>
			<button class="pay" onclick="ewallet()">E-Wallet</button>
			<script>
				function ewallet(){
					alert("This payment method is currently unavailable");
					}
			</script>
			<br>
			<button class="linkhome"><a href ="home.php" style="text-decoration:none">+Continue Shopping</a></button>
			</div>
</div>	
<?php
	include_once "footer.php";
?>