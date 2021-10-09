<?php
include_once("../classes/clsRegistrationManager.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<style>
	</style>
</head>

<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">SlNo</th>
								<th class="column2">ID</th>
								<th class="column3">First Name</th>
								<th class="column4">Last Name</th>
								<th class="column5">Email</th>
								<th class="column6">Phone</th>
								<th class="column7">City</th>
								<th class="column8">Salary</th>
								<th class="column9">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

							if (isset($_GET['btnDelete'])) {
								$id = $_GET['deleteId'];
								include_once("../classes/clsRegistrationManager.php");
								$objRegistrationManager = new clsRegistrationManager();
								$objRegistration = new clsRegistration();

								$objRegistration->setId($id);

								$saveFlag = $objRegistrationManager->DeleteRegistration($objRegistration);
								if ($saveFlag > 0) {
							?>
									<script>
										alert("Delete Successfully");

										window.location.href = "studentDetails.php";
									</script>
								<?php
								} else {
								?>
									<script>
										alert("Delete Failed");
									</script>
								<?php
								}
							}

							$sQuery = "select * from records order by id desc";

							$objRegistrationSet = new clsRegistrationSet();
							$objRegistrationManager = new clsRegistrationManager();
							$objRegistrationSet = $objRegistrationManager->RetrieveRegistrationSet($sQuery);
							$count = $objRegistrationSet->GetCount();


							if ($count > 0) {
								$j = 0;
								for ($i = 0; $i < $count; $i++) {
									$j++;
									$objRegistration = new clsRegistration();
									$objRegistration = $objRegistrationSet->GetItem($i);


									$id = $objRegistration->getId();
									$firstName = $objRegistration->getFirstName();
									$lastName = $objRegistration->getLastName();
									$email = $objRegistration->getEmail();
									$phone = $objRegistration->getPhone();
									$city = $objRegistration->getCity();
									$message = $objRegistration->getMessage();


								?>
									<tr>
										<td class="column1"><?php echo $j ?></td>
										<td class="column2"><?php echo $id ?></td>
										<td class="column3"><?php echo $firstName ?></td>
										<td class="column4"><?php echo $lastName ?></td>
										<td class="column5"><?php echo $email ?></td>
										<td class="column6"><?php echo $phone ?></td>
										<td class="column7"><?php echo $city ?></td>
										<td class="column8"><?php echo $message . " " . "(LPA)" ?></td>
										<td>
											<a href=registration.php?id=<?php echo $id ?>&firstName=<?php echo $firstName ?>&lastName=<?php echo $lastName ?>&email=<?php echo $email ?>&phone=<?php echo $phone ?>&city=<?php echo $city ?>&message=<?php echo $message ?> class='btn btn-default' name='btnEdit' style="background:#9eddf0; cursor: pointer; color: black;">Edit</a>

											<form method="get" class="d-inline">
												<input type="hidden" name="deleteId" value="<?php echo $id; ?>">
												<input type='submit' class='btn btn-default' onclick="return checkdelete()" name='btnDelete' value="Delete" style="background:#e84646; cursor: pointer;">
											</form>
										</td>
									</tr>
							<?php
								}
							}

							?>
							<script>
								function checkdelete() {
									return confirm('Are you Sure Want to delete this Record');
								}
							</script>
						</tbody>
					</table>
				</div>
				<a class="nav-link text-white" href="registration.php">Go to Registration Page</a>
			</div>
		</div>
	</div>

	<script>
		function formUpdate(id,
			firstName,
			lastName,
			email,
			phone,
			city,
			message) {
			// alert(lCompanyId);
			$("#txtShiftId").val(lShiftID);
			$("#cboCompany").val(lCompanyId);
			$("#txtDutyType").val(sDutyType);
			$("#txtShiftName").val(sShiftName.replace('%', ' '));
			$("#txtShiftFrom").val(tShiftTimeFrom);
			$("#txtShiftTo").val(tShiftTimeTo);
			$("#txtWef").val(dShiftWef);
			if (bIsDateChangeShift == "t") {
				$("#rdoIsShiftDateChangeTrue").prop('checked', true);
			} else {
				$("#rdoIsShiftDateChangeFalse").prop('checked', true);
			}
			if (bIsActive == "t") {
				$("#rdoTrue").prop('checked', true);
			} else {
				$("#rdoFalse").prop('checked', true);
			}
		}
	</script>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>