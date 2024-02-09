<?php
    include_once 'header.php';
    require_once 'includes/dbh.php';

	echo '<hr class="line1">';

    if (isset($_GET['search_query'])) {
        $search_query = $_GET['search_query'];

        $query = "SELECT * FROM cart WHERE description LIKE '%$search_query%'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="container" style="width: 65%">';
            while ($row = mysqli_fetch_array($result)) {
                ?>
			<div class="searchb">
                <div class="bitems1">
                    <div class="col-md-3" style="float: left;">
                        <form method="post" action="home.php?action=add&id=<?php echo $row["id"];?>">
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
			</div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<div class="container">No results found.</div>';
        }
    }
?>

<?php
    include_once 'footer.php';
?>
