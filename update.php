<?php

include "db.php";

if(isset($_POST['update'])){
    $first_name = $_POST['firstName'];
    $user_id = $_POST['id'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET firstname ='$first_name',lastname ='$last_name',email ='$email',password='$password',gender='$gender' where id='$user_id'";

    $result = $conn->query($sql);

    if($result == TRUE){
        echo "Record Updated Successfully";
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $sql = "SELECT *FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $firs_name = $row['firstname'];
            $last_name = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }
    ?>

        <h2> User Update Form </h2>
        <form  action ="" method = "post">
        <fieldset>
            <legend>Personal Information:</legend>
            First Name: <br>
            <input type="text" name ="firstname" value ="<?php echo $first_name; ?>">
            <input type="hidden" name ="user_id" value ="<?php echo $id; ?>">
            <br>
            Last Name: <br>
            <input type="text" name ="lastname" value ="<?php echo $last_name; ?>">
            <br>
            Password: <br>
            <input type="password" name ="password" value ="<?php echo $password; ?>">
            <br>
            Gender: <br>
            <input type="radio" name ="gender" value="Male" <?php if($gender == 'Male'){echo "checked";} ?>">
            <input type="radio" name ="gender" value="Female"<?php if($gender == 'Female'){echo "checked";} ?>">
            <br><br>
            <input type="submit" name="Update" value="update">
            </fieldset>
    </form>
    </body>
    </html>
    <?php
    } else{
        //if the 'id' value is not valid, redirect the user back to view.php page

        header('Location: view.php');
    }

    }
?>
  


