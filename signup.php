<?php
// condition
if (isset($_POST['username'])) {


    // creating variables to connect to database
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_register";
    $msg = "<p class='msg'>Registeration successful</p>";

    //  creating connection between php and the database
    $con = mysqli_connect($server, $username, $password, $dbname);


    //checking the connection
    if (!$con) {
        die("Connection failed to the database due to" . mysqli_connect_error());
    }
    // echo "Successfully connected to the database";


    // creating variables to insert the values from form to database
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    // query to insert data to database from users
    $sql = "INSERT INTO `signup` (`username`, `email`, `password`, `date_time`) VALUES ('$username', '$email', '$pass', current_timestamp());";

    // echo "$sql"; to check sql querry is running or not
    if ($con->query($sql) == true) {

        // if connected
        // echo "successfully inserted";
        echo $msg;
    } else {
        // if connection failed
        echo "ERROR: $sql <br> $con->error";
    }

    // closing the database
    $con->close();


}


?>


<!-- HTML starts -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign up here!</title>
</head>

<body>
    <!-- main container -->
    <div class="main flex">
        <!-- background black effect box -->
        <div class="bg-box"></div>
        <!-- form wrapper -->
        <div class="wrapper flex">
            <!-- login options and details here -->
            <div class="login flex">
                <!-- login info and codes -->

            </div>
            <!-- login options and details here -->
            <form action="signup.php" method="post" class="signup flex">
                <!-- heading -->
                <h2>Signup</h2>


                <!-- input field username -->
                <div>
                    <!-- <label for="username">Username:</label> -->
                    <input type="text" name="username" id="username" placeholder="Enter your username">
                </div>

                <!-- input field email -->
                <div>
                    <!-- <label for="email">Email:</label> -->
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                </div>

                <!-- input field password -->
                <div>
                    <!-- <label for="pass">Password:</label> -->
                    <input type="password" name="pass" id="pass" placeholder="Create a password">
                </div>
                <!-- input field confirm password -->
                <div>
                    <!-- <label for="cpass">Confirm Password:</label> -->
                    <input type="password" name="cpass" id="cpass" placeholder="Confirm your password">
                </div>
                <!-- Botton  -->
                <div class="bottom">
                    <button type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>

    <!-- Linking javascript to the index file -->

    <script src="script.js"></script>

</body>

</html>