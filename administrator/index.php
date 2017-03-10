<?php 
	require_once('mysqli.php');
	$result=mysqli_query($connection,"SELECT *FROM attendance");
	$no_of_workers=mysqli_query($connection,"SELECT *FROM workers ");
	$no_of_workers=mysqli_num_rows($no_of_workers);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UI-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<link href="css/attendance.css" rel="stylesheet"> 
 	<script src='js/jquery-3.1.0.min.js'></script>
	<script src='js/jquery-ui.js'></script>
	<script src='js/attendance.js'></script>
 	<script src='js/bootstrap.min.js'></script>
</head>
<body class='container-fluid' >
	<nav class='navbar navbar-default navbar-fixed-top' style='padding-top:0px;margin-top:0px;'>
		<div class='navbar-heading' style='padding-top:0px; margin-top:0px;'>
			<div class='navbar-title' style='padding-top:0px; margin-top:0px;' >
				<a href='' class='navbar-brand' style='padding-top:0px;margin-top:0px;'><img margin-top:0px;  src='../images/ChurchLogo.png' width='50px' height='100px' alt='logo' class='img-responsive'/> </a>
			</div>
		</div>
	</nav>
	
	<div class='row overall-content'>
		<div class='display-table col-lg-12 col-xs-12 '>
			<div class='display-row col-lg-12 col-xs-12 '>
				<div class='sidebar display-cell col-lg-2 col-xs-2 '>
					<h4 class='col-lg-12'>DASHBOARD</h4>
					<ul class='col-lg-12 col-xs-12'>
						<li><a href='index.php' class='col-lg-12 col-xs-12 active'>Attendance</a></li>
						<li><a href='workers.php' class='col-lg-12 col-xs-12 '>Workers</a></li>
						<li><a href='members.php' class='col-lg-12 col-xs-12 '>Members</a></li>
					</ul>
				</div>
				
				<div class='display-cell col-lg-10 col-xs-10 '>
					<div class='col-lg-12 col-xs-12 body'>
						<div class='body-header col-lg-12'>
							<h4 class='text-success'> Attendance</h4>
						</div>
						
						<div class='body-content'>
							<div class='col-lg-12'></div>
							<div class='table-responsive col-lg-12'>
								<table class='table table-striped att-form table-condensed'>
									<thead>
										<tr>
											<th>Date</th>
											<th>Workers</th>
											<th>Members</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php while($res=mysqli_fetch_array($result))
									{ $atten=$res['name'];
										$resu1=mysqli_query($connection,"SELECT *FROM $atten WHERE unit!='null'");
										$resu2=mysqli_query($connection,"SELECT *FROM $atten WHERE unit='null' ");
										$resu1=mysqli_num_rows($resu1);
										$resu2=mysqli_num_rows($resu2);
										$absent=$no_of_workers-$resu1;
										?>
										<tr>
											<td><?php echo $atten; ?></td>
									<td><?php echo "<span class='text-success'>{$resu1} present</span>";?> , 
										<?php echo "<span class='text-danger'>{$absent} absent</span>"; ?> </td>
											<td><?php echo $resu2;?></td>
											<td>
												<div class='btn-group btn-group-xs'>
													<button data-id=<?php echo $res['id']?> data-name=<?php echo $atten;?> class='btn btn-danger del'>Delete</button>
													<button class='btn btn-primary'><a href=<?php echo 'viewattendance.php?atten='.urlencode($atten) ;?> style=''>View</a></button>
												</div>
											</td>
										</tr>
									<?php } ?> 
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>