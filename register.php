<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="image-container">
                <img src="IMG_0381.PNG" alt="IMG_0381.PNG">
            </div>
            <div class="form-content">
                <form action="register.php" method="POST">
                <h2>Create Account</h2>
                <div class="form-groupe">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-groupe">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-groupe">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" required>
                </div>
                <div class="form-groupe">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" name="Login">Sign Up</button>
                <p class="register-link">Alerady have an account? <a href="index.php">Log In</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn = new mysqli('localhost','root','','auth_system');

    if ($conn->connect_error) {
        die("connection failed:" . $conn->connect_error);
    }
    $sql = "INSERT INTO users (name, email, password, mobile)VALUES ('$name','$email','$password','$mobile')";

    if ($conn->query($sql) == TRUE) {
        echo "<script>
        alert('Registration successfull');
        window.location.href ='index.php';
        </script>";
    } else{
        echo 'Error:' .$sql ."<br>" . $conn->error;
    }

    $conn->close();
}    
?>