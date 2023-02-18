<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php 
	 if (isset($_GET['delete'])) {
		$department_id = $_GET['delete'];
		$sql = "DELETE FROM tbldepartments where id = ".$department_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Lab deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'department.php'; </script>";
			
		}
	}
?>

<?php
 if(isset($_POST['edit']))
{
	 $deptname=$_POST['departmentname'];
	 $deptshortname=$_POST['departmentshortname'];

    $result = mysqli_query($conn,"update tbldepartments set DepartmentName = '$deptname' , DepartmentShortName ='$deptshortname' where id = '$get_id' ");
    if ($result) {
     	echo "<script>alert('Record Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'department.php'; </script>";
	} else{
	  die(mysqli_error());
   }
}

?>
<body>
	

	<?php include('includes/navbar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Special Lab List</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Edit Details</h2>
								<section>
									<?php
									$query = mysqli_query($conn,"SELECT * from tbldepartments where id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>

									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Lab Name</label>
												<input name="departmentname" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['DepartmentName']; ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Lab Code</label>
												<input name="departmentshortname" type="text" class="form-control" required="true" autocomplete="off" style="text-transform:uppercase" value="<?php echo $row['DepartmentShortName']; ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-primary" type="submit" value="SAVE" name="edit" id="edit">
									    </div>
									</div>
								   </form>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Special Labs</h2>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th>S.NO</th>
											<th class="table-plus">SPECIAL LAB</th>
											<th>LAB CODE</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from tbldepartments";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{               ?>  

											<tr>
												<td> <?php echo htmlentities($cnt);?></td>
	                                            <td><?php echo htmlentities($result->DepartmentName);?></td>
	                                            <td><?php echo htmlentities($result->DepartmentShortName);?></td>
												<td>
													<div class="table-actions">
														<a href="department.php?delete=<?php echo htmlentities($result->id);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
													</div>
												</td>
											</tr>

											<?php $cnt++;} }?>  

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>