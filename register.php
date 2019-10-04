<!DOCTYPE html>

<html class="no-js">


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

    <?php

    if (isset($_POST['reg'])) {

        $msg = ''; /* Error message */

        // get json file
        $user = json_decode(file_get_contents("users.json"), true);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $rtpwd = $_POST['rtpwd'];

        if (empty($name && $email && $pwd && $rtpwd)) {
            $msg = 'Please fill in all fields';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = 'Invalid email address';
        } elseif ($pwd != $rtpwd) {
            $msg = "Passwords don't match, check password again!";
        } elseif (strlen($pwd) < 5) {
            $msg = 'Password must be greater than 5';
        } else {
            // $userData = json_decode($file, true);
            unset($_POST["reg"]);
            // $user["user"] = array_values($user["user"]);
            array_push($user["users"], [
                "Name" => $name,
                "Email" => $email,
                "Password" => $pwd
            ]);
            if (file_put_contents("users.json", json_encode($user))) {
                // Start session
                session_start();
                // Store session variable
                $user['Name'] = $_SESSION['Name'];
                header('Location: index.php?signup=success');
            }
        }
    }

    ?>

    <div class="wrap">
        <h1>NetWorth Tracker</h1>
        <section class="form-container">
            <h3>Create an Account</h3>
            <?php if (isset($msg)) {
                    echo  $msg;
                } ?> 
            <form action="register.php" method="post" class="form-wrap">
                <div class="input-text">
                    <input type="text" name="name" placeholder=" Full-name">
                </div>

                <div class="input-email">
                    <input type="text" name="email" placeholder=" Email Address">
                </div>
                <div class="input-password">
                    <input type="password" name="pwd" placeholder="Password">
                </div>
                <div class="input-password">
                    <input type="password" name="rtpwd" placeholder="Confirm Password">
                </div>

                <button type="submiit" name="reg" class="btn-sign-in">Sign Up</button>
                <p>Already have an account? <a href="index.php">Sign in here</a></p>
            </form>
        </section>
    </div>

    <script src="" async defer></script>
</body>

</html>
