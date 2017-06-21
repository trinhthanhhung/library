<?php include 'model.php' ;
	$edit = new model;
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.conterner{
			padding: auto;

		}
		input.name,input.year,input.number{

		}
	</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	    $("button.button").click(function(){
	    	var name = $('input.name').val();
	    	var publisher = $('input.publisher').val();
	    	var page = $('input.page').val();
	    	var id = $('input.id').val();
	            $.ajax({
	        	url: "controller.php", 
	        	type: "post",
	        	dataType:"text",
                data : {
                	id:id,
                    key : 'update',
                    name: name,
                    publisher:publisher,
                    page:page
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

<div class="conterner">
    <?php 
$edit->edit($id);

     ?>
    <button class="button" type="button">送信</button>
    <button type="button" ><a href='javascript:history.go(-1)'>戻る</a></button>
    <input class="id" type="hidden" name="" value="<?php echo $id; ?>">


</div>
</body>
</html>