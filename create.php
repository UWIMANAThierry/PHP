<?php
include "db.php";

if(isset($_POST['Submit'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
}
// write sql query to enter the data into our table

$sql = "INSERT INTO users (firstname, lastname, email, password, gender) VALUES (
    '".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$_POST["password"]."','".$_POST["gender"]."')";

$result = $conn->query($sql);

if($result == TRUE){
    echo "New record created successfully!";
}
else{
    echo "error:" . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> SignUp Form </h1>

    <form action="" method="POST">
        <fieldset>
            <legend>Personal Information:</legend>
            First Name: <br>
            <input type="text" name ="firstname">
            <br>
            Last Name: <br>
            <input type="text" name ="lastname">
            <br>
            email: <br>
            <input type="text" name ="email">
            <br>
            Password: <br>
            <input type="password" name ="password">
            <br>
            Gender: <br>
            <input type="radio" name ="gender" value="Male">
            <input type="radio" name ="gender" value="Female">
            <br><br>
            <input type="submit" name="submit" value="submit">
            </fieldset>
            </form>
</body>
</html>