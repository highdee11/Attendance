<?php 
	require_once('mysqli.php');
/*-------------------Adding worker into workforce list---------------*/	
	if(isset($_POST['add_mb']))
		{
			$name=mysqli_prep($_POST['mb_name']);
			$level=mysqli_prep($_POST['mb_level']);
			$dept=mysqli_prep($_POST['mb_department']);
			$dob=mysqli_prep($_POST['mb_dob']);
			$address=mysqli_prep($_POST['mb_address']);
			$phone=mysqli_prep($_POST['mb_phone']);
			$result=mysqli_query($connection,"SELECT *FROM members WHERE name='{$name}' OR (level='{$level}' OR phone='{$phone}') LIMIT 1");
			 if(mysqli_num_rows($result)<=0)
			 {
				$result=mysqli_query($connection,"INSERT INTO members (name,level,phone,dob,address,dept) VALUES('{$name}','{$level}'
																					,'{$phone}','{$dob}','{$address}','{$dept}')");
				if($result)
					{
						$feedback=$name." has been assed to the members list";
					}
			 }
			 else
			 {	//echo mysqli_error($connection);
				 $feedback_error="A worker was found having one of his/her info similar to the new members you just added.";
			 }
		}
	
	
	
/*-------------------Adding member into members list using excel---------------*/	
		if(isset($_POST['mb_excel']) && isset($_FILES['mb_excel_file']))
		{
			$filename=$_FILES['mb_excel_file']['tmp_name'];
			$file=fopen($filename,'r');
			$count=count(fgetcsv($file,1000,','));
			fclose($file);
			if($count==6)
			{
					$file=fopen($filename,'r');
				while($dt=fgetcsv($file,1000,','))
				{
					$name=$dt[0];
					$level=$dt[1];
					$phone=$dt[2];
					 
					$result=mysqli_query($connection,"SELECT *FROM members WHERE name='{$name}' OR (level='{$level}' OR phone='{$phone}') LIMIT 1");
				 if(mysqli_num_rows($result)<=0)
				 {
					$rs=mysqli_query($connection,"INSERT INTO members (name,level,phone,dept,address,dob) VALUES ('{$dt[0]}','{$dt[1]}','{$dt[2]}'
														,'{$dt[3]}','{$dt[4]}','{$dt[5]}')");
					 
				 }
				 else
				 {
					continue; 
				 }
				}
			}
			else
			{
				$feedback_error="Invalid document ,please check the file ";
			}
		}
	
?>

<?php 
	$members_result=mysqli_query($connection,"SELECT *FROM members");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Members</title>
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
						<li><a href='index.php' class='col-lg-12 col-xs-12 '>Attendance</a></li>
						<li><a href='workers.php' class='col-lg-12 col-xs-12 '>Workers</a></li>
						<li><a href='members.php' class='col-lg-12 col-xs-12 active'>Members</a></li>
					</ul>
				</div>
				
				<div class='display-cell col-lg-10 col-xs-10 '>
					<div class='col-lg-12 col-xs-12 body'>
						<div class='body-header col-lg-12'>
							<h4 class='text-success'> Members</h4>
						</div>
						
						<div class='body-content'>
						<?php if(isset($feedback))
						{ ?>
							<div class='alert alert-success' style='text-align:center'> 
								<p><?php echo $feedback; ?></p>
							</div>
					<?php } ?>
					<?php if(isset($feedback_error))
						{ ?>
							<div class='alert alert-danger' style='text-align:center'> 
								<p><?php echo $feedback_error; ?></p>
							</div>
					<?php } ?>
							<div class='col-lg-12'>
								<div class='col-lg-12' id='add_form'>
							
								<div class='col-lg-12'>
									<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#add_mb' >
									<span class='glyphicon glyphicon-plus'></span> Add New member</button>
									
									<button type='button' class='btn btn-primary' data-toggle='collapse' data-target='#add_mb_excel' >
									<span class='glyphicon glyphicon-plus'></span> Import Excel File</button>
									
		<!---------------------------------Add with excel--------------->
							<div class='col-lg-12 collapse' id='add_mb_excel'>
								<form action='members.php' class='form-inline' method='POST' enctype='multipart/form-data'>
									<legend class='text-success'>Add New member Using Excel File</legend>
									<div class='form-group'>
										<label for='mb_excel'>Upload Excel file<label>
										<input type='file' name='mb_excel_file' class='form-control' id='mb_excel' />
									<button type='submit' name='mb_excel' class='btn btn-success'> Import</button> 
									</div>
									
								</form>
							</div>
						
		<!---------------------------------Add with form--------------->
		
									<div class='col-lg-12 collapse' id='add_mb'>
										<form class='' method='POST' >
										<legend class='text-success'>Add New Member</legend>
											<div class='form-group col-lg-12'>
												<label for='mb_name'>Full Name</label>
												<input type='text' name='mb_name' class='form-control' id='mb_name' placeholder="Full name"/>
											</div>
											 
											<div class='form-group col-lg-4'>
												<label for='mb_level'>level</label>
												<input type='text' name='mb_level' class='form-control' id='mb_level' placeholder="level"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='mb_phone'>Phone</label>
												<input type='text' name='mb_phone' class='form-control' id='mb_phone' placeholder="Phone Number"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='mb_department'>Department</label>
												<input type='text' name='mb_department' class='form-control' id='mb_department' placeholder="Department in school"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='mb_dob'>D.O.B</label>
												<input type='text' name='mb_dob' class='form-control' id='mb_dob' placeholder="Date Of Birth"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='mb_address'>Address</label>
												<textarea class='form-control' name='mb_address' ></textarea>
											</div>
											<button type='submit' class='btn btn-success btn-block' name='add_mb' id='add_mb_btn'>Add</button>
										</form>
									</div>
								</div>
							</div>
							</div>
							<div class='table-responsive col-lg-12'>
								<table class='table table-striped table-condensed'>
									<thead>
										<tr>
											<th>Name</th>
											<th>level</th>
											<th>Phone</th>
											<th>Dept</th>
											<th>address</th>
											<th>D.O.B</th>
											 
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php    
									while($member=mysqli_fetch_array($members_result))
									{ ?> <tr>
											<td><?php echo $member['name']; ?></td>
											<td><?php echo $member['level']; ?></td>
											<td><?php echo $member['phone']; ?></td>
											<td><?php echo $member['dept']; ?></td>
											<td><?php echo $member['address']; ?></td>
											<td><?php echo $member['dob']; ?></td>
											 
											<td></td>
											<td>
												<div class='btn-group btn-group-xs'>
													<button class='btn btn-danger delete_mb' id="<?php echo $member['id'];?>">Delete</button>
													<!--<button class='btn btn-primary'></button>-->
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