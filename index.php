<?php include 'model.php'; 
	$view = new model;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("button.delete").click(function(){
	    	var id = $(this).val();
	        $.ajax({
	        	url: "controller.php", 
	        	type: "post",
	        	dataType:"text",
                data : {
                	key : 'delete',
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
	          <tr>
            <td>ID</td>
            <td>書籍名</td>
            <td>出版社</td>
            <td>ページ数</td>
            <td>操作</td>
        </tr>
<?php

	 $view->views();
?>
</body>
</html>