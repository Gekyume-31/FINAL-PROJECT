<?php 
include 'connect.php';

function validateInput($data) {
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['signUp'])) {
    $firstName = validateInput($_POST['fName']);
    $lastName = validateInput($_POST['lName']);
    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters long!";
        exit();
    }

    $hashedPassword = md5($password); 

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password)
                        VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";

        if ($conn->query($insertQuery) === TRUE) {
            setcookie('userEmail', $email, time() + (86400 * 30), "/"); 
            setcookie('userName', "$firstName $lastName", time() + (86400 * 30), "/");
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = validateInput($_POST['email']);
    $password = validateInput($_POST['password']);

    $hashedPassword = md5($password); 

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];

        setcookie('userEmail', $email, time() + (86400 * 30), "/"); 
        setcookie('userName', "{$row['firstName']} {$row['lastName']}", time() + (86400 * 30), "/");

        header("Location: grp2.php");
        exit();
    } else {
        echo "Incorrect Email or Password.";
    }
}
?>