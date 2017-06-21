<?php include 'model.php' ;
	$add = new model;
	$add->add();
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
	    $("button.submit").click(function(){
	    	var name =$('input.name').val();
	    	var publisher =$('input.publisher').val();
	    	var page = $('input.page').val();
	    	if(!name){
	    		alert('Name Error');
	    		exit();
	    	}
	    	if(!publisher){
	    		alert('publisher Error ');
	    		exit();
	    	}
			if(!page||page<0){
				alert('page Error');
				exit();
			}
	    });
	});
	</script>
</head>
<body>

<div class="conterner">
<form action="" method="post">
    <table>
        <tr>
            <th>書籍名::</th>
            <td><input class="name" type="text" name="name" value=""></td>
        </tr>

        <tr>
            <th>出版社名:</th>
            <td><input class="publisher" type="text" name="publisher" value=""></td>
        </tr>

        <tr>
            <th>ページ数:</th>
            <td><input class="page" type="number" min="0" name="page" value=""></td>
        </tr>

      
    </table>
    <button class="submit" type="submit">送信</button>
    <button type="button" ><a href='index.php'>戻る</a></button>
</form>

</div>
</body>
</html>