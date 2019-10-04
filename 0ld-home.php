<?php

$data = json_decode(file_get_contents("users.json"), true);
// Start session
session_start();
if (isset($_SESSION['Name'])) {
	$user['Name'] = $_SESSION['Name'];
} else {
	header('location: index.php');
	exit();
}
?>

<!DOCTYPE html>
<div class="no-js">


	<head>
		<meta charset="utf-8">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>NetWorth &mdash; Login</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>



		<div class="wrap">
			<h1>Net worth Calculator</h1>
			<h3 class="wl-note">Welcome, <?php echo $user['Name']; ?></h3>
			<section class="form-container">
				<form id="myForm">
					<div class="input-container">
						<h3>Check your Net worth</h3>
						<!-- <span>Enter your Assets in value</span> -->
						<input type="text" class="input" id="assets" name="assets" placeholder="Asset value">
						<!-- <span>Enter your Liquid asset in value</span> -->
						<input type="text" class="input" id="cash" name="liquid-asset" placeholder="Cash value">
						<!-- <span>Enter your Liabilities in value</span> -->
						<input type="text" class="input" id="liability" name="liabilities" placeholder="liability value">
						<button style="width: 100%" type="button" id="calc-asset" class="btn-sign-in trigger">Calculate Net Worth</button>
						<button style="width: 100%; margin-top: -15px" type="button" id="submit-asset" class="btn-sign-in" onclick="restCalc()">Reset Calculator</button>
					</div>
				</form>
				<div class="display-result">
					<div class="display-result-content">
						<span class="close-btn">×</span>
						<h3>Your current Net worth: <span id="result"></span>
						</h3>
					</div>
				</div>

				<?php

				/* Logout button */
				if (isset($_POST['logout'])) {
					session_destroy();
					session_unset();

					/* Redirect to login page */
					header('location: index.php');
				}

				?>
				<div class="logout">
					<form action="home.php" method="post">
						<button style="width: 100%" type="submit" class="btn-sign-in" name="logout">Logout</button>
					</form>
				</div>

			</section>
		</div>

		<script src="app.js"></script>
	</body>

</div>