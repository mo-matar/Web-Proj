<?php
session_set_cookie_params(0);
session_start();
$_SESSION['valid']=0;
$fname ='';
$mname ='';
$lname ='';
$uname ='';
$email ='';
$pass ='';
$error=0;
include("connection.php");
$_SESSION["uname"]='';
if(isset($_POST["fname"]) && isset($_POST["mname"])
    && isset($_POST["lname"]) && isset($_POST["uname"]) &&
    isset($_POST["pass"]) && isset($_POST["email"]) ){
    if(!empty($_POST["fname"]) && !empty($_POST["mname"])
        && !empty($_POST["lname"]) && !empty($_POST["uname"]) &&
        !empty($_POST["pass"]) && !empty($_POST["email"]) ){
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        $email = $_POST["email"];
        $_SESSION["uname"]= $_POST["uname"];
        try {
            $qry1 = "SELECT * FROM customers";
            $qry2 = "INSERT INTO `customers` (`first_name`, `middle_name`, `last_name`, `email`,`username`, `password_hash`)".
                " VALUES ('".$fname."','".$mname."','".$lname."','".$email."','".$uname."','".$pass."');";
            $res=$conn->query($qry1);
            for($i=0; $i < $res->num_rows; $i++){

            $resRow=$res->fetch_assoc();
            if($resRow['username'] == $uname || $resRow['email'] == $email){
                $error=1;
            }
                }
            if(!$error){
                $res=$conn->query($qry2);
                $conn ->commit();
                $conn ->close();
                header("location:payment_info.php");
                $_SESSION['valid']=1;
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
    <title>Sign up</title>
    <link rel="stylesheet" href="../CSS/signup_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
<img src="../IMAGES/login.png">
<form method="post" action="signup.php">
    <p id="para1" style="position: absolute; top: -8px;color: red;font-weight: lighter;display: none">Username or Email is take, Please choose another!</p>
    <div>
        <label class="labels" for="fname">Name</label>
        <input class="text_name" type="text" id="fname" name="fname" required placeholder="First">
        <input class="text_name" type="text" id="mname" name="mname" required placeholder="Middle">
        <input class="text_name" type="text" id="lname" name="lname" placeholder="Last" required>
    </div>

    <div>
        <label class="labels" for="email">Email</label>
        <input class="inputs" required type="email" name="email" id="email" placeholder="example@mail.com">
    </div>

    <div>
        <label class="labels" for="uname">Username</label>
        <input class="inputs" type="text" id="uname" name="uname" required>
    </div>

    <div>
        <label class="labels" for="pass">Password</label>
        <input class="inputs" type="password" id="pass" name="pass" required>
    </div>

    <div>

        <!--            <a href="../PHP/signup.php" target="_blank">-->
        <input id="next" type="submit" value="next">
        <!--            </a>-->
    </div>
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