$(document).on("click",".login-btn",function(){
	var name=$("#username").val();
	var pwd=$("#pwd").val();
	$.post({
		url:"/user/login-check",
		data:{username:name,pwd:pwd},
		dataType:'json',
		success:function(data){
			console.log(data);
		}
	})
})