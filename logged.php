<?php
	require 'db_conn.php';
    $login = $_POST['Loginid'];
    session_start();
	$pass = $_POST['Password'];
	if (isset($_POST['Login']))
?>
<html>
<Title>Your Account</title>
<head>
    <link rel="stylesheet" href="Front with CSS.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-orange.min.css" />
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
</head>

<body background="21.jpg">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">Your Account</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="home.php">Home</a>
                    <a class="mdl-navigation__link" href="form.php">Signup</a>
                    <a class="mdl-navigation__link" href="front.php">Login</a>
                    <a class="mdl-navigation__link" href="Aboutus.php">About Us</a>
                    <a class="mdl-navigation__link" href="Admin_login.php">Administrators</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Your Account</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="home.php">Home</a>
                <a class="mdl-navigation__link" href="form.php">Signup</a>
                <a class="mdl-navigation__link" href="front.php">Login</a>
                <a class="mdl-navigation__link" href="Aboutus.php">About Us</a>
                <a class="mdl-navigation__link" href="Admin_login.php">Administrators</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
			<br><br>
			<center>
                    <div class="demo-card-wide mdl-card mdl-shadow--16dp" style="background-color:#E8F6EF">
                        <div class="mdl-shadow--16dp" style="background-color:#1B9C85">
                        <br>
                        <div class="mdl-typography--title" style="color:#ffffff">Account Details:</div>
                        <br>
                        </div>

					
	<?php
	$sql="SELECT * FROM customerlogin where email_id='".$login."' and password='".$pass."'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		echo '<script type="text/javascript">alert("You have successfully Logged in")</script>';
		$row=mysqli_fetch_assoc($result);
		echo '<br><br><div class=\"mdl-typography--subtitle\">Customer ID: '.$row['Customer_id'].'<br>First name: '.$row['First_name'].'<br>Last name: '.$row['Last_name'].'<br>Mobile Number: '.$row['Mobile_no'].'</div>';
        $_SESSION["Customer_id"] =$row['Customer_id'];		
    }
   else
    {   
		echo '<script type="text/javascript">alert("Invalid Email-Id or Password");history.go(-1);</script>';
	}
	
	?>
	<br>
	<br>
	<div class="mdl-shadow--16dp" style="background-color:#1B9C85"><br>
    <div class="mdl-shadow--16dp" style="background-color:#E8F6EF"><br>
                        <a class="mdl-navigation__link" href="home.php"><div class="mdl-typography--title" style="color:#000000;font-size:15px"><b>Book Now</b></div></a>
                        <br>
                        </div>
                        <div class="mdl-shadow--16dp" style="background-color:#E8F6EF"><br>
                        <a class="mdl-navigation__link" href="user_flight_view.php"><div class="mdl-typography--title" style="color:#000000;font-size:15px"><b>View Previous Bookings</b></div></a>
                        <br>
                        </div>
                        <div class="mdl-shadow--16dp" style="background-color:#E8F6EF"><br>
                        <a class="mdl-navigation__link" href="user_cancel.php"><div class="mdl-typography--title" style="color:#000000;font-size:15px"><b>Cancel Flights</b></div></a>
                        <br>
                        </div>
                        <br><br>
<form action="logout.php">
<input type="submit" value="Log Out" style="background-color:#E8F6EF;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
</form>
	
	<br>
	</div>
					</center>
	</div>
   
	</main>
</body>
</html>