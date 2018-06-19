//提交文章添加
$(".btn-primary").click(function(){
	var ar_name=$("#articletitle").val();
	var ar_type=$(".select").val();
	var ar_desc=$(".textarea").val();
	var ar_sort=$("#articlesort").val();
	var ar_zhuan=$("#allowcomments").val();
	var ar_url=$("#sources").val();
	var ar_content=UE.getEditor('editor').getContent();
})