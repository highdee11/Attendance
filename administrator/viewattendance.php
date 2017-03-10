<?php 
	require_once('mysqli.php');
	$result=mysqli_query($connection,"SELECT *FROM attendance");
	if(isset($_GET['atten']))
	{
		$atten=$_GET['atten'];
		$res_of_workers=mysqli_query($connection,"SELECT *FROM $atten ");
	}
	
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
	<nav class='navbar navbar-default navbar-fixed-top'>
		<div class='navbar-heading'>
			<div class='navbar-title'>
				<a href='' class='navbar-brand' ><img src='' alt='logo' class='img-responsive'/> </a>
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
							<h4 class='text-success'> Attendance For Sunday 19-02-2017</h4>
						</div>
						
						<div class='body-content'>
							<div class='col-lg-6'>
								<div class='form-group'>
								
									<select class='form-control' id='identity' atten=<?php echo $atten;?> name='identity'>
										<option value=''>Select your Content</option>
										<option value='workers'>Workers</option>
										<option value='members'>Members</option>
									</select>
								</div>
							</div>
							<div class='col-lg-6'>
								<button class='btn btn-primary' id='export'>Export</button>
									 
								<div class='download_workers col-lg-5 pull-right hidden'><a href='download/workers <?php echo $atten ; ?>.csv' id='' class=' '><span class='glyphicon glyphicon-download'> </span> Download Workers List</a></div>
								<div class='download_members col-lg-5 pull-right hidden'><a href='download/members <?php echo $atten ; ?>.csv' id='' class=' '><span class='glyphicon glyphicon-download'> </span> Download Members List</a></div>
							</div>
							<div class='table-responsive col-lg-12'>
								<table class='table table-striped att-form table-condensed'>
										<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Unit</th>
											<th>Dept</th>
											<th>address</th>
											<th>D.O.B</th>
											<th>Time</th>
										</tr>
									</thead>
									<tbody>
									<?php while($res=mysqli_fetch_array($res_of_workers))
									{ 
									?>
										<tr>
											<td><?php echo $res['name']; ?></td>
											<td><?php echo $res['level']; ?></td>
											<td><?php echo $res['phone']; ?></td>
											<td><?php echo $res['unit']; ?></td>
											<td><?php echo $res['dept']; ?></td>
											<td><?php echo $res['address']; ?></td>
											<td><?php echo $res['dob']; ?></td>
											<td><?php echo $res['time']; ?></td>
											
										
										</tr>
								<?php  } ?>
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