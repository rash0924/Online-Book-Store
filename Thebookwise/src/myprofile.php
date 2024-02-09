<?php
        include 'connection.php';
		include_once 'header.php';

		$name = $_SESSION['username'];

            
                $query = "SELECT * FROM `users` WHERE first_name = '$name'";
                $rs = mysqli_query($conn, $query);

                $data = $rs->fetch_assoc();


                if (isset($_POST['submit'])) {
                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $email = $_POST['email'];

                $message = array();

                if (empty($fname) || empty($lname) || empty($email)) {
                    $message[] = 'All fields are required';
                } else {

                    $query = "UPDATE `users` SET first_name = '$fname', last_name = '$lname', email = '$email' WHERE first_name = '$name'";
                    $rs = mysqli_query($conn, $query);

                    if ($rs) {
                        $message[] = 'Data updated correctly';
                        header('location: myprofile.php');
                        exit;
                    } else {
                        $message[] = 'Error updating data: ' . mysqli_error($conn);
                    }
                }
            }
            ?>

<h2><u>My Account</u></h2>
<?php
	
	
    $query = "SELECT * FROM `users` WHERE first_name = '$name'";
    $rs = mysqli_query($conn, $query);

    $data = $rs->fetch_assoc();
    $user_id = $data['userid'];

    $image_query = "SELECT * FROM `user_image` WHERE user_id = '$user_id' ";
    $image_rs = mysqli_query($conn, $image_query);
    $image_data = $image_rs->fetch_assoc();

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extensions)) {
            echo "Please select a valid image.";
        } else {
            $new_file_extension = "";

            if ($file_ex == "image/jpg") {
                $new_file_extension = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extension = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extension = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extension = ".svg";
            }

            $file_name = "images/profile_img/" . $user_id . "_" . uniqid() . $new_file_extension;

            move_uploaded_file($image["tmp_name"], $file_name);

            if ($image_data) {
                $update = "UPDATE `user_image` SET path_url = '$file_name' WHERE user_id = '$user_id'";
                $update_rs = mysqli_query($conn, $update);
            } else {
                $insert = "INSERT INTO `user_image` (path_url, user_id) VALUES ('$file_name', '$user_id')";
                $insert_rs = mysqli_query($conn, $insert);
            }

            // Redirect to prevent duplicate image submission on refresh
            header('location:myprofile.php');
            exit;
        }
    }
?>

<div class="uploadimg">
    <?php
    if (empty($image_data["path_url"])) {
        ?>
        <img src="images/profile_img/user.png" id="viewImg" class="" width="150px" height="150px">
        <?php
    } else {
        ?>
        <img src="<?php echo ($image_data["path_url"]); ?>" id="viewImg" class="" width="150px" height="150px">
        <?php
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="">
            <input type="file" class="hide" id="profileimg" accept="image/*" name="image">
            <label for="profileimg" class="upimgbtn" onclick="changeImage();">Update Image</label>
        </div>
        <div class="submitbtn">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

<script>
    function changeImage() {
        document.getElementById("profileimg").click();
    }
</script>


<div class="mp-content">

<form action="" method="post" enctype="multipart/form-data">

<table>
	<tr>
		<td ></td>
		<td><button class="lgout"><a href="includes/logout_inc.php">Log out</a></button></td>
	</tr>
	<tr>
		<td><h4>Account Information</h4></td>
	</tr>
	<!-- <tr>
		<td class="td1">User Name</td>
		<td>
			<input type="text" class="details" name="username" value="<?php echo ["user_name"]; ?>">
		</td>
	</tr> -->
	
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	
	<tr>
		<td>First Name</td>
		<td>
			<input type="text" class="details" name="firstname" value="<?php echo $data["first_name"]; ?>" readonly >
		</td>
	</tr>
	
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	
	<tr>
		<td>Last Name</td>
		<td>
			<input type="text" class="details" name="lastname" value="<?php echo $data["last_name"]; ?>">
		</td>
	</tr>
	
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	
	<!-- <tr>
		<td>Phone Number</td>
		<td>
			<input type="text" class="details" name="pnumber" value="<?php echo $data["mobile"]; ?>">
		</td>
	</tr> -->
	
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	
	<tr>
		<td>E-mail</td>
		<td>
			<input type="text" class="details" name="email" value="<?php echo $data["email"]; ?>">
		</td>
	</tr>
	
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	
	<!-- <tr>
		<td>Address</td>
		<td>
			<input type="text" class="details" name="address" value="<?php echo $data["address"]; ?>">
		</td>
	</tr>
	 -->
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
		<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	
	<tr>
		<td></td>
		<td><button class="lgout" type="submit" name="submit">Update details</button></td>
	</tr>
	
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	

</table>
</form>

</div>


<?php
    include_once "footer.php";
?>