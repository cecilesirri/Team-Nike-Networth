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
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- JavaScript -->
  <script src="app.js"></script>


  <title>SignIn</title>
  <style type="text/css">
    #printablediv {
      padding: 2em;
      font-family: 'Montserrat', serif;
    }

    .head-txt {
      padding-top: 50px;
      font-size: 5vw;
    }

    .btn {
      border-radius: 0;
      outline: none;
    }

    .btn-primary {
      background: #344A84;
      outline: none;
    }
  </style>
  <script language="javascript" type="text/javascript">
  function printerDiv(printablediv) {
	  var divElements = document.getElementById(printablediv).innerHTML;
	  var oldPage = document.body.innerHTML;
	  document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
	  window.print();
	  document.body.innerHTML = oldPage;
	  
  }
  </script>
</head>

<body>
  <header class="text-center mt-2">
    <h1 class="head-txt">Net Worth Calculator</h1>
    
	<div class="alert alert-primary" role="alert">
      <span>All input fields must be filled, to get an accurate calculation! <br>
      <b>Insert Zero(0), if the input field has to be empty!</b> </span>
    </div>
  </header>
  <div id="printablediv">
   <h3 class="wl-note lead mb-2">Welcome, <?php echo $user['Name']; ?></h3> 
	
    <div class="row net-dis1">
      <div class="col-sm">
        <h3 class="lead text-center">Your Assets(what you own)</h3>
        <form class="form-box net-display text-center">
          <div class="form-group">
            <label class="col-xs sr-only">-Land Properties</label>
            <input class="col-xs form-control" id="land" type="number" name="land_properties" onchange="add()" placeholder="Land Properties" required>
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Funitures</label>
            <input class="col-xs form-control" id="furniture" type="number" name="furniture" onchange="add()" placeholder="Funitures" required>
          </div>
          <div class="form-group">
            <label class="col-xs  sr-only">-Vehicles</label>
            <input class="col-xs form-control" id="vehicles" type="number" name="vehicles" onchange="add()" placeholder="Vehicles" required>
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Royalty Payments</label>
            <input class="col-xs form-control" id="royalty" type="number" name="royalty_payments" onchange="add()" placeholder="Royalty Payments" required>
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">Add other Assets</label>
            <input class="col-xs form-control" id="others" type="number" name="other_assets" onchange="add()" placeholder="Add other Assets" required>
          </div>
          <input class="calc-btn btn btn-primary" type="reset" value="Reset Assets" name="reset">
		  
          <div class="form-group mt-4">
            <label class="col-xs sr-only">Total Assests:</label>
            <input class="col-xs form-control" id="total" type="number" name="total_assets" onchange="add()" placeholder="Total Assests" disabled><br>
          </div>
		  
        </form>
      </div>
      <div class="col-sm">
        <h3 class="h2-back lead text-center">Your Liabilities(what you owe)</h3>
        <form class="form-box net-display text-center">
          <div class="form-group">
            <label class="col-xs sr-only">-Expenses</label>
            <input class="col-xs form-control" id="expenses" type="number" name="expenses" onchange="addLiabilities()" placeholder="Expenses">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Personal loan</label>
            <input class="col-xs form-control" id="loan" type="number" name="personal_loan" onchange="addLiabilities()" placeholder="Personal loan">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Tax payable</label>
            <input class="col-xs form-control" id="tax" type="number" name="tax_payable" onchange="addLiabilities()" placeholder="Tax payable">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">-Rent/Lease Payment</label>
            <input class="col-xs form-control" id="rent" type="number" name="rent" onchange="addLiabilities()" placeholder="Rent/Lease Payment">
          </div>
          <div class="form-group">
            <label class="col-xs sr-only">Add other liabilities</label>
            <input class="col-xs form-control" id="other" type="number" name="other_liabilities" onchange="addLiabilities()" placeholder="Add other liabilities">
          </div>
          <input class="calc-btn btn btn-primary" type="reset" value="Reset Liabilities" name="reset_liabilities">
		  
          <div class="form-group mt-4">
            <label class="col-xs sr-only">Total Liabilities:</label>
            <input class="col-xs form-control" id="total-liabilities" type="number" name="total_liabilities" onchange="addLiabilities()" placeholder="Total Liabilities" disabled>
		  </div>
		  
        </form>

      </div>
<div class="calc-back text-center">
      <button class="calc-button btn btn-primary" name="calculate" onclick="calc()">Calculate</button>
	 
        <p class="lead mb-2">Total Networth:</p>
        <input class="col-xs form-control" id="net" type="number" name="total_networth" onchange="add()" placeholder="Total Networth" disabled><br>
		
      </div>
    </div>
     </div>
	  <input class="calc-btn btn btn-primary" type="button" value="Print Preview" onclick="javascript:printerDiv('printablediv')">
   
 

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
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>

</html>