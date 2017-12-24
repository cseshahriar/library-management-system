$('#userid').change(function(){
	var uid = $("#userid").val();
	$.ajax({
		url: 'user_id.php?id='+uid,
		cache: false,
		success:function(user_id_result){ 
			//alert(uid);
			$('#show-result').html(user_id_result);      
		}  
	})
});