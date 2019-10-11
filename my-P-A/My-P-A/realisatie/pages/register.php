<?php

	require_once('includes/connection.php');
    if(isset($_POST['submit'])){
        $message = $voornaam = $achternaam = $adres = $woonplaats = $postcode = $telefoon =  $mail = $password = $pwd = '';

        $voornaam = $_POST['Voornaam'];
        
        $achternaam = $_POST['Achternaam'];

        $mail = $_POST['E-mail'];
        
        $pwd = $_POST['password'];
        $pwdR = $_POST['passwordR'];

        $password = MD5($pwd);
    
        if ($pwd == $pwdR) {
            try {
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO user (First_name, Last_name, E_mail, passw) 
                        VALUES ('$voornaam','$achternaam', '$mail','$password')";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New login succesfully created";
            // header("Location: ../index.php");
            }
            catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $conn = null;
            header("Location: index.php?page=login");
        } else {
            $message = "wachtwoord is niet het zelfde";
        }
    }
?>
<form action="" id="reg-form" method="post">
    <table class="spacing">
        <tr>
            <div class="form-group">
                <td> <label for="exampleInputEmail2">First name</label> </td>
                <td> <input type="firstname" class="form-control" id="exampleInputEmail2" placeholder="First name" required name="Voornaam"> </td>
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <td> <label for="exampleInputEmail2">Last name</label> </td>
                <td> <input type="lastname" class="form-control" id="exampleInputEmail2" placeholder="Last name" required name="Achternaam"></td>
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <td> <label for="exampleInputEmail2">Email</label> </td>
                <td> <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" required name="E-mail"> </td> </tr>
            </div>
        </tr>
        <tr>
            <div class="form-group">
                <td> <label for="exampleInputPassword1">Password</label> </td>
                <td> <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="password"> </td>
                <br>
        </tr>
        <tr>
                <td> <label for="exampleInputPassword2">Repeat password</label> </td>
                <td> <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Repeat password" required name="passwordR"> </td>
                <h4> <?php if(isset($_POST['submit'])){
                echo $message;}?> </h4>
            </div>
        </tr>
        <tr>
            <td> <button type="submit" name='submit' class="submit">Register</button> </td>
        </tr>
        <tfoot><tr><td> <small id="emailHelp1" class="form-text">Your email will never be shared with any other parties.</small> </tr></td></tfoot>
    </table>
</form>