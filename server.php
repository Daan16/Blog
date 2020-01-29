<?php
	// initialize variables
	$id = "";
	$titel = "";
	$datum = "";
	$tekst = "";
	$plaatje = "";
	$edit_state = false;

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'blog');

	// if save button is clicked
	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$titel = $_POST['titel'];
		$datum = $_POST['datum'];
		$tekst = $_POST['tekst'];
		$plaatje = $_POST['plaatje'];

		$check = getimagesize($_FILES['image'] ['tmp_name']);
		if ($check !== false) {
			$image = $_FILES['image'] ['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));
		}






		$query = "INSERT INTO post (titel, datum, tekst, plaatje, image) VALUES ('$titel', '$datum', '$tekst', '$plaatje', '$imgContent')";
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Post saved";
		header('location: indexPosts.php'); //redirect to index page
	}	
	//update records
	if (isset($_POST['update'])) {
		$id = mysqli_real_escape_string($db, $_POST['id']);
		$titel = mysqli_real_escape_string($db,$_POST['titel']);
		$datum = mysqli_real_escape_string($db,$_POST['datum']);
		$tekst = mysqli_real_escape_string($db,$_POST['tekst']);
		$plaatje = mysqli_real_escape_string($db,$_POST['plaatje']);

		mysqli_query($db, "UPDATE post SET titel='$titel', datum='$datum', tekst='$tekst', plaatje='$plaatje'  WHERE id='$id'");
		$_SESSION['msg'] = "Post updated";
		header('location: indexPosts.php');
	}
	//delete records
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db,"DELETE FROM post WHERE id=$id");
		$_SESSION['msg'] = "Post deleted";
		header('location: indexPosts.php');
	}

	if (isset($_POST['logout'])) {
		session_destroy();
		header('location: login.html');
	}

	//retrieve records
	$results = mysqli_query($db, "SELECT * FROM post");




?>
