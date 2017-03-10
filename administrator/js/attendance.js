$(function(){

	//--------------------------------add worker verification--------------------------
	$("#add_wk_btn").click(function(){
		var bool=true;
			$("#add_wk form .form-control").each(function(){
				var val=$(this).val();
				var parent=$(this).parent();
				val==''? bool=false:bool=true;
				
				if(bool==false)
				{
					parent.addClass('has-warning');
					return false;
				}
				parent.removeClass('has-warning');
			});
			if(bool==false)
			{
				return false;
			}
	});
	
	//--------------------------------add member verification--------------------------
	$("#add_mb_btn").click(function(){
	 
		var bool=true;
			$("#add_mb form .form-control").each(function(){
				var val=$(this).val();
				var parent=$(this).parent();
				val==''? bool=false:bool=true;
				
			 if(bool==false)				
				 {
						parent.addClass('has-warning');
						return false;
				}
				parent.removeClass('has-warning');
			});
			if(bool==false)
			{
				return false;
			}
	});
	
	
	//--------------------deleting a worker----------------------------------------------
	$(".delete").each(function(){
		$(this).click(function(){
			var id=$(this).attr('id');
			 $.post('mysqli.php',{del_wk:id},function(data){
				 alert(data);
				 window.location="workers.php";
			 });
		});
	});
	
	
	
	
	//--------------------deleting a Member----------------------------------------------
	$(".delete_mb").each(function(){
		$(this).click(function(){
			var id=$(this).attr('id');
			 $.post('mysqli.php',{del_mb:id},function(data){
				 alert(data);
				 window.location="members.php";
			 });
		});
	});
	
	
	$("#identity").change(function(){
		var iden=$(this).val();
		var atten=$(this).attr('atten');
		$.post('mysqli.php',{iden:iden,atten:atten},function(data){
			$(".att-form tbody").html(data);
		});
		
	});
	
	$("#export").click(function(){
		var iden=$("#identity").val();
		var atten=$("#identity").attr('atten');
		if(iden!='')
			{  
				$.post('mysqli.php',{exp:atten,ident:iden},function(data){
					$(".download_"+iden).removeClass('hidden');
				});
			}
		else
			{
				alert("Please Speficy if you are printing workers list or members list.");
			}
		});
	
	 
	 
	 
	 
	 $(".del").each(function(){
		 $(this).click(function(){
			 var curr=$(this).attr('data-id');
			 var curr_name=$(this).attr('data-name');
			 $.post('mysqli.php',{curr:curr,curr_name:curr_name},function(data){
				window.location='index.php';
			 });
		 });
	 });
	
	
	
});