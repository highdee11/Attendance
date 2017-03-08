
<!DOCTYPE html>
<html>
<head>
	<title>TWC Attendance</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UI-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<link href="css/frontattendance.css" rel="stylesheet"> 
 	<script src='js/jquery-3.1.0.min.js'></script>
	<script src='js/jquery-ui.js'></script>
	<script src='js/frontattendance.js'></script>
 	<script src='js/bootstrap.min.js'></script>
</head>
<body class='container-fluid' >
	<div class='banner row'>
		<img src='images/banner.jpg' alt='banner ' class='img responsive' />
	</div>
	<nav class='navbar navbar-inverse navbar-fixed-top'>
		<div class='navbar-heading'>
			<div class='navbar-title'>
				<a style='padding-top:2px;' href='' class='navbar-brand' ><img src='images/ChurchLogo.png' width='40px' alt='logo' class='img-responsive'/> </a>
			</div>
			
		</div>
		
		<div class='col-lg-4 col-lg-offset-8' id='time' style='color:white'></div>
	</nav>
	
	<div class='col-lg-12 body-content' >
		<div class='col-lg-12 body-header hide-border'>
			<div class='col-lg-6 form '>
				<form class='key-form  stay-cente'>
					<div class='form-group'>
						<label for='key'>Search Name</label>
						<input class='form-control' type='text' name='key' id='key'   placeholder='search name' />
					</div>
				</form>
			</div>
		</div>
		
		<div class='col-lg-12 body-cont ' >
			<div class='col-lg-12' id='results'>
				<ul>
					  
				</ul>
			</div>
		</div>
	</div>
</body>
</html>