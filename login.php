<!DOCTYPE html>
<html>
<body>

<?php
echo "Hello<br>";
$server= "localhost";
$username= "root";
$password = "COSC4343";
$db_name = "homework";
$conn = new mysqli($server, $username, $password, $db_name);

if ($conn -> connect_errno) {
    echo "Connection failed!<br>";
}
else{
    echo "Connection success!<br>";
}

function validate($data){
           $data = trim($data);

           return $data;

$user_name = validate($_POST['username']);
echo "username: ".$user_name."<br>";
$pass = validate($_POST['password']);
echo "password: " . $pass . "<br>";

$sql = "SELECT * FROM UserAccounts WHERE username='$user_name' AND password='$pass'";
$result = mysqli_query($conn, $sql);
echo $result . "<br>";
?>

</body>
</html>

