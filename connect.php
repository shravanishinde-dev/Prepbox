
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_name=$_POST['user-name'];
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
$user_email=$_POST['user-email'];

$conn = new mysqli('127.0.0.1', 'root', '', 'FOELogin', 3306);
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO Login (user_name, user_password, user_email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_name, $hashed_password, $user_email);

    $stmt->execute();
    echo "Registered!";
    $stmt->close();
    $conn->close();
}
?>