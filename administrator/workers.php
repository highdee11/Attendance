<?php 
	require_once('mysqli.php');
/*-------------------Adding worker into workforce list---------------*/	
	if(isset($_POST['add_wk']))
		{
			$name=mysqli_prep($_POST['wk_name']);
			$level=mysqli_prep($_POST['wk_level']);
			$unit="";
			foreach($_POST['wk_unit'] as $s )
			{
				//array_push($unit,$s);
				$unit.=$s.',';
			}
			$dept=mysqli_prep($_POST['wk_department']);
			$dob=mysqli_prep($_POST['wk_dob']);
			$address=mysqli_prep($_POST['wk_address']);
			$phone=mysqli_prep($_POST['wk_phone']);
			$result=mysqli_query($connection,"SELECT *FROM workers WHERE name='{$name}' AND (level='{$level}' AND phone='{$phone}') LIMIT 1");
			 if(mysqli_num_rows($result)<=0)
			 {
				$result=mysqli_query($connection,"INSERT INTO workers (name,unit,level,phone,dob,address,dept) VALUES('{$name}','{$unit}','{$level}'
																					,'{$phone}','{$dob}','{$address}','{$dept}')");
				if($result)
					{
						$feedback=$name." has been assed to the workforce list";
					}
			 }
			 else
			 {	//echo mysqli_error($connection);
				 $feedback_error="A worker was found having one of his/her info similar to the new worker you just added.";
			 }
		}
	

/*-------------------Adding worker into workforce list using excel---------------*/	
		if(isset($_POST['wk_excel']) && isset($_FILES['wk_excel_file']))
		{
			$filename=$_FILES['wk_excel_file']['tmp_name'];
			$file=fopen($filename,'r');
			$count=count(fgetcsv($file,999999,','));
			fclose($file);
			if($count==7 || $count==8)
			{
					$file=fopen($filename,'r');
				while($dt=fgetcsv($file,999999,','))
				{
					if($count==7)
					{
						$name=$dt[0];
						$level=$dt[1];
						$phone=$dt[2];
					}
					else
					{
						$name=$dt[1];
						$level=$dt[2];
						$phone=$dt[3];
						 
					}
					 
					$result=mysqli_query($connection,"SELECT *FROM workers WHERE name='{$name}' AND (level='{$level}' AND phone='{$phone}') LIMIT 1");
				 if(mysqli_num_rows($result)<=0 && $count==7)
				 {
					mysqli_query($connection,"INSERT INTO workers (name,level,phone,unit,dept,address,dob) VALUES ('{$dt[0]}','{$dt[1]}','{$dt[2]}'
														,'{$dt[3]}','{$dt[4]}','{$dt[5]}','{$dt[6]}')");
				 }
				 if(mysqli_num_rows($result)<=0 && $count==8)
				 {
					mysqli_query($connection,"INSERT INTO workers (name,level,phone,unit,dept,address,dob) VALUES ('{$dt[1]}','{$dt[2]}','{$dt[3]}'
														,'{$dt[4]}','{$dt[5]}','{$dt[6]}','{$dt[7]}')");
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
	$workers_result=mysqli_query($connection,"SELECT *FROM workers");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Workers</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UI-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<link href="css/attendance.css" rel="stylesheet"> 
 	<script src='js/jquery-3.1.0.min.js'></script>
	<script src='js/jquery-ui.js'></script>
	<script src='js/attendance.js'></script>
 	<script src='js/bootstrap.min.js'></script>
	<link  rel="stylesheet" href="chosen_v1.4.0/chosen.min.css"> 
	 <script src='chosen_v1.4.0/chosen.jquery.min.js'></script>
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
						<li><a href='workers.php' class='col-lg-12 col-xs-12 active'>Workers</a></li>
						<li><a href='members.php' class='col-lg-12 col-xs-12 '>Members</a></li>
					</ul>
				</div>
				
				<div class='display-cell col-lg-10 col-xs-10 '>
					<div class='col-lg-12 col-xs-12 body'>
						<div class='body-header col-lg-12'>
							<h4 class='text-success'> Workers</h4>
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
						
							<div class='col-lg-12' id='add_form'>
							
								<div class='col-lg-12'>
									<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#add_wk' >
									<span class='glyphicon glyphicon-plus'></span> Add New Worker</button>
									
									<button type='button' class='btn btn-primary' data-toggle='collapse' data-target='#add_wk_excel' >
									<span class='glyphicon glyphicon-plus'></span> Import Excel File</button>
									
		<!---------------------------------Add with excel--------------->
							<div class='col-lg-12 collapse' id='add_wk_excel'>
								<form action='' method='POST' class='form-inline' enctype='multipart/form-data'>
									<legend class='text-success'>Add New Worker Using Excel File</legend>
									<div class='form-group'>
										<label for='wk_excel'>Upload Excel file<label>
										<input type='file' name='wk_excel_file' class='form-control' id='wk_excel' />
									<button type='submit' name='wk_excel' class='btn btn-success'> Import</button> 
									</div>
									
								</form>
							</div>
						
		<!---------------------------------Add with form--------------->
		
									<div class='col-lg-12 collapse' id='add_wk'>
										<form class='' action='workers.php' method='POST' >
										<legend class='text-success'>Add New Worker</legend>
											<div class='form-group col-lg-8'>
												<label for='wk_name'>Full Name</label>
												<input type='text' name='wk_name' class='form-control' id='wk_name' placeholder="Worker's full name"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='wk_unit'>Unit</label>
												<select class='form-control chosen-select' name='wk_unit[]' multiple class='chosen-select'>
													<option>Academy</option>
													<option>Choir</option>
													<option>Dance</option>
													<option>Protocol</option>
													<option>Sanctuary</option>
													<option>Technical</option>
													<option>Welfare</option>
													<option>Decoration</option>
													<option>Logistics</option>
													<option>Media</option>
													<option>Evangelism</option>
												</select>
											</div>
											<div class='col-lg-12'>
											<div class='form-group col-lg-4'>
												<label for='wk_level'>level</label>
												<input type='text' name='wk_level' class='form-control' id='wk_level' placeholder="level"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='wk_phone'>Phone</label>
												<input type='text' name='wk_phone' class='form-control' id='wk_phone' placeholder="Phone Number"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='wk_department'>Department</label>
												<input type='text' name='wk_department' class='form-control' id='wk_department' placeholder="Department in school"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='wk_dob'>D.O.B</label>
												<input type='text' name='wk_dob' class='form-control' id='wk_dob' placeholder="mm/dd"/>
											</div>
											<div class='form-group col-lg-4'>
												<label for='wk_address'>Address</label>
												<textarea class='form-control' name='wk_address' ></textarea>
											</div>
											</div>
											<button type='submit' class='btn btn-success btn-block' name='add_wk' id='add_wk_btn'>Add</button>
											
										</form>
									</div>
								</div>
							</div>
							
							<div class='table-responsive col-lg-12' id='wk_table'>
								<table class='table table-striped table-condensed'>
									<thead>
										<tr>
											<th>Name</th>
											<th>level</th>
											<th>Phone</th>
											<th>Unit</th>
											<th>Dept</th>
											<th>address</th>
											<th>D.O.B</th>
											 
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php    
									while($worker=mysqli_fetch_array($workers_result))
									{ ?> <tr>
											<td><?php echo $worker['name']; ?></td>
											<td><?php echo $worker['level']; ?></td>
											<td><?php echo $worker['phone']; ?></td>
											<td><?php echo $worker['unit']; ?></td>
											<td><?php echo $worker['dept']; ?></td>
											<td><?php echo $worker['address']; ?></td>
											<td><?php echo $worker['dob']; ?></td>
											 
											<td></td>
											<td>
												<div class='btn-group btn-group-xs'>
													<button class='btn btn-danger delete' id="<?php echo $worker['id'];?>">Delete</button>
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
	
	<script>
		
	var config={
		'.chosen-select':{},
		'.chosen-select-deselect':{allow_single_deselect:true},
		'.chosen-select-no-single':{disable_search_threshold:10},
		'.chosen-select-no-result':{no_results_text:'Oops,nothing found!'},
		'.chosen-select-width':{width:'95%'}
	}
	for ( var selector in config)
	{
		$(selector).chosen(config[selector]);
	}
	
	</script>
</body>
</html>