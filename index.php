<!DOCTYPE html>
<form method="POST">
    <input type="email" name="email" required placeholder="email"><br>
    <input type="password" name="password" required placeholder="wachtwoord"><br>
    <input type="submit" name="submit">
</form>
<style>
<?php

//database connectie
$conn = new mysqli('localhost','root','','uitleenbeheer');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(strlen($_POST['password']) < 0){
        $password_error = "wachtwoord moet langer zijn dan 6 characters";
    }

    $query = $conn->query("SELECT * FROM beheerders WHERE email = '".$conn->real_escape_string($_POST['email'])."'");

    if($query->num_rows == 1){
        $row = mysqli_fetch_array($query);
        if($_POST['password'] == $row['password'])  {
            $_SESSION['loggin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];

            if($row['password'] == $_POST['password']){
                Header("Location: test.php??id=" . $conn->real_escape_string($_POST['id']));
            }
        }else {
        echo "ongeldig wachtwoord of mail";
        }
    }else {
        echo "ongeldig wachtwoord of mail";
    }
}

?>