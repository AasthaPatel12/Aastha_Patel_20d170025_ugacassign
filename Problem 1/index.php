<?php
    $insert = false;
    if(isset($_POST['Email'])){

    $surver = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($surver, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "success";
    
    $Email = $_POST['Email'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `ugac`.`ugac` (`Email`, `user`, `password`, `dt`) VALUES ('$Email', '$user', '$password', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UGAC Assignment</title>
    <link rel="stylesheet" href="css.css">

</head>

<body>
    <?php
    if($insert == true){
    echo "<div><h1>Successfully log in and your user name is $user </h1></div>";
    }
    ?>
    <section class="contact background" id="services">
        <div class="main">
            <h2 class="text-center">Welcome To IIT Bombay</h2>
            <p>Log-In using your Email to view more information about IITB</p>
            
        </div>
        <form action="index.php" method="post">
            <div class="form">
                <input class="input email" type="email" name="Email" id="Email" placeholder="Enter your Email">
                <input type="text" class="user input" name="user" id="user" placeholder="User Name">
                <input type="password" class="password input" name="password" id="password" placeholder="Password">
                <button class="btn">Log In</button>
            </div>
        </form>
    </section>
</body>

</html>