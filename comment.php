<?php include 'model.php' ;
	$view_comment = new model;
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Comment</title>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("button.button").click(function(){
	    	var comment = $('textarea.comment').val();
	    	var id = $('input.id').val();
	    	if(!comment){
	    		alert('Error');
	    		exit();
	    	}
	            $.ajax({
	        	url: "controller.php", 
	        	type: "post",
	        	dataType:"text",
                data : {
                	id:id,
                    key : 'comment',
                    comment: comment
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
<div>コメント</div>
	<textarea class="comment" rows="4" cols="50" name="comment" value=""><?php echo $view_comment ->view_comment($id); ?></textarea>
<button class="button" type="button">送信</button>
<button type="button" ><a href='javascript:history.go(-1)'>戻る</a></button>
<input class="id" type="hidden" name="" value="<?php echo $id; ?>">
</body>
</html>