$(function(){
	
	$("#key").keyup();
	$("#key").focus();
	
//---------------------time-----------------
time();
function time()
{
	$("#time").html(new Date());
	setTimeout(function(){time();},1000);
}
	//-----------------------------------keyup of the key field-----------------------
	$("#key").keyup(function(){
		$(".stay-center").removeClass('stay-center');
		$(".body-header").removeClass('hide-border');

		var present=$(".body-cont ul li:first-child");
		slideup();
		function slideup(){
			present=present;
			$(present).removeClass('slide-right').removeClass('hidden');
			present=present.next();
			setTimeout(function(){ slideup(); },10);
			
		}
		});

			
function update( ){
 
		var val=$("#key").val();
		$.post("../Attendance/administrator/mysqli.php",{key:val},function(data){
		   $(".body-cont ul").html(data);
			//$('.present').css('background','red');
			$('.present').hover(function(){
				$(this).css('transform','scale(1)');
			});
			});
			$("#key").keyup();
			$("#key").focus();
}
	//update();
	
	 
					
	//-------------------------------search name------------------------------------------
	$("#key").keyup(function(){
		var val=$(this).val();
		$.post("../attendance/administrator/mysqli.php",{key:val},function(data){
		 $(".body-cont ul").html(data);
			$('.present').hover(function(){
				$(this).css('transform','scale(1)');
			});
			 
			$(".nm").each(function(){
				$(this).hover(function()
					{
						$(this).find('div').css('height','25px');
					});
				
			});
				var present=$(".body-cont ul li:first-child");
							slideup();
				function slideup(){
					present=present;
					$(present).removeClass('slide-right').removeClass('hidden');
					present=present.next();
					setTimeout(function(){ slideup(); },1);
					
				}	
				
	//------------------------------------------click event of result while searching--------------------------------
				$(".body-cont ul li").each(function(){
					$(this).click(function(){
							 if($(this).hasClass('nm'))
									 {
										var id=$(this).attr('id');
										var p=$(this).attr('data-p');
										 $.post('../attendance/administrator/mysqli.php',{mark:id,p:p},function(data){
											update();
											$("#key").keyup();
											$("#key").focus();
											 
										 });
									 }
								});
							});
							
							
					$(".present").click(function(){
						var element=$(this);
						var id=$(this).attr('id');
						 $.post('../attendance/administrator/mysqli.php',{absent:id},function(data){
							 update();
							 
						 });
					});
	
		 
						});	


	 						
	
	});
	

			
			
			
});