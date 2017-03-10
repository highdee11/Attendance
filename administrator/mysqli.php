<?php
	session_start();
	global $connection;
	define('DB_SERVER','localhost');
	define('DB_USER','root');
	define('DB_PASSWORD','aladesiun');
	define('DB_NAME','attendance');
	$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
	if($connection)
	{
		$db=mysqli_select_db($connection,DB_NAME);
		if(!$db)
		{
			echo mysqli_error($connection);
		}
		else
		{
			
		}
	}
	else
	{
		echo mysqli_error($connection);
	}



function mysqli_prep($value)
		{    global $connection;
			$magic_quotes_active=get_magic_quotes_gpc();
			$new_enough_php=function_exists("mysqli_real_escape_string");
			if($new_enough_php)
				{
					if($magic_quotes_active)
					{
						$value=stripslashes($value);
					}
					$value=mysqli_real_escape_string($connection,$value);
					
				}
			else
				{
					if(!$magic_quotes_active)
					{
						$value=addslashes($value);
					}
					$value=mysqli_real_escape_string($connection,$value);

				}
				return $value;	
		}
  
  if(isset($_POST['del_wk']))
	{
		$id=$_POST['del_wk'];
		$result=mysqli_query($connection,"DELETE FROM workers WHERE id='{$id}' ");
		if($result)
		{
			echo "Worker removed";
		}
	}
 
  if(isset($_POST['del_mb']))
	{
		$id=$_POST['del_mb'];
		$result=mysqli_query($connection,"DELETE FROM members WHERE id='{$id}' ");
		if($result)
		{
			echo "member removed";
		}
	}

	if(isset($_POST['key']))
	{
		$key=$_POST['key'];
		$date=Date("m_d_Y");
	 	$atten="attendance_".$date;
		$result=mysqli_query($connection,"SELECT  name,id,unit FROM workers WHERE name LIKE '%".$key."%' UNION ALL SELECT name,id,unit FROM members WHERE name LIKE '%".$key."%' "); 
	
		if($result)
		{
		  
			while($res=mysqli_fetch_array($result))
			{
				 $id=$res['id'];
				 $re_name=$res['name'];
				 $name=str_replace(' ' ,',',$res['name']);
				 $unit=$res['unit'];
				 if($unit=='')
				 {
					 $unit='Member';
				 }
				 
				 $result1=mysqli_query($connection,"SELECT  *FROM $atten WHERE name ='{$re_name}' LIMIT 1");
				 if($result1)
				 {
					 if(mysqli_num_rows($result1)>0)
					 {
						 $rs=mysqli_fetch_array($result1);
						 $id=$rs['id'];	
						 echo " 
									
									<li class='present ' id={$id}  data-p={$name} style='padding:0px;'> 
										<img src='images/usericon.png' style='position:absolute;Z-index:-2' width='119px' height='94px' />
										<p class='col-lg-12' style='padding-top:5px;height:70px'> {$res['name']} </p>
									<div class='status col-lg-12 ' style='display:block;background:green;position:relative;width:119px;height:25px;
											text-align:center;color:white;margin-top:-12px;font-size:12px;opacity:0.7'>
										Present </div>
									
									</li>
								";
					 }
					 else
					 {
						 
						 echo " <li class='nm ' style='padding:0px;' id={$id}  data-p={$name} >
							<img src='images/usericon.png' style='position:absolute;Z-index:-2' width='119px' height='94px'/>
							<p class='col-lg-12' style='padding-top:5px;height:70px;overflow:hidden'> {$res['name']} </p>
							
					
							";
					 }
				 }
				 else
				 {
					 echo " <li class='nm' style='padding:0px;' id={$id}  data-p={$name} >
							<img src='images/usericon.png' style='position:absolute;Z-index:-2' width='119px' height='94px'/>
							<p class='col-lg-12' style='padding-top:5px;height:70px;overflow:hidden'> {$res['name']} </p>
								
					
							</li> 
							</li> 
							";
				 }
				 
			
			}
		}
		else
		{
			echo "<b class='text-danger'>NO MATCH FOUND</b>";
		}
		
	}


	
	
	if(isset($_POST['mark']))
	{
		$date=Date("m_d_Y");
		$id=$_POST['mark'];
		$p=$_POST['p'];
		$p=str_replace(',' ,' ',$p);
		$atten="attendance_".$date;
		$chk_result=mysqli_query($connection,"SELECT *FROM $atten");
		if($chk_result)
		{
			
			$result=mysqli_query($connection,"SELECT *FROM workers WHERE id='{$id}' AND name='{$p}' LIMIT 1");
					if($result)
					{	
							 
						if(mysqli_num_rows($result)>0)
							{    
								 
								$res=mysqli_fetch_array($result);
								$name=$res['name'];
								$level=$res['level'];
								$phone=$res['phone'];
								$address=$res['address'];
								$dept=$res['dept'];
								$unit=$res['unit'];
								$dob=$res['dob'];
									$time=Date("H:i");
								$fd=mysqli_query($connection,"INSERT INTO $atten (name,level,phone,address,dept,unit,dob,time) VALUES ('{$name}','{$level}'
									,'${phone}','{$address}','{$dept}','{$unit}','{$dob}','{$time}') ");
									if($fd)
										{
											 
										}
									else
										{
											echo mysqli_error($connection);
										}

							}
							else
							{
								 
								$result=mysqli_query($connection,"SELECT *FROM members WHERE id='{$id}' AND name='{$p}' LIMIT 1");
								if($result)
								{	
									if(mysqli_num_rows($result)>0)
										{
											$res=mysqli_fetch_array($result);
											$name=$res['name'];
											$level=$res['level'];
											$phone=$res['phone'];
											$address=$res['address'];
											$dept=$res['dept'];
											$unit='null';
											$dob=$res['dob'];
												$time=Date("H:i");
											$fd=mysqli_query($connection,"INSERT INTO $atten (name,level,phone,address,dept,unit,dob,time) VALUES ('{$name}','{$level}'
										,'${phone}','{$address}','{$dept}','{$unit}','{$dob}','{$time}') ");
												if($fd)
													{
														 
													}
												else
													{
														echo mysqli_error($connection);
													}

										}
								}
							}
							
								

					}
					else
					{
						
					  echo mysqli_error($connection);
					}
		}
		else
		{
			 
			$create_result=mysqli_query($connection,"CREATE TABLE $atten (
					id int (100)  AUTO_INCREMENT ,
					name varchar (100),
					level varchar (100),
					phone varchar (100),
					dept varchar (30),
					unit varchar (100),
					address varchar (200),
					dob varchar (10),
					time varchar (20),
					PRIMARY KEY(id)
					)
					
					");
					mysqli_query($connection,"INSERT INTO attendance (name) VALUES ('{$atten}')");
				if(!$create_result)
				{
					echo mysqli_error($connection);
				}
					$result=mysqli_query($connection,"SELECT *FROM workers WHERE id='{$id}' AND name='{$p}' LIMIT 1");
					if($result)
					{	
						if(mysqli_num_rows($result)>0)
							{
								$res=mysqli_fetch_array($result);
								$name=$res['name'];
								$level=$res['level'];
								$phone=$res['phone'];
								$address=$res['address'];
								$dept=$res['dept'];
								$unit=$res['unit'];
								$dob=$res['dob'];
								$time=Date("H:i");
							$fd=mysqli_query($connection,"INSERT INTO $atten (name,level,phone,address,dept,unit,dob,time) VALUES ('{$name}','{$level}'
									,'${phone}','{$address}','{$dept}','{$unit}','{$dob}','{$time}') ");
									if($fd)
										{
 										}
									else
										{
											echo mysqli_error($connection);
										}

							}
							else
							{
								$result=mysqli_query($connection,"SELECT *FROM members WHERE id='{$id}' AND name='{$p}' LIMIT 1");
								if($result)
								{	
									if(mysqli_num_rows($result)>0)
										{
											$res=mysqli_fetch_array($result);
											$name=$res['name'];
											$level=$res['level'];
											$phone=$res['phone'];
											$address=$res['address'];
											$dept=$res['dept'];
											$unit='null';
											$dob=$res['dob'];
												$time=Date("H:i");
											$fd=mysqli_query($connection,"INSERT INTO $atten (name,level,phone,address,dept,unit,dob,time) VALUES ('{$name}','{$level}'
												,'${phone}','{$address}','{$dept}','{$unit}','{$dob}','{$time}') ");
												if($fd)
													{
														 
													}
												else
													{
														echo mysqli_error($connection);
													}

										}
								}
							}
							
					}
					else
						{
							echo mysqli_error($connection);
						}

					}
		}
		
		
	
	
	
	
	
	
	
	
	if(isset($_POST['iden']))
	{
		$iden=$_POST['iden'];
		$atten=$_POST['atten'];
		if($iden=='workers')
		{
			$res_of_workers=mysqli_query($connection,"SELECT *FROM $atten WHERE unit !='null' ");
			 while($res=mysqli_fetch_array($res_of_workers))
									{ 
									
										echo "<tr>
											<td>{$res['name']}</td>
											<td>{$res['level']}</td>
											<td>{$res['phone']}</td>
											<td>{$res['unit']}</td>
											<td>{$res['dept']}</td>
											<td>{$res['address']}</td>
											<td>{$res['dob']}</td>
												<td>{$res['time']}</td>
											
													
												</tr>"; 
									} 
		}
		else
		{
			$res_of_workers=mysqli_query($connection,"SELECT *FROM $atten WHERE unit='null' ");
			 while($res=mysqli_fetch_array($res_of_workers))
									{ 
									
										echo "<tr>
											<td>{$res['name']}</td>
											<td>{$res['level']}</td>
											<td>{$res['phone']}</td>
											<td>{$res['unit']}</td>
											<td>{$res['dept']}</td>
											<td>{$res['address']}</td>
											<td>{$res['dob']}</td>
												<td>{$res['time']}</td>
											<td></td>
													
												</tr>"; 
									} 
		}
	}
	
	
	
	
	if(isset($_POST['exp']))
	{
		$iden=$_POST['ident'];
		$atten=$_POST['exp'];
		if($iden=='workers')
		{
			 
			$export=array();
			$result=mysqli_query($connection,"SELECT *FROM $atten WHERE unit!='null' ");
			$file=fopen("download/workers $atten.csv","w");
			$title=array("NO","NAME","LEVEL","PHONE","DEPT","UNIT","ADDRESS","DOB","TIME");
			fputcsv($file,$title,',');
			 	while($res=mysqli_fetch_row($result))
						{ 
							array_push($export,$res);
							
						}
					foreach($export as $line)
					{	
						 
						fputcsv($file,$line,',');
					}
					
			
		}else
		{
					$export=array();
					 
			$result=mysqli_query($connection,"SELECT *FROM $atten WHERE unit='null' ");
			$file=fopen("download/members $atten.csv","w");
			$title=array("NO","NAME","LEVEL","PHONE","DEPT","UNIT","ADDRESS","DOB","TIME");
			fputcsv($file,$title,',');
			 	while($res=mysqli_fetch_row($result))
						{ 
							array_push($export,$res);
							
						}
					foreach($export as $line)
					{	
						 
						fputcsv($file,$line,',');
					}
					
		}
	
	}
	
	

	
	if(isset($_POST['curr']))
	{
		$id=$_POST['curr'];
		$name=$_POST['curr_name'];
		$result=mysqli_query($connection,"DELETE FROM attendance WHERE id='{$id}' AND name='{$name}'");
		if(!$result)
		{
			echo mysqli_error($connection);
		}
		$result=mysqli_query($connection,"DROP TABLE $name");
		if(!$result)
		{
			echo mysqli_error($connection);
		}
	}
	
	
	
	
	
	if(isset($_POST['absent']))
		{
			$id=$_POST['absent'];
			$date=Date("m_d_Y");
	 	    $atten="attendance_".$date;
			$con=new PDO("mysql:host=localhost;dbname=attendance;",'root' ,'aladesiun' );
			$result=$con->prepare("delete from $atten where id=:Id");
			$result->bindparam(":Id",$id);
			if($result->execute())
			{
				echo 'removed';
			}
			else
			{
				echo 'not removed';
			}
		}
	
	

?>