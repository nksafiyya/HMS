<!doctype html>
<html lang="en">
<?php 
require 'constants/settings.php'; 
require 'constants/check-login.php';
$fromsearch = false;

if (isset($_GET['search']) && $_GET['search'] == "✓") {

}else{

}

if (isset($_GET['page'])) {
$page = $_GET['page'];
if ($page=="" || $page=="1")
{
$page1 = 0;
$page = 1;
}else{
$page1 = ($page*16)-16;
}					
}else{
$page1 = 0;
$page = 1;	
}

if (isset($_GET['country']) && ($_GET['category']) ){
$cate = $_GET['category'];
$country = $_GET['country'];	
$query1 = "SELECT * FROM jobs WHERE category = :cate AND country = :country ORDER BY enc_id DESC LIMIT $page1,12";
$query2 = "SELECT * FROM jobs WHERE category = :cate AND country = :country ORDER BY enc_id DESC";
$fromsearch = true;

$slc_country = "$country";
$slc_category = "$cate";
$title = "$slc_category jobs in $slc_country";
}else{
$query1 = "SELECT * FROM jobs ORDER BY enc_id DESC LIMIT $page1,12";
$query2 = "SELECT * FROM jobs ORDER BY enc_id DESC";	
$slc_country = "NULL";
$slc_category = "NULL";	
$title = "Job List";
}
?>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>HMS | <?php echo "$title"; ?></title>

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


	
</head>



<body class="not-transparent-header">

	<div class="container-wrapper">


	<?php include('components/header.php'); ?>


		<div class="main-wrapper">
		
			<div class="second-search-result-wrapper">
			
				<div class="container">
				
					<form action="job-list.php" method="GET" autocomplete="off">
					
						<div class="second-search-result-inner">
							<span class="labeling">Search a job</span>
							<div class="row">
							
								<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
									<div class="form-group form-lg">
										<select class="form-control" name="category" required/>
										<option value="">-Select category-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM categories ORDER BY category");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
										 
                                         {
										 $cat = $row['category'];
                                        ?>
										<option  <?php if ($slc_category == "$cat") { print ' selected '; } ?> value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
										<?php
	                                     }
                                         $stmt->execute();
					  
	                                     }catch(PDOException $e)
                                         {
                                    
                                         }
	
										?>
														   
										</select>
									</div>
								</div>
								
								<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
									<div class="form-group form-lg">
										<select class="form-control" name="country" required/>
										<option value="">-Select state-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM states ORDER BY state_name");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
										
                                         {
											  $cnt = $row['state_name'];
                                        ?>
										
										<option <?php if ($slc_country == "$cnt") { print ' selected '; } ?> value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option>
										<?php
	                                     }
                                         $stmt->execute();
					  
	                                     }catch(PDOException $e)
                                         {
               
                                         }
	
										?>
										</select>
									</div>
								</div>
								
								<div class="col-xss-12 col-xs-6 col-sm-4 col-md-2">
									<button name="search" value="✓" type="submit" class="btn btn-block">Search</button>
								</div>
							
							</div>
						</div>
					
					</form>
					

				</div>
			
			</div>
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="./">Home</a></li>
						<li><span><?php echo "$title"; ?></span></li>
					</ol>
					
				</div>
				
			</div>

			
			<div class="section sm">
			
				<div class="container">
				
					<div class="sorting-wrappper">
			
						<div class="sorting-header">
							<h3 class="sorting-title"><?php echo "$title"; ?></h3>
						</div>
						
		
					</div>
					
					<div class="result-wrapper">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-12 mt-25">
							
								<div class="result-list-wrapper">
								<?php
								require 'constants/db_config.php';
								
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare($query1);
								if ($fromsearch == true) {
								$stmt->bindParam(':cate', $slc_category);
                                $stmt->bindParam(':country', $slc_country);	
								}
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach($result as $row)
                                {
								$post_date = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'd');
                                $post_month = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'F');
                                $post_year = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'Y');
								$type = $row['type'];
								$compid = $row['company'];
								
								$stmtb = $conn->prepare("SELECT * FROM users WHERE member_no = '$compid' and role = 'employer'");
                                $stmtb->execute();
                                $resultb = $stmtb->fetchAll();
                                foreach($resultb as $rowb) {
								$complogo = $rowb['avatar'];
								$thecompname = $rowb['first_name'];	
									
								}
								if ($type == "Freelance") {
								$sta = '<span class="job-label label label-success">Freelance</span>';
											  
								}
								if ($type == "Part-time") {
								$sta = '<span class="job-label label label-danger">Part-time</span>';
											  
								}
								if ($type == "Full-time") {
								$sta = '<span class="job-label label label-warning">Full-time</span>';
											  
								}
		                        
								?>
										<div class="job-item-list">
									
										<div class="image">
										<?php 
										if ($complogo == null) {
										print '<center><img class="autofit3" alt="image"  src="images/blank.png"/></center>';
										}else{
										echo '<center><img class="autofit3" alt="image" title="'.$thecompname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										 ?>
										</div>
										
										<div class="content">
											<div class="job-item-list-info">
											
												<div class="row">
												
													<div class="col-sm-7 col-md-8">
													
														<h4 class="heading"><?php echo $row['title']; ?></h4>
														<div class="meta-div clearfix mb-25">
															<span>at <a href="company.php?ref=<?php echo "$compid"; ?>"><?php echo "$thecompname"; ?></a></span>
															<?php echo "$sta"; ?>
														</div>
														
														<p class="texing character_limit"><?php echo $row['description']; ?></p>
													</div>
													
													<div class="col-sm-5 col-md-4">
														<ul class="meta-list">
															<li>
																<span>Country:</span>
																<?php echo $row['country']; ?>
															</li>
															<li>
																<span>City:</span>
																<?php echo $row['city']; ?>
															</li>
															<li>
																<span>Experience:</span>
																<?php echo $row['experience']; ?>
															</li>
															<li>
																<span>Deadline: </span>
																<?php echo "$post_month"; ?> <?php echo "$post_date"; ?>, <?php echo "$post_year"; ?>
															</li>
														</ul>
													</div>
													
												</div>
											
											</div>
										
											<div class="job-item-list-bottom">
											
												<div class="row">
												
													<div class="col-sm-7 col-md-8">
														<div class="sub-category">
															<a><?php echo $row['category']; ?></a>

														</div>
													</div>
													
													<div class="col-sm-5 col-md-4">
														<a target="_blank" href="explore-job.php?jobid=<?php echo $row['job_id']; ?>" class="btn btn-primary">View This Job</a>
													</div>
													
												</div>
											
											</div>
										
										
										</div>
									
									</div>
									<?php
	 
	                            }

					  
	                            }catch(PDOException $e)
                                {

                                } ?>
                                </div>
								
					
								<div class="pager-wrapper">
								
						        <ul class="pager-list">
								<?php
								$total_records = 0;
								require 'constants/db_config.php';
								
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare($query2);
								if ($fromsearch == true) {
								$stmt->bindParam(':cate', $slc_category);
                                $stmt->bindParam(':country', $slc_country);	
								}
                                $stmt->execute();
                                $result = $stmt->fetchAll();
 
                                foreach($result as $row)
                                {
		                        $total_records++;
                                }

					  
	                            }catch(PDOException $e)
                                {

                                }
	
                                $records = $total_records/12;
                                $records = ceil($records);
				                if ($records > 1 ) {
								$prevpage = $page - 1;
								$nextpage = $page + 1;
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="job-list.php?page='.$prevpage.''; ?> <?php if ($fromsearch == true) { print '&category='.$cate.'&country='.$country.'&search=✓'; }'';} print '"><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?>  href="job-list.php?page=<?php echo "$b"; ?><?php if ($fromsearch == true) { print '&category='.$cate.'&country='.$country.'&search=✓'; }?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="job-list.php?page='.$nextpage.''; ?> <?php if ($fromsearch == true) { print '&category='.$cate.'&country='.$country.'&search=✓'; }'';} print '"><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
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