<?php  //Start the Session
// Always start this first
session_start();

if ( !empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $con = new mysqli('localhost', 'root', '', 'medicare');
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) {
    		$_SESSION['user_id'] = $user->ID;
    	}
    }
}
?>

<html>
    <head>
        <title>About Us</title>
        <link rel="icon" href="logo.png">
        <link href="styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="row">
                <div class="logo"> <img src="logo.png"> </div>
                <ul class="main-nav">
                    <li> <a href="index.php"> Home </a></li>
                    <li> <a href="about.php"> About </a></li>
                    <li> <a href="bmi.php"> BMI </a></li>
                    <li> <a href="calorie.php"> Calorie Consumption</a></li>
                    <li> <a href="logout.php"> Logout </a></li>
                </ul>
            </div>
            <div class = "description">
            <h1> Sucessful </h1> &nbsp;
            <p>
                You are logged in
            </p>
                <div class="button">
                    <a href="logout.php" class="btn-one"> Logout </a>
                </div>
        </div>
        </header>
        
    </body>
</html>
