
<?php

//session_start();

	include("connection.php");
//	include("functions.php");


	if(isset($_POST['login_btn']))
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from admin where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{

					//	$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: admin.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}


if (isset($_POST['login_ID'])) {
Login_ID_CHECK();
}

function Login_ID_CHECK(){
$connect = mysqli_connect("localhost", "root", "", "system");
	$check_Iqama = $_POST['Iqama'];

	$query_ID = "SELECT * FROM users WHERE Iqama='$check_Iqama'";
	$query_run = mysqli_query($connect, $query_ID);
	if(mysqli_num_rows($query_run) > 0){

		$query = "SELECT * FROM users WHERE Iqama='$check_Iqama' AND check_out = 'Active';";
    $query_run = mysqli_query($connect, $query);
    if(mysqli_num_rows($query_run) > 0)
    {
      echo "<script>alert('Your ID is Active')
			window.location = 'main.php'
			</script>";

    }else{
		header("Location: exist.php?U_ID=".$check_Iqama);
		}
	}
	else {

		echo "<script>alert('You have to sign up first')
		window.location = 'checkIN.php'
		</script>";
	}


}

if (isset($_GET['showpopup'])) {
	echo "'    <script type=text/javascript>
	      const Toast = Swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 3000,
	  timerProgressBar: true,
	  didOpen: (toast) => {
	    toast.addEventListener('mouseenter', Swal.stopTimer)
	    toast.addEventListener('mouseleave', Swal.resumeTimer)
	  }
	})

	Toast.fire({
	  icon: 'warning',
	  title: 'Signed in successfully'
	})
	    </script>'";
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Data Center Visitor Log</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- bootstrap CSS Files -->

  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
	<style>
	 @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap');

	 body {
	  background: #262626;
	  font-family: raleway;
	  color: white;
	  margin: 0;
	}

	.popup .content {
	 position: absolute;
	 top: 50%;
	 left: 50%;
	 transform: translate(-50%,-150%) scale(0);
	 width: 320px;
	 height: 450px;
	 z-index: 2;
	 text-align: center;
	 padding: 20px;
	 border-radius: 20px;
	 background: #262626;
	 box-shadow:  38px 38px 56px #1e1e1e,
	             -25px -25px 38px #1e1e1e;
	 z-index: 1;
	}

	.popup .close-btn {
	 position: absolute;
	 right: 20px;
	 top: 20px;
	 width: 30px;
	 height: 30px;
	 color: white;
	 font-size: 30px;
	 border-radius: 50%;
	 padding: 2px 5px 7px 5px;
	 background: #292929;
	 box-shadow:  5px 5px 15px #1e1e1e,
	             -5px -5px 15px #1e1e1e;
	 }

	.popup.active .content {
	transition: all 300ms ease-in-out;
	transform: translate(-50%,-50%) scale(1);
	}

	h1 {
	 text-align: center;
	 font-size: 32px;
	 font-weight: 600;
	 padding-top: 20px;
	 padding-bottom: 10px;
	}

	a {
	 font-weight: 600;
	 color: white;
	}

	.input-field .validate {
	padding: 20px;
	font-size: 16px;
	border-radius: 10px;
	border: none;
	margin-bottom: 15px;
	color: #bfc0c0;
	background: #262626;
	box-shadow: inset 5px 5px 5px #232323,
	            inset -5px -5px 5px #292929;
	outline: none;
	}

	.first-button {

	background: #262626;
	box-shadow:  18px 18px 25px #1e1e1e,
	             -15px -15px 25px #1e1e1e;
	transition: box-shadow .35s ease !important;
	}

	.first-button:active {
	background: linear-gradient(145deg, #222222, #292929);
	box-shadow:  5px 5px 10px #262626,
	             -5px -5px 10px #262626;
	border: none;
	}

	.second-button {
	color: white;
	font-size: 18px;
	font-weight: 500;
	margin-top: 20px;
	padding: 20px 30px;
	border-radius: 40px;
	border: none;
	background: #262626;
	box-shadow:  8px 8px 15px #202020,
	             -8px -8px 15px #2c2c2c;
	transition: box-shadow .35s ease !important;
	outline: none;
	}

	.second-button:active{
	background: linear-gradient(145deg,#222222, #292929);
	box-shadow: 5px 5px 10px #262626, -5px -5px 10px #262626;
	border: none;
	outline: none;
	}
	p{
	color: #bfc0c0;
	padding: 20px;
	}

	.third-button{
		color: white;
		font-size: 18px;
		font-weight: 500;
		margin-top: 20px;
		padding: 20px 30px;
		border-radius: 40px;
		border: none;
		background: #262626;
		box-shadow:  8px 8px 15px #202020,
		             -8px -8px 15px #2c2c2c;
		transition: box-shadow .35s ease !important;
		outline: none;
	}
	.third-button:active{
	background: linear-gradient(145deg,#222222, #292929);
	box-shadow: 5px 5px 10px #262626, -5px -5px 10px #262626;
	border: none;
	outline: none;
	}

	/*design input for "Enter-id"*/
	.textbox {
	    width: 64%;
	    overflow: hidden;
	    font-size: 20px;
	    padding: 25px 12px 4px 4px;
			margin: 2% 8% 3% 20%;
	    border-bottom: 1px solid #0dcaf0;
	}
	.textbox i{
		width: 26px;
		float: left;
		text-align: center;
	}
	.textbox input{
		border: none;
		outline: none;
		background: none;
		color: white;
		font-size: 18px;
		width: 80%;
		float: left;
		margin: 0 10px;
	}

	</style>
</head>

<body>

	<header>
			<a class="logo" href="/"><img src="img/ssbs_img.png" alt="logo" ></a>
			<nav>
					<ul class="nav__links">
							<li><a href="Main.php">Home</a></li>
							<li><a href="https://www.al-othman.com/contact-2/">Contact</a></li>
							<li><a href="https://www.al-othman.com/about/">About</a></li>
					</ul>
			</nav>
			<div class="profile" onclick="menToggle();">
				<a  class="cta" >Admin</a>

			</div>

	</header>

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="hero-container">
      <div class="action">

        <div class="menu">

          <ul>
            <li><form method="post">

              <input type="text" name="user_name" placeholder="Username" required> <br>

              <input type="password" name="password" placeholder="Password" required><br>

              <button type="submit" class="btn" name="login_btn">Login</button>
            </form> </li>
          </ul>
        </div>
      </div>

      <script>
      function menToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active')
      }
      </script>

    <!--  <a href="#" id="admin"><img src="img/Admin_Icon.png" alt=""></a> -->
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="img/ssbs.png" alt="ssbs icon" width="20%" height="20%">
        </div>

        <h1>Welcome to Data Center Visitor Log</h1>
        <h2>Click <span class="typed" data-typed-items="Check-in if you want to login , Check-out if you want to logout"></span></h2>
        <div class="actions">
          <a  class="btn-get-started first-button" onclick="togglePopup()">Check In</a>
          <a href="checkout.php" class="btn-services">Check Out</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

<!--popup for "Check In" -->
	<div class="popup" id="popup-1">
		<div class="content">
		 <div class="close-btn" onclick="togglePopup()">
			×</div>

	<h1>Check In</h1><br>


		 <a class="second-button" href="checkIN.php">First Time</a><br><br><br><br>
		 <a class="third-button" onclick="togglePopup2()">Have an account</a><br><br><br><br>
		 <p>Already Log In? <a href="checkout.php">LogOut</a></p>


		</div>
	 </div>

<!--popup for "Have an account" -->
<div class="popup" id="popup-2">
	<div class="content">
	 <div class="close-btn" onclick="togglePopup2()">
		×</div>

<h1>Enter ID</h1><br>





<form method="post">
	<div class="textbox">
	<input type="text" name="Iqama" placeholder="Enter ID" style="border-radius:15%;">
</div><br>
	<input type="submit" name="login_ID" value="Search" class="cta"><br><br><br><br>
</form>


	 <p>Already Log In? <a href="checkout.php">LogOut</a></p>


	</div>
 </div>

  <!-- Vendor JS Files -->

  <script src="js/typed.min.js"></script>
	<script type="text/javascript" src="mobile.js"></script>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
	<script>
	 function togglePopup() {
	 document.getElementById("popup-1")
	  .classList.toggle("active");
	}
	</script>

	<script>
	 function togglePopup2() {
	 document.getElementById("popup-2")
		.classList.toggle("active");
	}
	</script>

</body>

</html>
