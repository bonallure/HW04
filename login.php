<?php
$server= "localhost";
$username= "root";
$password = "COSC4343";
$db_name = "hm04";
$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    echo "Connection failed!"<br>;
}
else{
    echo "Connection success!"<br>;
}
session_start();
?>

/*
   include "db_conn.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);

           return $data;
        }

        $user_name = validate($_POST['username']);
        $pass = validate($_POST['password']);

        if (empty($user_name)) {
            header("Location: index.html?error=User Name is required");
            exit();
        }
        else if(empty($pass)){
            header("Location: index.php?error=Password is required");
            exit();
        }
        else{
            $sql = "SELECT * FROM UserAccounts WHERE username='user_name' AND password='$pass'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if ($row['username'] === $user_name && $row['password'] === $pass) {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['user_name'];
                    $_SESSION['userID'] = $row['id'];
                    $_SESSION['clearance'] = $row['clearance'];
                    header("Location: home.php");

                    exit();
                }
                else{
                    header("Location: index.php?error=Incorect User name or password");
                    exit();
                }
            }
            else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }

    }
    else{
        header("Location: index.php");
        exit();
    }
*/
