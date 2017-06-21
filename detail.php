<?php include 'model.php'; 
	$detail = new model;
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("button").click(function(){
	    	var id = $(this).val();
	        $.ajax({
	        	url: "controller.php", 
	        	type: "post",
	        	dataType:"text",
                data : {
                	key : 'delete-detail',
                    id : id
                },
	        	success: function(result){
            	alert(result);
            	location.reload();
        	}});
	    });
	});
	</script>

</head>
<body>
<div><a href="addbook.php">追加</a></div>
	          <table><tr>
            <td>ID</td>
            <td>コメント</td>
            <td>操作</td></table>

        </tr>
        
<?php

	 $detail->detail($id);
?>
<a href='javascript:history.go(-1)'>戻る</a>
</body>
</html>