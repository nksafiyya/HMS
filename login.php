<!doctype html>
<html lang="en">
<?php 
include 'constants/settings.php'; 
include 'constants/check-login.php';
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>HMS | Login</title>

	<link rel="shortcut icon" href="images/ico/hmsicon.png">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">

	<link href="css/style.css" rel="stylesheet">
 <script type="text/javascript">
   function update(str)
   {

	if(document.getElementById('mymail').value == "")
   {
	alert("Please enter your email");

    }else{
		  document.getElementById("data").innerHTML = "Please wait...";
      var xmlhttp;

      if (window.XMLHttpRequest)
      {
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","app/reset-pw.php?opt="+str, true);
      xmlhttp.send();
}

  }
  
   function reset_text()
   {  
   document.getElementById('mymail').value = "";
   document.getElementById("data").innerHTML = "";
   }

</script>
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">


		<?php include('components/header.php'); ?>


		<div class="main-wrapper">


			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list">
						<li><a href="./">Home</a></li>
						<li><span>Access your account</span></li>
					</ol>
					
				</div>
				
			</div>


			<div class="login-container-wrapper">	
	
				<div class="container">
				
					<div class="row">
					
						<div class="col-md-10 col-md-offset-1">
						
							<div class="row">

								<div class="col-sm-6 col-sm-offset-3">
                                <?php
								include 'constants/check_reply.php';	
								?>
                                <form name="frm" action="app/auth.php" method="POST" autocomplete="off">
                                <div class="login-box-wrapper">
							
                                <div class="modal-header">
                                <h4 class="modal-title text-center">Access your account</h4>
                                </div>

                                <div class="modal-body">
																
                                <div class="row gap-20">

												
                                <div class="col-sm-12 col-md-12">

                                <div class="form-group"> 
                                <label>Email Address</label>
                                <input class="form-control" placeholder="Enter your email address" name="email" required type="text"> 
                                </div>
												
                                 </div>
												
                                <div class="col-sm-12 col-md-12">
												
                                <div class="form-group"> 
                                <label>Password</label>
                                <input class="form-control" placeholder="Enter your password" name="password" required type="password"> 
                                </div>
												
                                </div>


						
					          	<div class="col-sm-12 col-md-12">
							    <div class="login-box-link-action">
								<a data-toggle="modal" onclick = "reset_text()" href="#forgotPasswordModal">Forgot password?</a> 
							    </div>
						      </div>	

											
												
												
</div>

</div>

<div class="modal-footer text-center">
<button type="submit" class="btn btn-primary">Login</button>
</div>
										
</div>
</form>

<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Restore your forgotten password</h4>
				</div>

				<div class="modal-body">
					<div class="row gap-20">
						
						<div class="col-sm-12 col-md-12">
							<p class="mb-20">Enter the email address associated to your account, we will send you the link to reset your password</p>
						</div>
						
						<div class="col-sm-12 col-md-12">
				
							<div class="form-group"> 

								<label>Email Address</label>
								<input id="mymail" autocomplete="off" name="email" class="form-control" placeholder="Enter your email address" type="email" required> 
							</div>
						
						</div>


						
						<div class="col-sm-12 col-md-12">
							<div class="login-box-box-action">
								Return to <a data-dismiss="modal">Log-in</a>
								<p id="data"></p>
							</div>
							
						</div>
						
					</div>
				</div>
				
				<div class="modal-footer text-center">
					<button  onclick="update(mymail.value)" type="submit" class="btn btn-primary">Restore</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
		
			</div>
									
								</div>
							
							</div>
							
						</div>
						
					</div>
					
				</div>
			
			</div>

			<?php include('components/footer.php'); ?>
			
		</div>


	</div> 


<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/jquery.countimator.js"></script>
<script type="text/javascript" src="js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>

</html>