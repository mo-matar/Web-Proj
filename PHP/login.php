<?php
session_set_cookie_params(0);
session_start();
$_SESSION['valid']=0;
$uname ='';
$pass ='';
$error=0;
include("connection.php");
if (isset($_POST["uname"]) && isset($_POST["pass"])){
    if( !empty($_POST["uname"]) && !empty($_POST["pass"])){
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        $_SESSION["uname"]= $_POST["uname"];
        try {
            $conn = new mysqli("localhost", "root", "", "computer_store");
            $qry1 = "SELECT * FROM customers";
            $res=$conn->query($qry1);
//            $conn ->commit();
//            $conn ->close();
            for($i=0; $i < $res->num_rows; $i++){
                $resRow=$res->fetch_assoc();
                if($resRow['username'] == $uname && $resRow['password_hash'] == $pass){
                    header("location:../PHP/index.php");
                }
                else{$error=1;}

            }
        }
        catch (Exception $ex){
            $error=1;
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="../CSS/login_style.css">
    <script src="https://kit.fontawesome.com/d5fa305551.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
<img src="../IMAGES/login.png">
<form method="post" action="../PHP/login.php">
    <p id="para1" style="position: absolute; left: 25%; top: -8px;color: red;font-weight: lighter;display: none">Invalid Username or Password!</p>
    <h1>Login</h1>
    <label class="labels_1" for="uname">Username</label>
    <input required type="text" id="uname" name="uname" placeholder="Enter your username">



    <label class="labels_1" for="pass">Password</label>
    <input required type="password" id="pass" name="pass" placeholder="Enter your password">

    <button id="login">Log In</button>
    <div>
        <label id="signup_l">Don't have an account?</label>
        <button type="submit" id="signup" name="signup">
            <a href="../PHP/signup.php" target="_blank">Sign up</a>
        </button>
    </div>
    <label id="contact">Contact us:</label>
    <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
    <a href="https://www.x.com" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
    <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://web.telegram.org" target="_blank"><i class="fa-brands fa-telegram"></i></a>
</form>
<?php
if($error==1){

    ?>
    <script>
        document.getElementById("para1").style.display='block';
        // alert("Taken");
    </script>
    <?php
}
?>
</body>
</html>
