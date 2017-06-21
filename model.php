<?php 
include 'connection.php';

class model{
	public function views(){
		global $connect ;

		$sql ='SELECT * FROM books';
		$result = mysqli_query( $connect,$sql );
		if(! $result ){
			die('Error database: ' . mysqli_error());
		}

		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	          echo ' <table>
				      	<tr class="delete_'.$row['id'].'">
				            <td>'.$row['id'].'</td>
				            <td>'.$row['name'].'</td>
				            <td>'.$row['publisher'].'</td>
				            <td>'.$row['page'].'</td>
				            <td><a href="edit.php?id='.$row['id'].'" title="">修正</a></td>
				            <td><button class="delete"  name="delete" type="button" value="'.$row['id'].'">削除</button></td>
				            <td><a href="detail.php?id='.$row['id'].'" title="">感想の一覧</a></td>

				        </tr>
				    </table>';
	    }
	    mysqli_free_result($result);
	    mysqli_close($connect);
	}



	public function edit($id){
		global $connect ;

		$sql ='SELECT * FROM books where id ='.$id.'';
		$result = mysqli_query( $connect,$sql );
		if(! $result ){
			die('Error database: ' . mysqli_error());
		}
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
		echo '<table>
		        <tr>
		            <th>書籍名::</th>
		            <td><input class="name" type="text" name="name" value="'.$row['name'].'"></td>
		        </tr>

		        <tr>
		            <th>出版社名:</th>
		            <td><input class="publisher" type="text" name="publisher" value="'.$row['publisher'].'"></td>
		        </tr>

		        <tr>
		            <th>ページ数:</th>
		            <td><input class="page" type="number" min="0" name="page" value="'.$row['page'].'"></td>
		        </tr>

		      
		    </table>';
		}
	    mysqli_free_result($result);
	    mysqli_close($connect);
	
	}
	public function update($id){
		global $connect ;

		if(isset($_POST["name"])) { $name = $_POST['name']; }
		if(isset($_POST["publisher"])) { $publisher = $_POST['publisher']; }
		if(isset($_POST["page"])) { $page = $_POST['page']; }
		$sql = 'UPDATE books
		 SET name ="'.$name.'",publisher="'.$publisher.'",page='.$page.'
		 WHERE id='.$id.'';
		if (mysqli_query($connect, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($connect);
		}

		mysqli_close($connect);
	
	}
	public function add(){
		global $connect ;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    if(isset($_POST["name"])) { $name = $_POST['name']; }
		    if(isset($_POST["publisher"])) { $publisher = $_POST['publisher']; }
		    if(isset($_POST["page"])) { $page = $_POST['page']; }

		    $sql = "INSERT INTO  books (name, publisher, page)
		    VALUES ('$name', '$publisher', '$page')";

		    if ($connect ->query($sql) === TRUE) {
		        echo "Add database success";
		    } else {
		        echo "Error: " . $sql . "<br>" . $connect->error;
		    }
		}

		mysqli_close($connect);
	}

	public function delete($id){
		global $connect ;

		$sql_details ='SELECT name FROM book_details
		WHERE book_id = '.$id.'';
		$result = mysqli_query( $connect,$sql_details );
		$count = mysqli_num_rows($result);
		if($count>0){
			mysqli_query( $connect,'DELETE FROM book_details
	        WHERE book_id='.$id.'' );
		}

		$sql = 'DELETE FROM books
        WHERE id='.$id.'';
		$retval = mysqli_query( $connect,$sql );
		if(! $retval ){
			die('Error delete database: ' . mysqli_error());
		}
		echo "Delete  database success\n";
		mysqli_close($connect);
	}


	public function delete_details($id){
		global $connect ;
		$sql = 'DELETE FROM book_details
        WHERE id='.$id.'';
		$retval = mysqli_query( $connect,$sql );
		if(! $retval ){
			die('Error delete database: ' . mysqli_error());
		}
		echo "Delete  database success\n";
		mysqli_close($connect);
	}

	public function detail($id){
		global $connect ;
		$sql ='SELECT * FROM book_details
		WHERE book_id = '.$id.'';
		$result = mysqli_query( $connect,$sql );
		$count = mysqli_num_rows($result);
		if(!$result||$count <=0){
			
	          echo ' <table>
				      	<tr class="">
				            <td>'.$id.'</td>
				            <td></td>
				            <td><a href="comment.php?id='.$id.'" title="">修正</a></td>
				            <td><button  name="delete" type="button" value="">削除</button></td>
				        </tr>
				    </table>';
			 
		}else{
			while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
		          echo ' <table>
					      	<tr class="delete_'.$row['id'].'">
					            <td>'.$row['id'].'</td>
					            <td>'.$row['name'].'</td>
					            <td><a href="comment.php?id='.$row['id'].'" title="">修正</a></td>
					            <td><button  name="delete" type="button" value="'.$row['id'].'">削除</button></td>
					        </tr>
					    </table>';
		    }
		    mysqli_free_result($result);
		    mysqli_close($connect);
		}

	}

	public function view_comment($id){
		global $connect ;
		$sql ='SELECT name FROM book_details WHERE id='.$id.'';
		$result = mysqli_query( $connect,$sql );
		if(! $result ){
			die('Error database: ' . mysqli_error());
		}

		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	          $comment=$row['name'];
	          return $comment;
	    }
	    mysqli_free_result($result);
	    mysqli_close($connect);
	}
	public function comment($id){
		global $connect ;
		if(isset($_POST["comment"])) { $comment = $_POST["comment"]; }
		$sql ='SELECT name FROM book_details
		WHERE book_id = '.$id.'';
		$result = mysqli_query( $connect,$sql );
		$count = mysqli_num_rows($result);
		if(!$count){
			$sql = "INSERT INTO  book_details(name, book_id)
		    VALUES ('$comment', '$id')";

		    if ($connect ->query($sql) === TRUE) {
		        echo "Add database success";
		    } else {
		        echo "Error: " . $sql . "<br>" . $connect->error;
		    }

			mysqli_close($connect);
		}else{
			$sql = 'UPDATE book_details
			 SET name ="'.$comment.'"
			 WHERE id='.$id.'';
			if (mysqli_query($connect, $sql)) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . mysqli_error($connect);
			}

			mysqli_close($connect);
		}


	}


}

?>

