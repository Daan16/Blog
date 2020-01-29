<?php
session_start();
// opslaan in sessie variabelen

if(!empty($_POST["uname"]))
{
	$_SESSION["username"] = $_POST["uname"];
	$_SESSION["password"] = $_POST["psw"];
}
$un = $_SESSION["username"];
$pw = $_SESSION["password"];








$servername = "localhost";	// standaard verbinding
$username = "root";			// Standaard in Xampp
$password = "";				// leeg
$dbname = "blog";	// de naam van de database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 include('server.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM post WHERE ID=$id");
		$record = mysqli_fetch_array($rec);
		$id = $record['id'];
		$titel = $record['titel'];
		$datum = $record['datum'];
		$tekst = $record['tekst'];
		$plaatje = $record['plaatje'];
		$image = $record['image'];

		
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Posts</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
$sql2 = "SELECT * FROM `users` WHERE `username` = '$un' and `password` = '$pw' ";

$result = $conn->query($sql2);

if ($result->num_rows == 1 ) {

?>
<body>

	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>

	<table>
		<thead>
			<tr>
				<th>Titel</th>
				<th>Datum</th>
				<th>Tekst</th>
				<th>Plaatje</th>
				<th>Image</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) {

			 ?>
				<tr>
					<td><?php echo $row['titel']; ?></td>
					<td><?php echo $row['datum']; ?></td>
					<td><?php echo $row['tekst']; ?></td>
					<td><?php echo $row['plaatje']; ?></td>
					<td><?php 
						header("Content-type: image/jpg");
						echo $row['image']; 
						?></td>
					<td>
						<a class="edit_btn" href="indexPosts.php?edit=<?php echo $row['id']; ?>">
							<img src="Upload.png" width="20px"></a>
					</td>
					<td>
						<a class="del_btn" href="server.php?del=<?php echo $row['id'];?>">
							<img src="Delete.png" width="20px"></a>
					</td>
				</tr>
			<?php }?>
		</tbody>
	</table>

	<form method="post" action="server.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Titel</label>
			<input type="text" name="titel" value="<?php echo $titel; ?>">
		</div>
		<div class="input-group">
			<label>Datum</label>
			<input type="text" name="datum" value="<?php echo $datum; ?>">
		</div>
		<div class="input-group">
			<label>Tekst</label>
			<input type="text" name="tekst" value="<?php echo $tekst; ?>">
		</div>
		<div class="input-group">
			<label>Plaatje</label>
			<input type="file" name="plaatje" value="<?php echo $plaatje; ?>">
		</div>
		<div class="input-group">
			<label>image</label>
			<input type="file" name="image" value="<?php echo $plaatje; ?>">
		</div>
		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="save" class="btn">Save</button>
		<?php else: ?>
			<button type="submit" name="update" class="btn">Update</button>
		<?php endif ?>
			<button type="submit" name="logout" class="btn">Logout</button>
		</div>
	</form>

</body>
<?php
//afsluiten true if
	} else {
		
	
?>
<body>
	<br> Inloggen Mislukt.
</body>
<?php
//aflsuiten else 
	}
?>
</html>
