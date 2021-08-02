<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include("connection.php");

//check for login

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

//Formula for date
date_default_timezone_set('Asia/Riyadh');
$DATE=date('G:i:s A');
 ?>
 <?php
 if (isset($_GET['Iqama'])) {
   $Iqama = $_GET['Iqama'];

   $query = "SELECT check_out FROM users WHERE Iqama='$Iqama'";
   $res   = mysqli_query($con, $query);

   if (mysqli_num_rows($res) > 0){
     $queryCheck = "SELECT check_out FROM users WHERE check_out = 'Active' AND Iqama='$Iqama'";
     $resCheck = mysqli_query($con, $queryCheck);
     if (mysqli_num_rows($resCheck) > 0) {
       $UPDATE = "UPDATE users set check_out= '$DATE' WHERE Iqama = $Iqama AND check_out = 'Active';";
       mysqli_query($con, $UPDATE);
       header("Location: Main.php");
     }else {
         echo "'<script type=text/javascript> Swal.fire('Sorry', 'You Have To Check In First', 'warning') </script>'";
     }


   }
   else {
       echo "'<script type=text/javascript> Swal.fire('Sorry', 'No Record Found', 'warning') </script>'";
   //  header("Location: checkout.php");
   }
 }

  ?>



<!DOCTYPE html>
<html>
  <head>
    <title>Checkout Page</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
      html, body {

      justify-content: center;
      height: 100%;


      }
      /*class hero style*/
      #hero{
        display: table;
        width: 100%;
        height: 100vh;
        background: url(img/Alothman1.jpg) top center;
        background-size: cover;
        margin: 0;
        text-align: center;
      }

      body, div, h1, form, input, p {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1 {
      padding: 10px 0;
      font-size: 32px;
      font-weight: 300;
      text-align: center;
      }
      p {
      font-size: 12px;
      }
      hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      .main-block {
      max-width: 340px;
      min-height: 460px;
      padding: 20px 0;
      margin: auto;
      margin-top: 70px;
      border-radius: 5px;
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31);
      background: #ebebeb;


      }
      form {
      margin: 0 30px;
      }
      .account-type, .gender {
      margin: 15px 0;
      }

      label#icon {
      margin: 2;
      border-radius: 5px 0 0 5px;

      }
      label.radio {
      position: relative;
      display: inline-block;
      padding-top: 4px;
      margin-right: 20px;
      text-indent: 30px;
      overflow: visible;
      cursor: pointer;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #eaa524;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 9px;
      height: 4px;
      top: 8px;
      left: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      input[type=text], input[type=password] {
      width: calc(100% - 57px);
      height: 36px;
      margin: 13px 0 0 -5px;
      padding-left: 10px;
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09);
      background: #fff;
      }
      #icon {
      display: inline-block;
      padding: 9px 11px;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09);
      background: #eaa524;
      color: #fff;
      text-align: center;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 3px;
      border: none;
      background: #eaa524;
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #ea4224;
      }

         /*Header style */
         header {
           display: flex;
           justify-content: space-between;
           align-items: center;
           padding: 30px 2%;
           background-color: #060d1f;

         }

         .logo {
           cursor: pointer;
         }

         .nav__links a,
         .cta,
         .overlay__content a {
           font-family: "Montserrat", sans-serif;
           font-weight: 500;
           color: #edf0f1;
           text-decoration: none;
         }

         .nav__links {
           list-style: none;
           display: flex;
         }

         .nav__links li {
           padding: 0px 20px;
         }

         .nav__links li a {
           transition: color 0.3s ease 0s;
         }

         .nav__links li a:hover {
           color: #0088a9;
         }

         .cta {
           padding: 9px 25px;
           background-color: rgba(0, 136, 169, 1);
           border: none;
           border-radius: 50px;
           cursor: pointer;
           transition: background-color 0.3s ease 0s;
         }

         .cta:hover {
           background-color: rgba(0, 136, 169, 0.8);
         }
         /*Icon for admin*/
         .action{
           position: fixed;
           top: 30px;
           right: 13px;
         }
         .action .profile{
           position: relative;
           width: 50px;
           height: 50px;
           border-radius: 50%;
           overflow: hidden;
           cursor: pointer;
         }

         .action .profile img{
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           object-fit: cover;

         }


         .action .menu{
         position: absolute;
         top: 120px;
         right: 15px;
         padding: 10px 20px;
         background: #fff;
         width: 280px;
         box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
         border-radius: 15px;
         transition: 0.5s;
         visibility: hidden;
         opacity: 0;
         }
         .action .menu.active{
           visibility: visible;
           opacity: 1;
           top: 80px;
         }
         .action .menu::before{
           content: '';
           position: absolute;
           top: -5px;
           right: 28px;
           width: 20px;
           height: 20px;
           background: #fff;
           transform: rotate(45deg);
         }
         .action .menu ul li{
           list-style: none;
           padding: 0 0;
           border-top: 1px solid rgba(255, 0, 0, 0.05);
           direction: flex;
           align-items: center;
           justify-content: center;
         }
         .action .menu ul li form{
           max-width: 300px;
           margin-right: 24px;
           opacity: 0.5;
           transition: 0.5s;
           margin-left: auto;
         }
         .action .menu ul li form input{
          width: 100%;
         }
         .action .menu ul li:hover form{
         opacity: 1;
         }
         .action .menu ul li form{
           display: inline-block;
           text-decoration: none;
           color: #555;
           font-weight: 500;
           transition: 0.5s;
         }
         .action .menu ul li:hover form{
           color: lightgreen;
         }
         .btn{
           width: 100%;
           background: none;
           border: 2px solid #00B5EB;
           color: black;
           padding: 3px;
           font-size: 18px;
           cursor: pointer;
           margin: 12px 0;
         }
         .btn:hover {
           background: #00B5EB;
         }


   @media(max-width:470px){

             header{
               flex-wrap: wrap;
             }

             .nav__links li {
               padding: 0 5px;
               margin-top: 15px;
               margin-bottom: 5px;
             }
           }


    </style>
  </head>

  <body>

    <header>
				<a class="logo" href="/"><img src="img/ssbs_img.png" alt="logo" class="MobIMG"></a>
				<nav>
						<ul class="nav__links">
								<li><a href="Main.php">Home</a></li>
								<li><a href="https://www.al-othman.com/contact-2/">Contact</a></li>
								<li><a href="https://www.al-othman.com/about/">About</a></li>
								<li>	<a  class="cta"  onclick="menToggle();" >Admin</a></li>

						</ul>

				</nav>

</header>
      <section id="hero">
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

      <div class="main-block">

      <h1>Checkout</h1><img src="img/SSBS-Logo.png" width=" 150" height="60" >

      <form action="" method="get">
          <hr>
        <label id="icon" for="ID number"><i class="fas fa-id-card"></i></label>

          <input type="text" name="Iqama" value="<?php  if(isset($_GET['Iqama'])){ echo $_GET['Iqama'];} ?>" id="name" placeholder="ID number" required/>
<br><br>
    <div class="btn-block">
          <button type="submit" href="/">Checkout</button>
        </div>
          </form>
      </div>
</section>



</body>

</html>
