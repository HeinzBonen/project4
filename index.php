<?php

session_start();
//database connectie
include("db.php");

?>
<title>login</title>
<link rel="stylesheet" href="css_bestanden/loginfout.css">

<p> vul hier uw gegevens in om in te loggen: </p>
<!--login form-->
<form method="POST" name="form">
    <input type="email" name="email" required placeholder="email-adres..."><br>
    <input type="password" name="password" required placeholder="wachtwoord..."><br>
    <input type="submit" name="submit" value="log in">
</form>



<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){


if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

        $data = trim($data);
 
        $data = stripslashes($data);
 
        $data = htmlspecialchars($data);
 
        return $data;
 
     }

    $email = validate($_POST['email']);

    $password = validate($_POST['password']);

    if (empty($email)) {

        echo "<div class=roodblok;>Vul uw email in.</div>";

        exit();

    }else if(empty($password)){

        echo "<div class=roodblok;>Vul uw wachtwoord in.</div>";

        exit();

    }else {

        $sql = "SELECT * FROM beheerders WHERE email='$email'";




        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['wachtwoord'])) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['password'] = $row['wachtwoord'];

                $_SESSION['id'] = $row['id'];

                header("Location: admin/adminfuncties.php");

                exit();
            

            }else{

                echo "<div class=roodblok>U heeft een verkeerd wachtwoord of email ingevuld.</div>";

                session_destroy();

                exit();

            }

        }else{

            echo "<div class=roodblok>U heeft een verkeerd wachtwoord of email ingevuld.</div>";

            session_destroy();

            exit();

        }

    }

}else{

    header("Location: inlog.php");

    exit();

}
}
