<?php
     session_start();

	$name ="";
	$address = "";
	$id = 0;
	$edit_state = false;


  //connect to database
	$db = mysqli_connect('localhost','root', '123', 'crud');
 
	//if save button is clicked

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		// die(var_dump($_POST['save']));

		$query ="INSERT INTO info(name,address) VALUES('$name','$address')";
		mysqli_query($db,$query);
		$_SESSION['msg'] = "Address saved";
		header('location: index.php');// redirect to index page after inserting 
	}

	if (isset($_POST['update'])) {
		$name = ($_POST['name']);
		$address = ($_POST['address']);
		$id = ($_POST['id']);

		// die(var_dump($name, $address, $id));

		mysqli_query($db,"UPDATE info SET name='$name',address='$address' where id=$id");
		
		$_SESSION['msg'] = "Address updated";
		header('location: index.php');
	}


    if (isset($_GET['del'])) {
       $id = $_GET['del'];
       mysqli_query($db, "DELETE FROM info where id=$id");
       $_SESSION['msg'] = "Address deleted";
		header('location: index.php');
    }


	 $results = mysqli_query($db,"SELECT * FROM info ");

?>