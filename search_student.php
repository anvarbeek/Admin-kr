<?
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$database = "college";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	
	// Check connection
	if (!$conn) {
	  die("Ulanish amalga oshmadi: " . mysqli_connect_error());
	}
	echo "Muvaffaqiyatli ulandi";
	
	?>
<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>



<!---------------- Search Student form here ------------------------>

<?php
	if(isset($_POST["btnSearch"]))
    {
		$userId = $_POST['search'];
        $query="select * from login where user_id='$userId' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
				echo $_SESSION['LoginStudent']=$row['user_id'];
				header('Location: ../student/student-index.php');
            }
        }
        else
        { 
            header("Location: student.php");
        }
	}
	
?>

<!---------------- Search Student form here ------------------------>