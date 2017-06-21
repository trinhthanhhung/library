<?php 
	include 'model.php';
	
	$key = $_POST["key"];
	if ($key=="delete") {
		if(isset($_POST['id']) && !empty($_POST['id'])) {
		$id =$_POST['id'];
		$delete = new model;
		$delete ->delete($id);
		}
	}

	if ($key=="delete-detail") {
		if(isset($_POST['id']) && !empty($_POST['id'])) {
		$id =$_POST['id'];
		$delete = new model;
		$delete ->delete_details($id);
		}
	}


	if($key=="update"){
		
		if(isset($_POST['id']) && !empty($_POST['id'])) {
		$id =$_POST['id'];
		$update = new model;
		$update->update($id);
	}
}
		if($key=="comment"){
		$comment = new model;
		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id =$_POST['id'];
			$comment->comment($id);
		}
	}
 ?>