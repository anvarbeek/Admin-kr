<!---------------- Session starts form here ----------------------->
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
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";
	?>
<!---------------- Session Ends form here ------------------------>
<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {
 		$first_name=$_POST["first_name"];
		$last_name=$_POST["last_name"];
 		$middle_name=$_POST["middle_name"];		
 		$last_name=$_POST["last_name"];
		$dob=$_POST["dob"];
 		$email=$_POST["email"];
 		$mobile_no=$_POST["mobile_no"];
		$password=$_POST['password'];
 		$role=$_POST['role']; 		
// *****************************************Images upload code starts here********************************************************** 
// *****************************************Images upload code end here********************************************************** 

 		$query="INSERT INTO student_info(first_name,last_name,middle_name,dob,email,mobile_no)VALUES('$first_name','$last_name','$middle_name','$dob','$email','$mobile_no')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Ma`lumotlaringiz yuborildi";
 		}
 		else {
 			echo "Sizning ma'lumotlaringiz yuborilmagan";
 		}

 		$query2="insert into login(user_id,Password,Role)values('$roll_no','$password','$role')";
 		$run2=mysqli_query($con, $query2);
 		if ($run2) {
 			echo "Sizning ma'lumotlaringiz loginga yuborildi";
 		}
 		else {
 			echo "Sizning ma'lumotlaringiz loginga kiritilmagan";
 		}
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];

		$semester=$_POST['semester'];

		$roll_no=$_POST['roll_no'];

		$subject_code=$_POST['subject_code'];
		$sessio=$_POST['session'];

		$date=date("d-m-y");

		$query3 = "INSERT INTO student_courses(course_code, semester, roll_no, subject_code, session, assign_date) VALUES ('$course_code', '$semester', '$roll_no', '$subject_code', '$sessio','$date')";

		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Ma`lumotlaringiz yuborildi";
 		}
 		else {
 			echo "Sizning ma'lumotlaringiz yuborilmagan";
 		}


	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 
<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Talabani ro'yxatdan o'tkazish</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Talabalarni boshqarish tizimi </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Qo'shish Talaba</button>
						
					</div>
				</div>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info text-white">
							        <h4 class="modal-title text-center">Yangi talaba</h4>
						        </div>
								
							    <div class="modal-body">
								<form action="student.php" method="post" enctype="multipart/form-data">
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Ism:</label>
								<input type="text" name="first_name" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Familya:</label>
								<input type="text" name="last_name" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Otasini ism:</label>
								<input type="text" name="middle_name" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
						    <div class="form-group">
							    <label for="exampleInputEmail1">Tug'ilgan sana:</label>
								<input type="date" name="dob" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Elektron pochta:</label>
								<input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Tel raqam:</label>
								<input type="number" name="mobile_no" class="form-control" required>
							</div>
						</div>
					</div>
							        <!-- <form action="student.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Applicant First Name:*</label>
											        <input type="text" name="first_name" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Applicant Middle Name:</label>
												    <input type="text" name="middle_name" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Applicant Last Name:*</label>
												    <input type="text" name="last_name" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Father Name:*</label>
											        <input type="text" name="father_name" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Student Roll No:</label>
												    <input type="text" name="roll_no" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Applicant Email:*</label>
												    <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Course which you want?: </label>
											        <select class="browser-default custom-select" name="course_code">
													    <option >Select Course</option>
													    <!?php
															$query="select course_code from courses";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
															}
														?>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Select Session:</label>
												    <select class="browser-default custom-select" name="session">
													    <option >Select Session</option>
													    <!?php
															$query="select session from sessions";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['session'].">".$row['session']."</option>";
															}
														?>
													</select>

											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Your Profile Image:</label>
												    <input type="file" name="profile_image" placeholder="Student Age" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Prospectus Issude: </label>
											        <select class="browser-default custom-select" name="prospectus_issued">
													  <option>Select Option</option>
													  <option value="Yes">Yes</option>
													  <option value="No">No</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Prospectus Amount Recvd:</label>
												    <select class="browser-default custom-select" name="prospectus_amount">
													  <option>Select Option</option>
													  <option value="Yes">Yes</option>
													  <option value="No">No</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Form B:</label>
												    <input type="text" name="form_b" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Applicant Status: </label>
											        <select class="browser-default custom-select" name="applicant_status">
													  <option>Select Option</option>
													  <option value="Admitted">Admitted</option>
													  <option value="Not Admitted">Not Admitted</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Application Status:</label>
												    <select class="browser-default custom-select" name="application_status">
													  <option>Select Option</option>
													  <option value="Approved">Approved</option>
													  <option value="Not Approved">Not Approved</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">CNIC No:</label>
												    <input type="text" name="cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="XXXXX-XXXXXXX-X" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Date of Birth: </label>
											        <input type="date" name="dob" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Mobile No:*</label>
												    <input type="number" name="mobile_no" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Gender:</label>
												    <select class="browser-default custom-select" name="gender">
													  <option>Select Gender</option>
													  <option value="Male">Male</option>
													  <option value="Female">Female</option>
													</select>
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Permanent ress: </label>
											        <input type="text" name="permanent_ress" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Current ress:</label>
												    <input type="text" name="current_ress" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Place of Birth:</label>
												    <input type="text" name="place_of_birth" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Matric/OLevel Complition Date: </label>
											        <input type="date" name="matric_complition_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Matric/OLevel Awarded Date:</label>
												    <input type="date" name="matric_awarded_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Upload Matric/OLevel Certificate:</label>
												    <input type="file" name="matric_certificate" class="form-control" value="there is no image">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">FA/ALevel Complition Date: </label>
											        <input type="date" name="fa_complition_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">FA/ALevel Awarded Date:</label>
												    <input type="date" name="fa_awarded_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Upload FA/ALevel Certificate:</label>
												    <input type="file" name="fa_certificate" class="form-control" value="there is no image" >
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">BA Complition Date: </label>
											        <input type="date" name="ba_complition_date" class="form-control" value="0">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">BA Awarded Date:</label>
												    <input type="date" name="ba_awarded_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Upload BA Certificate:</label>
												    <input type="file" value="C:/xampp/htdocs/Imperial University/Images/no-image-available.jpg" name="ba_certificate" class="form-control" >
											    </div>
											</div>
								  		</div> -->
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are here
								  		_________________________________________________________________________________ -->
								  		<div>
											<input type="hidden" name="password" value="student123*">
											<input type="hidden" name="role" value="Student">
								  		</div>
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
								  		<div class="modal-footer">
						   		            <input type="submit" class="btn btn-primary" name="btn_save">
		      								<button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
									    </div>
									</form>
						        </div>
						    </div>
					   </div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							<div class="row">
								<div class="col-md-6">
									<!--qi-->
									<form action="search_student.php" method="post">
										<div class="form-group">
											<label for="exampleInputPassword1"><h5>Qidiruv:</h5></label>
											<div class="d-flex">
												<input type="text" name="search" id="search" class="form form-control" placeholder="Enter I'd">
												<input class="btn btn-primary px-4 ml-4" type="submit" name="btnSearch" value="Search">
											</div>
										</div>
									</form>
								</div>	
								<div class="col-md-12 pt-5 mb-2">
									<!-- Large modal -->
									<button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target=".bd-example-modal-lg1">Mavzularni tayinlash</button>
									<a class="btn btn-success" href="asign-single-student-subjects.php"> Yagona talaba mavzusini tayinlash</a>
									<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">Talabaga mavzularni belgilash</h4>
													</div>
													<div class="modal-body">
														<form action="student.php" method="POST" enctype="multipart/form-data">
															<div class="row mt-3">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Kursni tanlang:*</label>
																		<select class="browser-default custom-select" name="course_code" required="">
																			<option >Kursni tanlang</option>
																			<?php
																				$query="select course_code from courses";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1" required>Semestrga kirish:*</label>
																		<input type="text" name="semester" class="form-control">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1">Talaba ID kiriting:*</label>
																		<input type="text" name="roll_no" class="form-control">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputPassword1">Mavzuni tanlang:*</label>
																		<select class="browser-default custom-select" name="subject_code" required="">
																			<option >Mavzuni tanlang</option>
																			<?php
																				$query="select subject_code from course_subjects";
																				$run=mysqli_query($con,$query);
																				while($row=mysqli_fetch_array($run)) {
																				echo	"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																				}
																			?>
																		</select>
																	</div>
																</div>	
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save2">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
															</div>
														</form>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Talaba ID</th>
									<th>Ism</th>
									<th>Familya</th>
									<th>Otasini ism</th>
									<th>Tug`ilgan kun</th>
									<th>Elektron pochta</th> 
									<th>Telefon</th> 
									
									<th colspan="1">Operations</th>
								</tr>
							   <?php 
								$query="select * from student_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
								
									    <td><?php echo $row["roll_no"] ?></td>
								        <td><?php echo $row["first_name"] ?></td>
								        <td><?php echo $row["last_name"] ?></td>
								        <td><?php echo $row["middle_name"] ?></td>
								        <td><?php echo $row["dob"] ?></td>
								        <td><?php echo $row["email"] ?></td>
								        <td><?php echo $row["mobile_no"] ?></td>
										<!-- date_format($date,"Y/m/d H:i:s"); -->
										
										
										<td width='170'> 
											<?php 
												echo "<a class='btn btn-primary' href=display-student.php?roll_no=".$row['roll_no'].">Profile</a> 
												<a class='btn btn-danger' href=delete-function.php?roll_no=".$row['roll_no'].">Delete</a> "
											?>
										</td>
									</tr>
								<?php }
								?>
							</table>				
						</section>
					</div>
				</div>	 
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>